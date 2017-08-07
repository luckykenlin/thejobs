<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Job\JobRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $jobs;

    /**
     * HomeController constructor.
     * @param JobRepository $jobs
     *
     */
    function __construct(JobRepository $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     *
     */
    public function index()
    {
        $pageinfo['pageSize'] = 5;
        $jobs = $this->jobs->fetch($pageinfo , null , null , null);
        return view('front.home.index', compact('jobs'));
    }
}
