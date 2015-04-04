<?php

class ThreadController extends \BaseController {

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
		
	}

 public function threaddatabase()
{
$texttitle = Input::get('texttitle');
$textofthread = Input::get('textofthread');
if (Input::get('sticky') === 'yes') {
    $sticky = 1;
} else {
    $sticky = 0;
}
$userid = Auth::id();
$categoryid = Input::get('categoryid');
$topicname = $texttitle;
$content = $textofthread;
DB::insert('insert into topic (sticky, topicname, content, userid, categoryid) values (?, ?, ?, ?, ?)', array($sticky, $topicname, $content, $userid, $categoryid));
return Redirect::intended('/forums');
}
     /* the above method fetches the data input into the form and then inserts it into the topic*/

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($categoryid, $id)
	{

			return View::make('newthread')->with('categoryid', $categoryid);

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
