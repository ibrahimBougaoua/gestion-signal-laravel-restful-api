<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Evaluer;

class EvaluersController extends Controller
{

    protected $messages = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Evaluer::all();
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
      if (empty(request('user_id')) || empty(request('intervention_id')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (Evaluer::where('intervention_id','=',request('intervention_id'))->exists())
        $this->messages['intervention_id'] = 'intervention allready exists !';

      if (empty($this->messages)) {
        $equipe = Evaluer::create($request->all());
        return response()->json($equipe, 201);
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
        return Evaluer::where('intervention_id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ifEvaluer($id) // message(7,6) or message(6,7)
    {
        // return response()->json(['data' => Evaluer::where([['user_id', JWTAuth::parseToken()->toUser()->id],['intervention_id', $id]])->join('users','users.id','=','evaluers.user_id')->first()]);
        return response()->json(['data' => Evaluer::where('intervention_id', $id)->join('users','users.id','=','evaluers.user_id')->first()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chefIntervention($id)
    {
        $evaluer = Evaluer::join('interventions','interventions.id','=','evaluers.intervention_id')
                   ->join('signalisations','signalisations.id','=','signalisation_id')
                   ->join('images','images.signalisation_id','=','signalisations.id')
                   ->where('evaluers.user_id', $id)
                   ->get();
        return response()->json(['data' => $evaluer], 201);
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
        return Evaluer::where('intervention_id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $equipe = Evaluer::where('intervention_id', $id)->delete();
        return 204;
    }
}
