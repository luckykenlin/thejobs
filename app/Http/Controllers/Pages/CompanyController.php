<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Company\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {$pageinfo['pageSize'] = 5;
        $companies = $this->companies->fetch($pageinfo , null , null , null);
        if ($request->ajax()) {
            return view('front.company.load' , ['companies' => $companies])->render();
        }
        return view('front.company.index' , compact('companies'));
    }
}
