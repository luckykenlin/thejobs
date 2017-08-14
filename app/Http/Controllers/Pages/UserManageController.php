<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Constant;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Utility\DataUtility;
use Illuminate\Http\Request;
use \App\Contracts\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserManageController extends Controller
{
    protected $users;

    /**
     * UserManageController constructor.
     * @param UserRepository $user
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
            $jobs = $this->users->find(Auth::user()->id)->jobs();
            if ($request->expectsJson()) {
                $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
                return view('front.job.ownload' , ['jobs' => $jobs])->render();
            }

            $jobs = $this->users->fetchByPageInfo($jobs, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.job.jobManage' , compact('jobs'));

        } else return abort(403);
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
                return view('front.company.ownload' , ['companies' => $companies])->render();
            }

            $companies = $this->users->fetchByPageInfo($companies, $pageInfo,null,null, null, null, $pathUrl);
            return view('front.company.companyManage' , compact('companies'));

        } else return abort(403);
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

        $result = Job::destroy($id);
        if ($result) {
            $jobs = User::find(Auth::user()->id)->jobs()->paginate($request->pageSize);
            dd($jobs->withPath("job-manage?page=" . $request->page));

            if ($request->ajax()) {
                return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
            }
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
    public function companyDestroy($id , Request $request)
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
     * Mark job_status to be available for can
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
        if ($request->ajax()) {
            $pageinfo['pageSize'] = 10;
            if (isset($request) and $request->pageSize) {
                $data = $request->all();
                $pageinfo['pageSize'] = $data['pageSize'];
            }
            if (isset($request) and $request->page) {
                $data = $request->all();
                $pageinfo['page'] = $data['page'];
            }
            $jobs = $this->users->find(Auth::user()->id)->jobs()->paginate($pageinfo['pageSize']);
            $jobs->withPath("job-manage?page=" . $pageinfo['page'] . "&pageSize=" . $pageinfo['pageSize']);
            return view('front.job.ownload' , ['jobs' => $jobs])->render();
        }

    }

}
