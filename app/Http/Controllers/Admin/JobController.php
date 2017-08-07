<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Job\JobRepository;
use App\Models\Job;
use App\Models\User;
use App\Utility\DataTableUtility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    protected $jobs;

    /**
     * UserController constructor.
     * @param UserRepository $user
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
    public function index()
    {

        $this->authorize('view' , User::class);
        if (request()->expectsJson()) {
            $searchColumn = DataTableUtility::searchColumn(request()->all());
            $orderColumn = DataTableUtility::orderColumn(request()->all());
            $pageInfo = ["pageSize" => request()->get("perPage")];
            $pageData = $this->jobs->fetch($pageInfo , null , $orderColumn , $searchColumn);
            return response()->json($pageData);
        } else {
            return view('admin.job.index');
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
        $this->authorize('update' , [User::class , $id]);
        $job = $this->jobs->find($id);
        return view('admin.job.edit' , compact('job'));
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
        $this->authorize('update' , [User::class , $id]);
        $validator = $this->jobs->validator($request->all());

        if ($validator->fails()) {
            return response('error' , 500);
        } else {
            $data = $request->all();
            $this->jobs->update($data , $id);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.job.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store' , User::class);
        $validator = $this->jobs->validator($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->jobs->save($request->all());
            return redirect('admin/job');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete' , [User::class , $id]);
        $result = Job::destroy($id);
        return response()->json($result);
    }

}
