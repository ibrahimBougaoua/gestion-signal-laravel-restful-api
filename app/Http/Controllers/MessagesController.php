<?php

namespace App\Http\Controllers;

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
            Messages::all()
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
            Messages::create([
                'send_user_id' => $this->send_user_id,
                'catch_user_id' => $this->catch_user_id,
                'message' => $this->message
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
                return response()->json(['error' => 'message doesn\'t exisits .']);
            return response()->json($message);
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
            $message = Messages::find($id);
            if( ! $message )
                return response()->json(['error' => 'this message doesn\'t exists']);
            $message->update([
                'send_user_id' => $this->send_user_id,
                'catch_user_id' => $this->catch_user_id,
                'message' => $this->message
            ]);
            return response()->json(['message' => 'message updated successfully !']);
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
                return response()->json(['error' => 'error.']);
            $message->delete();
            return response()->json(['message' => 'message deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
