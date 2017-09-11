<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class SearchController extends Controller
{
    public function addressResponse(Request $request)
    {
        if ($request->expectsJson()) {
            $data = [
                "query" => "Unit" ,
                "suggestions" => [] ,
            ];
            $jobs = DB::table('jobs')->where('job_place' , 'like' , $request['query'] . '%')->pluck('job_place')->unique()->values()->all();
            $data['suggestions'] = $jobs;
            return response()->json($data);
        }
    }

    public function jobDetailResponse(Request $request)
    {
        if ($request->expectsJson()) {
            $data = [
                "query" => "Unit" ,
            ];
            $jobs = DB::table('jobs')->where('job_name' , 'like' , $request['query'] . '%')->pluck('job_name')->unique()->values()->all();
            $skills = DB::table('skills')->where('name' , 'like' , $request['query'] . '%')->pluck('name')->unique()->values()->all();
            $companies = DB::table('companies')->where('name' , 'like' , $request['query'] . '%')->pluck('name')->unique()->values()->all();
            $data['suggestions'] = array_merge($jobs , $skills , $companies);
            return response()->json($data);
        }
    }
}
