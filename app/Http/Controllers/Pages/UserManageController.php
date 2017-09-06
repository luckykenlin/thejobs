<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Constant;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\Resume;
use App\Utility\DataUtility;
use Illuminate\Http\Request;
use App\Contracts\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserManageController extends Controller
{
    protected $users;

    /**
     * UserManageController constructor.
     * @param UserRepository $users
     * @internal param UserRepository $user
     */
    function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Manage a list of user's job resource
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|void
     */
    public function jobManage(Request $request)
    {
        if (Auth::check()) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = $request->path();
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $pathUrl = str_replace('&show=Simple','',$pathUrl);

            $jobs = $this->users->find(Auth::user()->id)->jobs();
            if ($request->expectsJson()) {
                $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
            }

            $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.job.jobManage' , compact('jobs'));

        } else return abort(403 , 'Unauthorized action');;
    }

    public function resumeManage(Request $request)
    {
        if (Auth::check()) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = $request->path();
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $resumes = $this->users->find(Auth::user()->id)->resumes();

            if ($request->expectsJson()) {
                $resumes = $this->users->fetchByPageInfo($resumes, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.resume.ownLoad' , ['resumes' => $resumes])->render();
            }

            $resumes = $this->users->fetchByPageInfo($resumes, $pageInfo,null,null, null, null, $pathUrl);

            return view('front.resume.resumeManage' , compact('resumes'));

        } else return abort(403 , 'Unauthorized action');;
    }

    /**
     * Manage a list of user's company resource
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|void
     */
    public function companyManage(Request $request)
    {
        if (Auth::check()) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = $request->path();
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $companies = $this->users->find(Auth::user()->id)->companies();
            if ($request->expectsJson()) {
                $companies = $this->users->fetchByPageInfo($companies, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.company.ownLoad' , ['companies' => $companies])->render();
            }

            $companies = $this->users->fetchByPageInfo($companies, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.company.companyManage' , compact('companies'));

        } else return abort(403 , 'Unauthorized action');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function jobDestroy($id , Request $request)
    {

        if (isset($id)) $result = Job::destroy($id);
        if ($result) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = explode('/', $request->path())[0];
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $jobs = $this->users->find(Auth::user()->id)->jobs();

            if ($request->expectsJson()) {
                $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
            }
            $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
        } else {
            return abort('403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function resumeDestroy($id , Request $request)
    {

        if (isset($id)) $result = Resume::destroy($id);
        if ($result) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = explode('/', $request->path())[0];
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $resumes = $this->users->find(Auth::user()->id)->resumes();
            if ($request->expectsJson()) {
                $resumes = $this->users->fetchByPageInfo($resumes, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.resume.ownLoad' , ['resumes' => $resumes])->render();
            }
            $resumes = $this->users->fetchByPageInfo($resumes, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.resume.ownLoad' , ['resumes' => $resumes])->render();
        } else {
            return abort('403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function companyDestroy(Request $request, $id)
    {
//        $this->authorize('delete' , [User::class , $id]);
        if (isset($id)) $result = Company::destroy($id);
        if ($result) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = explode('/', $request->path())[0];
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $companies = $this->users->find(Auth::user()->id)->companies();

            if ($request->expectsJson()) {
                $companies = $this->users->fetchByPageInfo($companies, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.company.ownLoad' , ['companies' => $companies])->render();
            }
            $companies = $this->users->fetchByPageInfo($companies, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.company.ownLoad' , ['companies' => $companies])->render();
        } else {
            return abort('403');
        }
    }


    /**
     * Mark job_status to be available for company
     * @param Request $request
     * @param $id
     * @return view
     */
    public function jobMark(Request $request , $id)
    {
        if (isset($id)) {
            $data = $request->all();
            if ($data['status'] == 'Mark filled')
                Job::find($id)->update(['job_status' => Constant::JOB_FILLED]);
            else
                Job::find($id)->update(['job_status' => Constant::JOB_EMPTY]);
        }
        if ($request->expectsJson()) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = explode('/', $request->path())[0];
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $jobs = $this->users->find(Auth::user()->id)->jobs();
            $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
        }

    }


    /**
     * Mark resume_status to be available for can
     * @param Request $request
     * @param $id
     * @return View
     */
    public function resumeMark(Request $request , $id)
    {
        if (isset($id)) {
            $data = $request->all();
            if ($data['status'] == 'Hide')
                Resume::find($id)->update(['status' => Constant::HIDE]);
            else
                Resume::find($id)->update(['status' => Constant::SHOW]);
        }
        if ($request->expectsJson()) {
            $pageInfo = DataUtility::pageInfo(10 , $request->all());
            $pathUrl = explode('/', $request->path())[0];
            $pathUrl = DataUtility::pathUrl($pageInfo, $pathUrl);
            $resumes = $this->users->find(Auth::user()->id)->resumes();
            $resumes = $this->users->fetchByPageInfo($resumes, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.resume.ownLoad' , ['resumes' => $resumes])->render();
        }

    }



}
