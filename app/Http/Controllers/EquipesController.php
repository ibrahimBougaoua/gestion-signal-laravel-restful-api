<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\Membre;

class EquipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipe::all();
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
        $equipe = Equipe::create($request->all());
        return response()->json($equipe, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Equipe::where('equipes.id','=',$id)
               ->join('users','users.id','=','equipes.chef_equipe')
               ->select('equipes.id','equipes.d_f_equipe','equipes.mail','equipes.telephone','equipes.created_at','users.name')
               ->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipeCount()
    {
        return Equipe::count();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipeDashboard()
    {
        return Equipe::join('membres','membres.equipe_id','=','equipes.id')
               ->select('d_f_equipe',DB::raw('count(*) as total'))
               ->groupBy('d_f_equipe')
               ->pluck('total','d_f_equipe')
               ->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipeMembre($id)
    {
        ///return Equipe::where('equipe_id', '1')->
        return Equipe::
               join('membres','membres.equipe_id','=','equipes.id')
               ->join('users','users.id','=','user_id')
               ->select('users.id','users.name','users.email','users.telephone','users.sexe','users.role','users.created_at')
               ->where('equipe_id','=',$id)->get()
               ->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipeMembreById($id)
    {
        ///return Equipe::where('equipe_id', '1')->
        return Equipe::
               join('membres','membres.equipe_id','=','equipes.id')
               ->join('users','users.id','=','user_id')
               ->select('users.id','users.name','users.email','users.telephone','users.sexe','users.created_at')
               ->where('equipe_id','=',$id)->get()
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
        $equipe = Equipe::findOrFail($id);
        $equipe->update($request->all());

        return $equipe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $equipe = Equipe::findOrFail($id);
        $equipe->delete();

        return 204;
    }
}
