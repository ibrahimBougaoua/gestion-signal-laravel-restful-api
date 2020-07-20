<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informer;

class InformersController extends Controller
{

    protected $messages = array();
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Informer::all();
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
      //if (empty(request('gest_id')) || empty(request('chef_id')) || empty(request('signalisation_id')) )
      //  $this->messages['fields'] = 'you can not use a empty value !';

      //if (Signaler::where('user_id','=',request('user_id'))->exists())
      //  $this->messages['user_id'] = 'user allready exists !';

      //if (empty($this->messages)) {
        $informer = Informer::create($request->all());
        return response()->json($informer, 201);
      //}
      //return response()->json(['errors' => $this->messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Informer::where('signalisation_id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ifInformer($id) // message(7,6) or message(6,7)
    { // gest_id == user_id
        return Informer::where([['gest_id', '7'],['signalisation_id', $id]])->join('users','users.id','=','informers.gest_id')->first();
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
        return Informer::where('signalisation_id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $informer = Informer::where('signalisation_id', $id)->delete();
        return 204;
    }
}
