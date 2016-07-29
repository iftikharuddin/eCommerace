<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\product;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
 
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('store.index')->with('products', product::take(4)->orderBy('created_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('InsertCategory');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();		
			return Redirect::to('admin/categories')->with('message', 'Category Created');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('store.show')->with('product', product::find($id));
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find(Input::get('id'));
		var_dump($input);
		if($category){
			$category->delete();
			return Redirect::to('admin/categories');
		}
    }
	public function getCategory($cat_id){
		return View::make('store.category')->with('products',product::where('category_id', '=', $cat_id)->paginate(6))->with('category', Category::find($cat_id));
	}
	
	public function getSearch(){
		$keyword = Input::get('keyword');
		return View::make('store.search')
			->with('products',product::where('title','LIKE','%'.$keyword.'%')
			->get())->with('keyword',$keyword);
	}
}

