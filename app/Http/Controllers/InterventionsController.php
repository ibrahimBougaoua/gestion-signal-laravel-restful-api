<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Intervention;
use App\Evaluer;

class InterventionsController extends Controller
{    

    protected $messages = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Intervention::all();
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
      if (empty(request('signalisation_id')) || empty(request('price')) || empty(request('etat_avancement')) || empty(request('date_debut')) || empty(request('date_fin')) )
        $this->messages['fields'] = 'you can not use a empty value !';
    
      if (empty($this->messages)) {
        $interventions = Intervention::create($request->all());
        return response()->json($interventions, 201);
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
        return Intervention::where('id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function interventionCountDashbordById($chef_id)
    {
      return response()->json(['data' => Intervention::join('signalisations','signalisations.id','=','signalisation_id')->join('evaluers','evaluers.intervention_id','=','interventions.id')->where('user_id', $chef_id)
               ->count()]);
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
      if (empty(request('price')) || empty(request('etat_avancement')) || empty(request('date_debut')) || empty(request('date_fin')) )
        $this->messages['fields'] = 'you can not use a empty value !';
    
      if (empty($this->messages)) {
        return Intervention::where('id', $id)->update($request->all());
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
        
        $interventions = Intervention::where('id', $id)->delete();
        return 204;
    }
}
