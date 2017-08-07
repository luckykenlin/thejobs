<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $root;

    /**
     * CategoryController constructor.
     */
    function __construct()
    {
        $this->root = Category::where('name' , '=' , 'Root category')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin' , User::class);
        $children = $this->root->children()->get();
        $id = $this->root->first()->id;
        if ($children->isEmpty()) session()->flash('flash_message' , 'No Children right there, Please Create');
        return view('admin.category.index' , compact('children'))->with('id' , $id);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin' , User::class);
        $root = Category::where('id' , '=' , $request->id)->first();
        $category = Category::create(['name' => $request->name]);
        $category->makeChildOf($root);
        session()->flash('flash_message' , 'User has been created!');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('admin' , User::class);
        $children = Category::where('id' , '=' , $id)->first()->children()->get();
        if ($children->isEmpty()) session()->flash('flash_message' , 'No Children right there, Please Create');
        return view('admin.category.index' , compact('children' , 'id'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin' , User::class);
        $root = Category::where('id' , '=' , $id)->first();
        $root->delete();
        session()->flash('flash_message' , 'delete successfully!');
        return back();
    }
}
