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
        return Equipe::get();
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
            Equipe::create([
                'd_f_equipe' => $request->d_f_equipe,
                'mail' => $request->mail,
                'telephone' => $request->telephone,
                'chef_equipe' => $request->chef_equipe
            ]);
            return response()->json(['message' => 'team added successfully !'], 201);
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
            $equipe = Equipe::where('id', $id)->first();
            if( ! $equipe )
                return response()->json(['error' => 'equipe doesn\'t exisits .']);
            return response()->json($equipe);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }

    /**
     * equipe count.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        return response()->json([
            'count' => Equipe::count()
        ]);
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
            $equipe = Equipe::find($id);
            if( ! $equipe )
                return response()->json(['error' => 'this equipe doesn\'t exists']);
            $equipe->update([
                'd_f_equipe' => $request->d_f_equipe,
                'mail' => $request->mail,
                'telephone' => $request->telephone,
                'chef_equipe' => $request->chef_equipe
            ]);
            return response()->json(['message' => 'equipe updated successfully !']);
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
            $equipe = Equipe::find($id);
            if( ! $equipe )
                return response()->json(['error' => 'error.']);
            $equipe->delete();
            return response()->json(['message' => 'equipe deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
