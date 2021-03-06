<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Constant;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobResume;
use App\Models\Message;
use App\Models\Resume;
use App\Utility\DataUtility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Job\JobRepository;
use App\Utility\DateUtility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
        //show status  == unfill positions!  query built
        $jobs = Job::query()->where('job_status' , '=' , Constant::JOB_EMPTY);
        if ($request->expectsJson()) {
            $jobs = $this->jobs->fetchByPageInfo($jobs , $pageInfo , $request['filterColumn'] , null , $request['searchColumn'] , null , $pathUrl);
            return view('front.job.load' , ['jobs' => $jobs])->render();
        };
        $categories = Category::where('name' , '=' , 'Root Category')->first();

        $jobs = $this->jobs->fetchByPageInfo($jobs , $pageInfo , $request['filterColumn'] , null , $request['searchColumn'] , null , $pathUrl);
        return view('front.job.index' , compact('jobs' , 'categories'));
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
            if (isset($data['job_desc'])) $data['job_desc'] = htmlspecialchars($data['job_desc']);
            $this->jobs->save($data);
            return redirect('job-manage');
        } else
            return abort(403 , 'Unauthorized action');

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
        if (Auth::check()) {
            $data = $request->all();
            $data['job_desc'] = htmlspecialchars($data['job_desc']);
            $this->jobs->update($data , $id);
            return redirect('job-manage');
        } else
            return abort(403 , 'Unauthorized action');
    }

    /**
     * Job apply with a resume
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobApply($id , Request $request)
    {
        if (Auth::check()) {
            $job = $this->jobs->find($id);
            $resumes = Auth::user()->resumes()->latest('created_at')->paginate(5);
            if ($request->expectsJson()) {
                return view('front.job.resumeLoad' , ['resumes' => $resumes])->render();
            }
            return view('front.job.job-apply' , compact('job' , 'resumes'));   //  Apply for job
        } else
            return abort(403 , 'Unauthorized action');
    }

    /**
     * show candidates list of job
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jobCandidates($id , Request $request)
    {
        $job = $this->jobs->find($id);
        $resumes = $job->resumes()->latest('created_at')->paginate(5);;
        if ($request->expectsJson()) {
            return view('front.job.candidateLoad' , ['resumes' => $resumes])->render();
        }
        return view('front.job.job-candidates' , compact('job' , 'resumes'));
    }

    /**
     * @param Request $request
     * @param $jobId
     * @param $id
     * @return View||Illuminate\Http\Response
     */
    public function resumeDestroy(Request $request , $jobId , $id)
    {
        if (isset($id) and Auth::check()) {
            $result = DB::table('job_resume')->where('id' , $id)->delete();
            if ($result) {
                if ($request->expectsJson()) {
                    $resumes = $this->jobs->find($jobId)->resumes()->orderBy('updated_at' , 'desc')->paginate(5);
                    $resumes->withPath($jobId);
                    return view('front.job.candidateLoad' , ['resumes' => $resumes])->render();
                }
            }
        } else {
            return abort('403');
        }
    }

    /**
     * Apply a job with a resume
     * @param Request $request
     * @param $jobId
     * @param $resumeId
     * @return mixed
     */
    public function jobResumeApply(Request $request , $jobId , $resumeId)
    {
        if ($request->expectsJson()) {
            $job = $this->jobs->find($jobId);
            $resume = Resume::find($resumeId);
            if ($job->resumes->contains($resume))
                return response('This resume has been upload!!' , 403);
            else {
                $job->resumes()->attach($resumeId);
                return response('success!' , 200);
            }
        }
        return abort(403);
    }

    /**
     * Apply a job without a resume
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function jobApplyWithoutResume(Request $request , $id)
    {
        if (Auth::check()) {
            $job = $this->jobs->find($id);
            $message = $request->all();
            if (isset($request['file_url'])) {
                $message['file_url'] = $this->jobs->fileUpload($request['file_url'] , 'message_file');
            }
            $job->messages()->save(new Message($message));
            return redirect('job/'.$id);
        }else return abort(403);
    }

    /**
     * Set resume's status
     * @param Request $request
     * @param $jobId
     * @param $resumeId
     * @return mixed
     */
    public function resumeStatus(Request $request , $jobId , $resumeId)
    {
        $job = $this->jobs->find($jobId);
        $resume = Resume::find($resumeId);
        if ($job->resumes->contains($resume))
            $job->resumes()->updateExistingPivot($resumeId , ['status' => $request['status']]);

        $resumes = $job->resumes()->latest('created_at')->paginate(5);
        $resumes->withPath($jobId);
        if ($request->expectsJson()) {
            return view('front.job.candidateLoad' , ['resumes' => $resumes])->render();
        }
    }

}
