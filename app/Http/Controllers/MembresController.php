<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\User;
use Illuminate\Http\Request;
use App\Membre;

class MembresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.role:manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Membre::all()
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
            $user = User::find($request->user_id);
            if( ! $user )
                return response()->json(['message' => 'this user doesn\'t exists !']);

            $equipe = Equipe::find($request->equipe_id);
            if( ! $equipe )
                return response()->json(['message' => 'this team doesn\'t exists !']);

            Membre::create([
                'user_id' => $request->user_id,
                'equipe_id' => $request->equipe_id
            ]);
            return response()->json(['message' => 'Membre added successfully !'], 201);
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
            $membre = Membre::where('user_id', $id)->first();
            if( ! $membre )
                return response()->json(['error' => 'Membre doesn\'t exisits .']);
            return response()->json($membre);
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
            $membre = Membre::where('user_id', $id);
            if( count($membre->get()) == 0 )
                return response()->json(['error' => 'this membre doesn\'t exists']);

            $team = Equipe::find($request->equipe_id);
            if( ! $team )
                return response()->json(['error' => 'this team doesn\'t exists']);

            $membre->update([
                'equipe_id' => $request->equipe_id
            ]);
            return response()->json(['message' => 'membre updated successfully !']);
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
            $membre = Membre::where('user_id', $id);
            if( count($membre->get()) == 0 )
                return response()->json(['error' => 'this membre doesn\'t exists !']);
            $membre->delete();
            return response()->json(['message' => 'membre deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
