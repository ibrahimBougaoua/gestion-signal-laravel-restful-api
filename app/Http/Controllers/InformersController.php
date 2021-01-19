<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Illuminate\Http\Request;
use App\Informer;

class InformersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Informer::all()
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
            Informer::create([
                'gest_id' => $request->gest_id,
                'chef_id' => $request->chef_id,
                'signalisation_id' => $request->user_id
            ]);
            return response()->json(['message' => 'informer added successfully !'], 201);
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
            $informer = Informer::where('signalisation_id', $id)->get();
            if( ! $informer )
                return response()->json(['error' => 'informer doesn\'t exisits .']);
            return response()->json($informer);
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
            $informer = Informer::where('signalisation_id', $id);
            if( ! $informer )
                return response()->json(['error' => 'this informer doesn\'t exists']);
            $informer->update([
                'gest_id' => $request->gest_id,
                'chef_id' => $request->chef_id,
                'signalisation_id' => $request->signalisation_id
            ]);
            return response()->json(['message' => 'informer updated successfully !']);
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
            $informer = Informer::where('signalisation_id',$id);
            if( ! $informer )
                return response()->json(['error' => 'error.']);
            $informer->delete();
            return response()->json(['message' => 'informer deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
