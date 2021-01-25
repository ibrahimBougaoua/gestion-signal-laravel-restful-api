<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignalisationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Signalisation;

class SignalisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Signalisation::get()
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
            return Signalisation::create([
                'desc' => $request->desc,
                'localisation' => $request->localisation,
                'lieu' => $request->lieu,
                'nature' => $request->nature,
                'cause' => $request->cause
            ]);
            return response()->json(['message' => 'Signalisation added successfully !'], 201);
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
            $signalisation = Signalisation::find($id);
            if( ! $signalisation )
                return response()->json(['error' => 'signalisation doesn\'t exisits .']);
            return response()->json($signalisation);
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
            $signalisation = Signalisation::find($id);
            if( ! $signalisation )
                return response()->json(['error' => 'this signalisation doesn\'t exists']);
            $signalisation->update([
                'desc' => $request->desc,
                'localisation' => $request->localisation,
                'lieu' => $request->lieu,
                'nature' => $request->nature,
                'cause' => $request->cause,
                'trash' => $request->trash
            ]);
            return response()->json(['message' => 'signalisation updated successfully !']);
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
            $signalisation = Signalisation::find($id);
            if( ! $signalisation )
                return response()->json(['error' => 'error.']);
            $signalisation->delete();
            return response()->json(['message' => 'signalisation deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
