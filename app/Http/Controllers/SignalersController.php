<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Signaler;
use App\Signalisation;

class SignalersController extends Controller
{    

    protected $messages = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Signaler::all();
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
      if (empty(request('user_id')) || empty(request('signalisation_id')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (Signaler::where([['user_id','=',request('user_id')],['signalisation_id','=',request('signalisation_id')]])->exists())
        $this->messages['user_id'] = 'user allready exists !';

      if (empty($this->messages)) {
        $signaler = Signaler::create($request->all());
        return response()->json(['success' => $signaler,'message' => 'Signalisation added successfully !']);
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
        return Signaler::where('user_id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signalerCount($id)
    {
        return Signaler::where('user_id', $id)->count();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SignalisationDashboard()
    {
        $data = Signaler::join('signalisations','signalisations.id','=','signalers.signalisation_id')
               ->select('nature',DB::raw('count(*) as total'))
               ->groupBy('nature')
               ->pluck('total','nature')
               ->all();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userSignalisationDashboard($user_id)
    {
        return Signaler::where('user_id', '7')
               ->select('user_id',DB::raw('count(*) as total'))
               ->groupBy('user_id')
               ->pluck('total','user_id')
               ->all();
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
        return Signaler::where('user_id', $id)->update($request->all());
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAllSignales($id)
    {
        
        $signaler = Signaler::where('signalisation_id', $id)->delete();
        return 204;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $signaler = Signaler::where('user_id', $id)->delete();
        return 204;
    }

}
