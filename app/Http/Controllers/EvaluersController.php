<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluer;

class EvaluersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Evaluer::get()
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
            Evaluer::create([
                'user_id' => $request->user_id,
                'intervention_id' => $request->intervention_id
            ]);
            return response()->json(['message' => 'evaluer added successfully !'], 201);
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
            $evaluer = Evaluer::where('intervention_id', $id)->get();
            if( ! $evaluer )
                return response()->json(['error' => 'evaluer doesn\'t exisits .']);
            return response()->json($evaluer);
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
            $evaluer = Evaluer::where('intervention_id', $id);
            if( ! $evaluer )
                return response()->json(['error' => 'this evaluer doesn\'t exists']);
            $evaluer->update([
                'user_id' => $request->user_id,
                'intervention_id' => $request->intervention_id
            ]);
            return response()->json(['message' => 'evaluer updated successfully !']);
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
            $evaluer = Evaluer::where('intervention_id', $id);
            if( ! $evaluer )
                return response()->json(['error' => 'error.']);
            $evaluer->delete();
            return response()->json(['message' => 'evaluer deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
