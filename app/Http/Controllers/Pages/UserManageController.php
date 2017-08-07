<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Utility\DataTableUtility;
use Illuminate\Http\Request;
use \App\Contracts\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function jobManage(Request $request)
    {
        if (Auth::check()){
        $jobs = $this->users->find(4)->jobs()->paginate(5);
        if ($request->ajax()) {
            return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
        }
        return view('front.job.jobManage',compact('jobs'));
        }
        else return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
//        $this->authorize('delete' , [User::class , $id]);
        $result = Job::destroy($id);
        if ($result) {
            $jobs =User::find(Auth::user()->id)->jobs()->paginate(5);
            $jobs->withPath("job-manage");
            if ($request->ajax()) {
                return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
            }
            return view('front.job.ownLoad' , ['jobs' => $jobs])->render();
        } else {
            return abort('403');
        }
    }
}
