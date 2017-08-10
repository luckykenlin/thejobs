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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageinfo['pageSize'] = 5;
        $companies = $this->companies->fetch($pageinfo , null , null , null);
        if ($request->ajax()) {
            return view('front.company.load' , ['companies' => $companies])->render();
        }
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
    public function show($id)
    {
        $company = $this->companies->find($id);
        return view('front.company.show' , compact('company'));
    }
}
