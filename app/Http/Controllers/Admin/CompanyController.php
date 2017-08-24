<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Company\CompanyRepository;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Utility\DataTableUtility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    protected $companies;

    /**
     * UserController constructor.
     * @param CompanyRepository $companies
     * @internal param UserRepository $user
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
    public function index()
    {

        $this->authorize('view' , User::class);
        if (request()->expectsJson()) {
            $searchColumn = DataTableUtility::searchColumn(request()->all());
            $orderColumn = DataTableUtility::orderColumn(request()->all());
            $pageInfo = ["pageSize" => request()->get("perPage")];
            $pageData = $this->companies->fetch($pageInfo , null , $orderColumn , $searchColumn,["categories"]);
            return response()->json($pageData);
        } else {
            return view('admin.company.index');
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
        $result = Company::destroy($id);
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('view' , User::class);
        $categories = Category::where('name' , '=' , 'Root Category')->first();
        return view("admin.company.create" , compact('categories'));
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
            $data['user_id'] = Auth::user()->id;
            if (isset($data['detail'])) $data['detail'] = htmlspecialchars($data['detail']);
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs(
                    'public/images/' . $data['user_id'] , 'company' . '.' . $request->file('image')->extension());
                $data['image'] = 'storage/images/' . $data['user_id'] . '/' . 'company' . '.' . $request->file('image')->extension();
            }
            $this->companies->save($data);
            return redirect('admin/company');
        } else
            return abort('403');
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
        $company = $this->companies->find($id);
        $categories = Category::where('name' , '=' , 'Root Category')->first();
        return view('admin.company.edit' , compact('company', 'categories'));
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
        $validator = $this->companies->validator($request->all());

        if ($validator->fails()) {
            return response('error' , 500);
        } else {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if (isset($data['detail'])) $data['detail'] = htmlspecialchars($data['detail']);
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs(
                    'public/images/' . $data['user_id'] , 'company' . '.' . $request->file('image')->extension());
                $data['image'] = 'storage/images/' . $data['user_id'] . '/' . 'company' . '.' . $request->file('image')->extension();
            }
            $this->companies->update($data , $id);
            return redirect('admin/company');
        }
    }
}
