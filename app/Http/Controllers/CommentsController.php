<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comments;

class CommentsController extends Controller
{

    protected $messages = array();
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comments::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (empty(request('reply_id')) || empty(request('user_id')) || empty(request('signalisation_id')) || empty(request('name')) || empty(request('mail')) || empty(request('comment')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (empty($this->messages)) {
        $comments = Comments::create($request->all());
        return response()->json($comments, 201);
      }
      return response()->json(['errors' => $this->messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($comment_id)
    {
        return Comments::where('id', $comment_id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllSignalisationComments($signalisation_id)
    {
        return Comments::where('signalisation_id', $signalisation_id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllCommentsCount()
    {
        return Comments::count();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllComments($user_id)
    {
        return Comments::where('user_id','=',$user_id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CommentsCountDashboard($user_id)
    {
        return Comments::where('user_id', $user_id)->count();
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
      if (empty(request('reply_id')) || empty(request('user_id')) || empty(request('signalisation_id')) || empty(request('name')) || empty(request('mail')) || empty(request('comment')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (empty($this->messages)) {
        return Comments::where('id', $id)->update($request->all());
      }
      return response()->json(['errors' => $this->messages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $comments = Comments::where('id', $id)->delete();
        return 204;
    }
}