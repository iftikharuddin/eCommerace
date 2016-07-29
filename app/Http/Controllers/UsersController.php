<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Category;
use App\product;
use Hash;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function getSignin(){
		
		return View::make('users.signin');
	}
	
    public function index()
    {
        return Hash::make('ifti');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('users.newaccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return Redirect::to('users/signin')->with('message','Thank you for creating new account.Sign in now');
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
        //
    }
	public function getSignout(){
		Auth::logout();
		return Redirect::to('users/signin')->with('message','Signouted!');
	}
	
	public function postSignin(){
		$password = Hash::make(Input::get('password'));
		$credentials = array('name' => Input::get('name'), 'password' => $password);
							 
		if(Auth::attempt($credentials)){
			return Redirect::to('http://localhost/ecom/')->with('message','Thanks for signin');
		}
		return Redirect::to('users/signin')->with('message','Was Incorrect DATA!');
	} 
	
	
}
