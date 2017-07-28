<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Role\RoleRepository;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Utility\DataTableUtility;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roles;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
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
            $pageData = $this->roles->fetch( $pageInfo, null, $orderColumn, $searchColumn);
            return response()->json($pageData);
        } else {
            return view('admin.role.index' );
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
        $this->authorize('update' , [User::class, $id]);
        $role = $this->roles->find($id);
        $role['permission'] = json_decode( $role['permission']);
        return view('admin.role.edit',compact('role'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin',User::class);
        $data = $request->all();
        $data['permission'] = json_encode($request['permission']);
        $validator = $this->roles->validator($data);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->roles->update($data , $id);
            session()->flash('flash_message','successful!');
            return redirect('admin/role');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.role.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store',User::class);
        $data = $request->all();
        $data['permission'] = json_encode($request['permission']);
        $validator = $this->roles->validator($data);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->roles->save($data);
            session()->flash('flash_message','successful!');
            return redirect('admin/role');
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
        $this->authorize('delete' , [User::class, $id]);
        $result = Role::destroy($id);
        return response()->json($result);
    }
}
