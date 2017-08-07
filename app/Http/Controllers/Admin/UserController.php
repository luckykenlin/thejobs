<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utility\DataTableUtility;
use Illuminate\Http\Request;
use \App\Contracts\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $users;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    function __construct(UserRepository $users)
    {
        $this->users = $users;
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
            $pageData = $this->users->fetch( $pageInfo, null, $orderColumn, $searchColumn);
            return response()->json($pageData);
        } else {
            return view('admin.user.index' );
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
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
        $validator = $this->users->validator($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->users->save($request->all());
            return redirect('admin/user');
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
        $user = $this->users->find($id);
        return view('admin.user.edit',compact('user'));
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
        $this->authorize('update' , [User::class, $id]);
        $validator = $this->users->validator($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs(
                    'public/images/' . $request->user()->id , $request->user()->id . '.' . $request->file('image')->extension());
                $data = $request->all();
                $data['image'] = 'storage/images/' . $request->user()->id . '/' . $request->user()->id . '.' . $request->file('image')->extension();
            } else $data = $request->all();
            $this->users->update($data , $id);
            session()->flash('flash_message','successful!');
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
        if ($this->users->find($id)->email == 'ken@example.com')
            return back();
        $result = User::destroy($id);
        return response()->json($result);
    }
}
