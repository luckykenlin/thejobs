<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Company\CompanyRepository;
use App\Contracts\Constant;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Utility\DataUtility;
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
    public function index(Request $request , $pageinfo = [])
    {
        $pageInfo = DataUtility::pageInfo(10 , $request->all());
        $pathUrl = $request->path();
        $pathUrl = DataUtility::pathUrl($pageInfo , $pathUrl);
        $jobs = Company::query();
        if ($request->expectsJson()) {
            $companies = $this->companies->fetchByPageInfo($jobs , $pageInfo , null , null , null , null , $pathUrl);
            return view('front.company.load' , ['companies' => $companies])->render();
        }

        $companies = $this->companies->fetchByPageInfo($jobs , $pageInfo , null , null , null , null , $pathUrl);
        return view('front.company.index' , compact('companies'));
    }

    /**
     * Create a record of the resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::where('name' , '=' , 'Root Category')->first();
            return view("front.company.create" , compact('categories'));
        } else return abort(403 , 'Unauthorized action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if (isset($data['detail'])) $data['detail'] = htmlspecialchars($data['detail']);
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs(
                    'public/images/' . $data['user_id'] , 'company' . '.' . $request->file('image')->extension());
                $data['image'] = 'storage/images/' . $data['user_id'] . '/' . 'company' . '.' . $request->file('image')->extension();
            }
            $company = $this->companies->save($data);

            if (isset($data['medias'])) {
                foreach ($data['medias'] as $key => $value) {
                    if ($value != null) $company->medias()->save(new Media(['name' => $key , 'url' => $value]));
                }
            }

            return redirect('company');
        } else
            return abort(403 , 'Unauthorized action');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id)
    {
        $company = $this->companies->find($id);
        $jobs = $company->jobs()->orderBy('updated_at' , 'desc')->paginate(5);
        if ($request->expectsJson()) {
            return view('front.company.jobload' , ['jobs' => $jobs])->render();
        }
        return view('front.company.show' , compact('company' , 'jobs'));
    }

    public function jobDestroy(Request $request , $companyId , $jobId)
    {
        if (isset($jobId)) $result = Job::destroy($jobId);
        if ($result) {
            $jobs = $this->companies->find($companyId)->jobs()->orderBy('updated_at' , 'desc')->paginate(5);
            $jobs->withPath($companyId);
            if ($request->expectsJson()) {
                return view('front.company.jobload' , ['jobs' => $jobs])->render();
            }
        } else {
            return abort('403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $company = $this->companies->find($id);
            $medias = [];
            foreach ($company->medias as $media) {
                $medias[$media->name] = $media->url;
            }
            $categories = Category::where('name' , '=' , 'Root Category')->first();
            return view('front.company.edit' , compact('company' , 'categories'))->with('medias' , $medias);
        } else return abort(403);
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
        if (Auth::check()) {
            $data = $request->all();
            if (isset($data['detail'])) $data['detail'] = htmlspecialchars($data['detail']);
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs(
                    'public/images/' . $data['user_id'] , 'company' . '.' . $request->file('image')->extension());
                $data['image'] = 'storage/images/' . $data['user_id'] . '/' . 'company' . '.' . $request->file('image')->extension();
            }
            $this->companies->update($data , $id);
            return redirect('company-manage');
        } else return abort(403);
    }

}
