<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comments;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comments::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Comments::create([
                'reply_id' => $request->reply_id,
                'user_id' => $request->user_id,
                'signalisation_id' => $request->signalisation_id,
                'name' => $request->name,
                'mail' => $request->mail,
                'comment' => $request->comment
            ]);
            return response()->json(['message' => 'comment added successfully !'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $comment = Comments::where('id', $id)->first();
            if( !$comment )
                return response()->json(['error' => 'comment doesn\'t exisits .']);
            return response()->json($comment);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
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
        try {
            $comment = Comments::find($id);
            if( ! $comment )
                return response()->json(['error' => 'this comment doesn\'t exists']);
            $comment->update([
                'reply_id' => $request->reply_id,
                'user_id' => $request->user_id,
                'signalisation_id' => $request->signalisation_id,
                'name' => $request->name,
                'mail' => $request->mail,
                'comment' => $request->comment
            ]);
            return response()->json(['message' => 'comment updated successfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $comment = Comments::find($id);
            if( ! $comment )
                return response()->json(['error' => 'error.']);
            $comment->delete();
            return response()->json(['message' => 'comment deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
