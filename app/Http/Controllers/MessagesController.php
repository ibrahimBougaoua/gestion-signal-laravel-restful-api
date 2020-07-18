<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;

class MessagesController extends Controller
{
    
    protected $messages = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Messages::all();
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
      if (empty(request('send_user_id')) || empty(request('catch_user_id')) || empty(request('message')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (empty($this->messages)) {
        $messages = Messages::create($request->all());
        return response()->json($messages, 201);
      }
      return response()->json(['errors' => $this->messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Messages::where('id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMessage($id) // message(7,6) or message(6,7)
    {
    	print_r(Auth::id());
        return Messages::where([['send_user_id', '7'],['catch_user_id', '6']])->orWhere([['send_user_id', '6'],['catch_user_id', '7']])->get();
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
      if ( empty(request('message')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (empty($this->messages)) {
        return Messages::where('id', $id)->update($request->all());
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
        
        $messages = Messages::where('id', $id)->delete();
        return 204;
    }
}
