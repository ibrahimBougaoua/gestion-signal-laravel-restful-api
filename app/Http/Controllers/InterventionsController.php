<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Intervention;
use App\Evaluer;

class InterventionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Intervention::get()
        );
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
            Intervention::create([
                'signalisation_id' => $request->signalisation_id,
                'price' => $request->price,
                'etat_avancement' => $request->etat_avancement,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin
            ]);
            return response()->json(['message' => 'Intervention added successfully !'], 201);
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
            $intervention = Intervention::find($id);
            if( ! $intervention )
                return response()->json(['error' => 'intervention doesn\'t exisits .']);
            return response()->json($intervention);
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
            $intervention = Intervention::find($id);
            if( ! $intervention )
                return response()->json(['error' => 'this intervention doesn\'t exists']);
            $intervention->update([
                'signalisation_id' => $request->signalisation_id,
                'price' => $request->price,
                'etat_avancement' => $request->etat_avancement,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin
            ]);
            return response()->json(['message' => 'intervention updated successfully !']);
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
            $intervention = Intervention::find($id);
            if( ! $intervention )
                return response()->json(['error' => 'error.']);
            $intervention->delete();
            return response()->json(['message' => 'intervention deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
