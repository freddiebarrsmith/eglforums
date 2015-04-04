<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topic = topic::all();

			return View::make('category')
			->with('category', $topic);

	}




public function categoryid($categoryid) {
     /* $topic = topic::where('categoryid','=',$categoryid)->get(); */

$topic = DB::table('topic')
->join('user', 'topic.userid', '=', 'user.id')
->select('user.username', 'user.id', 'topic.topicid', 'topic.topicname', 'topic.categoryid', 'topic.sticky', 'topic.mostrecentpost')
->where('topic.categoryid', '=', $categoryid)
->orderBy('topic.sticky', 'DESC')
->orderBy('topic.mostrecentpost', 'ASC')
->paginate(2);

           $categoryid = $categoryid;
 return View::make('category', compact('topic','categoryid'));
return $topic;
}


/* the above method fetches the topicss, displays them and then paginates the topics */


public function threaddestroy(){
$topicid =  Input::get('topicid');
DB::table('topic')->where('topicid', '=', $topicid)->delete();
return Redirect::intended('/forums');
}


/* the above function simply deletes a topic when the delete button is pressed */


	 /* Show the form for creating a new resource
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
