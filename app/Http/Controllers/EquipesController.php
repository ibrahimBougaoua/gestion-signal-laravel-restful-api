<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipe;
use App\Membre;

class EquipesController extends Controller
{

    protected $messages = array();

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
      if (empty(request('d_f_equipe')) || empty(request('mail')) || empty(request('telephone')) || empty(request('chef_equipe')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (Equipe::where('mail','=',request('mail'))->exists())
        $this->messages['mail'] = 'email allready exists !';

      if (Equipe::where('telephone','=',request('telephone'))->exists())
        $this->messages['telephone'] = 'telephone allready exists !';

      if (Equipe::where('chef_equipe','=',request('chef_equipe'))->exists())
        $this->messages['chef_equipe'] = 'chef equipe allready exists !';
    
      if (empty($this->messages)) {
        $equipe = Equipe::create($request->all());
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
      if (empty(request('d_f_equipe')) || empty(request('mail')) || empty(request('telephone')) || empty(request('chef_equipe')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (Equipe::where('mail','=',request('mail'))->exists())
        $this->messages['mail'] = 'email allready exists !';

      if (Equipe::where('telephone','=',request('telephone'))->exists())
        $this->messages['telephone'] = 'telephone allready exists !';

      if (Equipe::where('chef_equipe','=',request('chef_equipe'))->exists())
        $this->messages['chef_equipe'] = 'chef equipe allready exists !';
    
      if (empty($this->messages)) {
        $equipe = Equipe::findOrFail($id);
        $equipe->update($request->all());
        return $equipe;
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
        
        $equipe = Equipe::findOrFail($id);
        $equipe->delete();

        return 204;
    }
}
