<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($topicid, $id)
	{
				return View::make('newpost')->with('topicid', $topicid);

	}

	public function postdatabase()
{
$posttext = Input::get('posttext');

$userid = Auth::id();
$topicid = Input::get('topicid');
$userpostcount = DB::table('user')->where('id', $userid)->pluck('userpostcount');
$userpostcount = $userpostcount + 1;
DB::insert('insert into post (posttext, topicid, userid) values (?, ?, ?)', array($posttext, $topicid, $userid));
$postid = DB::getPdo()->lastInsertId();
$postpostdate = DB::table('post')->where('postid', $postid)->pluck('postpostdate');
DB::table('topic')
            ->where('topicid', $topicid)
            ->update(array('mostrecentpost' => $postpostdate));
DB::table('user')
            ->where('id', $userid)
            ->update(array('userpostcount' => $userpostcount));
return Redirect::intended('/forums');

}

/* the above method inputs the post data recieved from the form where the data was input and posts it into the database */

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
	public function destroy($id)
	{
		//
	}


}
