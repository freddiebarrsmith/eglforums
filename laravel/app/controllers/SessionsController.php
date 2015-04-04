<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('sessions.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	public function register()
{
		return View::make('sessions.register');
}

	public function registerdatabase()
{
$username = Input::get('username');
$password = Input::get('password');
$passwordhash = Hash::make($password); 
DB::insert('insert into user (username, password, userpostcount) values (?, ?, ?)', array($username, $passwordhash, 0));
return Redirect::intended('/forums')->with('message', $username);
}
/* this inserts the data required to register a user into the database */

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
		public function store()
{
$username = Input::get('username');
$password = Input::get('password');
if (Auth::attempt(array('username' => $username, 'password' => $password), true))
{
return Redirect::intended('/forums')->with('message', $username);
}
else {
$salt = DB::table('user')->where('username', $username)->pluck('salt');
$md5hash = DB::table('user')->where('username', $username)->pluck('md5hash');
if( $md5hash == md5(md5($password) . $salt))

{
$passwordblowfish = Hash::make($password);
DB::table('user')
            ->where('username', $username)
            ->update(array('password' => $passwordblowfish));
Auth::login($username);
return Redirect::intended('/forums')->with('message', $username);
}
}
}

/* the above function is quite complex. Firstly it takes the username and password input into the form. It then attempts to authenticate it versus the stored blowfish password, if this cannot be done it encrypts the password using vbulletins encryption mechanism which is md5(md5+salt). If this matches then the user is logged in and the new password is input in blowfish format.
This allows for gradual change of the passwords into blowfish for the new forums */


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
return Redirect::intended('/forums');

	}


}
