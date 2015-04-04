<?php

class TopicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

 public function postdestroy(){
$postid =  Input::get('postid');
DB::table('post')->where('postid', '=', $postid)->delete();
return Redirect::intended('/forums');
}

/* the above function simply deletes a post when the delete button is pressed */


	public function topicid($topicid) {
	/* $post = post::whereTopicid($topicid)->get(); */
	$userid = post::where('topicid' , '=',$topicid)->get();
	

	$post = DB::table('post')
	->join('user', 'post.userid', '=', 'user.id')
	->select('post.posttext', 'post.postid', 'post.topicid', 'user.id', 'user.username')
	->where('post.topicid', '=', $topicid)
	->paginate(2);


	$user = DB::table('user')->get();
	$content = DB::table('topic')->where('topicid', $topicid )->first();
return View::make('topic')->with(compact('post','topicid'))->with('content',$content);

}

/* the above method fetches the posts, displays them and then paginates the posts */

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
	public function store()
	{
		//
	}


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
