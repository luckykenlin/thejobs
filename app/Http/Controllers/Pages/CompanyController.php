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
    {
      return view('front.company.index');
    }
}
