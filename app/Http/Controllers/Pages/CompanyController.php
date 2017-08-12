<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Company\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    protected $companies;

    /**
     * CompanyController constructor.
     * @param CompanyRepository $companies
     */
    function __construct(CompanyRepository $companies)
    {
        $this->companies = $companies;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param array $pageinfo
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $pageinfo = [])
    {
        $pageinfo['pageSize'] = 10;

        if ($request->ajax())
        {
            $pageinfo['pageSize'] = 10;
            if(isset($request) and $request->pageSize)
            {
                $data = $request->all();
                $pageinfo['pageSize'] = $data['pageSize'];
            }
            $companies = $this->companies->fetch($pageinfo , null , null , null);
            $companies->withPath("company?pageSize=".$pageinfo['pageSize']);
            return view('front.company.load' , ['companies' => $companies])->render();
        }

        $companies = $this->companies->fetch($pageinfo , null , null , null);
        return view('front.company.index' , compact('companies'));
    }

    /**
     * Create a record of the resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function create()
    {
        if(Auth::check()){
            return view("front.company.create");
        } else return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if (isset(  $data['detail'])) $data['detail'] = htmlspecialchars($data['detail']);
            $this->companies->save($data);
            return redirect('company');
        }else
            return abort('403');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $company = $this->companies->find($id);
        $jobs = $company->jobs()->orderBy('updated_at', 'desc')->paginate(5);
        if($request->ajax())
        {
            return view('front.company.jobload' , ['jobs' => $jobs])->render();
        }
        return view('front.company.show' , compact('company','jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companies->find($id);
        return view('front.company.edit' , compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $data = $request->all();
        $data['detail'] = htmlspecialchars($data['detail']);
        $this->companies->update($data , $id);
        return redirect('company-manage');
    }

}
