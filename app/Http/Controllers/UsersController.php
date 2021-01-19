<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
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
          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'telephone' => $request->telephone,
            'sexe' => $request->sexe,
            'role' => $request->role
          ]);
          return response()->json(['message' => 'User added successfully !'], 201);
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
            $user = User::where('id', $id)->first();
            if( !$user )
                return response()->json(['error' => 'User doesn\'t exisits .']);
            return response()->json($user);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }

    /**
     * user count.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
      return response()->json([
          'count' => User::count()
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
            $user = User::find($id);
            if( ! $user )
                return response()->json(['error' => 'this user doesn\'t exists']);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'telephone' => $request->telephone,
                'sexe' => $request->sexe,
                'role' => $request->role
            ]);
            return response()->json(['message' => 'user updated successfully !']);
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
            $user = User::find($id);
            if( ! $user )
                return response()->json(['error' => 'error.']);
            $user->delete();
            return response()->json(['message' => 'user deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
