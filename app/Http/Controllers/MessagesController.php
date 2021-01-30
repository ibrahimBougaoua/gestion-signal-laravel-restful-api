<?php

namespace App\Http\Controllers;

use App\User;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Messages::get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        try {
            $user = User::find($request->catch_user_id);
            if( ! $user )
                return response()->json(['message' => 'this user doesn\'t exists !']);

            Messages::create([
                'catch_user_id' => $request->catch_user_id,
                'message' => $request->message
            ]);
            return response()->json(['message' => 'Message added successfully !'], 201);
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
            $message = Messages::find($id);
            if( ! $message )
                return response()->json(['message' => 'this message doesn\'t exists !']);
            return response()->json($message);
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
            $message = Messages::find($id);
            if( ! $message )
                return response()->json(['message' => 'this message doesn\'t exists !']);
            $message->delete();
            return response()->json(['message' => 'message deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
