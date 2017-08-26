<?php

namespace App\Http\Controllers\Pages;

use App\Models\Job;
use App\Utility\DataUtility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Job\JobRepository;
use App\Utility\DateUtility;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    protected $jobs;

    /**
     * JobController constructor.
     * @param JobRepository $jobs
     *
     */
    function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageInfo = DataUtility::pageInfo(10 , $request->all());
        $pathUrl = $request->path();
        $pathUrl = DataUtility::pathUrl($pageInfo , $pathUrl);
//            dd($pathUrl);
        //show status  == unfill positions!  query built
        $jobs = Job::query()->where('job_status' , '=' , 0);

        if ($request->expectsJson()) {
            $jobs = $this->jobs->fetchByPageInfo($jobs , $pageInfo , null , null , null , null , $pathUrl);
            return view('front.job.load' , ['jobs' => $jobs])->render();
        }

        $jobs = $this->jobs->fetchByPageInfo($jobs , $pageInfo , null , null , null , null , $pathUrl);
        return view('front.job.index' , compact('jobs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view("front.job.create");
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
        if (Auth::check()) {
            $data = $request->all();
            if (isset($data['job_desc'])) $data['job_desc'] = htmlspecialchars($data['job_desc']);
            $this->jobs->save($data);
            return redirect('job-manage');
        } else
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
        $job = $this->jobs->find($id);
        $job['time'] = DateUtility::timemaker($job->updated_at);
        return view('front.job.show' , compact('job'));
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
            $job = $this->jobs->find($id);
            return view('front.job.edit' , compact('job'));
        } else abort(403);
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
        if(Auth::check()) {
            $data = $request->all();
            $data['job_desc'] = htmlspecialchars($data['job_desc']);
            $this->jobs->update($data , $id);
            return redirect('job-manage');
        } else abort(403);
    }


}
