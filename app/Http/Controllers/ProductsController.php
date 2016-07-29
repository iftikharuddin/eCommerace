<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use View;
use App\product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use File;


class ProductsController extends Controller
{
 	public function __construct(){
		parent::__construct();
		$this->middleware('isAdmin');

	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = array();
		foreach(Category::all() as $category){
			$categories[$category->id] = $category->name;
		}
        return View::make('products.index')->with('products', product::all())->with('categories', $categories); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = array();
		foreach(Category::all() as $category){
			$categories[$category->id] = $category->name;
		}
        return View::make('products')->with('categories', $categories); ;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$product = new product;
			$product->category_id = Input::get('category_id');
			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');

		
			$image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/' . $filename);
            Image::make($image->getRealPath())->resize(468, 249)->save($path);
            $product->image = 'public/img/'.$filename;
            $product->save();
		
			/*$image = Input::file('image');
			$filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(468, 249)->save('img/'.$filename);
			$product->image = 'img/'.$filename;
			$product->save();*/		
			return Redirect::to('admin/products')->with('message', 'product Created');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product = product::find(Input::get('id'));
		if($product){
			File::delete('public/'.$product->image);
			$product->delete();
			return Redirect::to('admin/products');
		}
    }
}
