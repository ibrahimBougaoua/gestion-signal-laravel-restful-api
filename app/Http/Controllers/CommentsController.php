<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Signalisation;
use Illuminate\Http\Request;
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
        return response()->json([
            Comments::get()
        ]);
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
            $signalisation = Signalisation::find($request->signalisation_id);
            if( ! $signalisation )
                return response()->json(['message' => 'this signalisation doesn\'t exists !']);

            $reply_id = ! Comments::find($request->reply_id) ? 0 : $request->reply_id;

            Comments::create([
                'reply_id' => $reply_id,
                'signalisation_id' => $request->signalisation_id,
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
            $comment = Comments::find($id);
            if( ! $comment )
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
                return response()->json(['error' => 'this comment doesn\'t exists !']);
            $comment->delete();
            return response()->json(['message' => 'comment deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
