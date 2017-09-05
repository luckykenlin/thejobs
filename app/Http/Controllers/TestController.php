<?php

namespace App\Http\Controllers;

use App\Contracts\Test\TestRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{
    protected $test;
    public function __construct(TestRepository $test)
    {
        $this->test = $test;
    }

    public function index(Request $request)
    {
        dd($request->getRequestUri());
    }

}
