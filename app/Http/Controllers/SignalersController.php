<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Signaler;

class SignalersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.role:user', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Signaler::all()
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
            Signaler::create([
                'signalisation_id' => $request->signalisation_id
            ]);
            return response()->json(['message' => 'Signaler added successfully !'], 201);
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
            $signaler = Signaler::where('signalisation_id', $id)->get();
            if( ! $signaler )
                return response()->json(['error' => 'signaler doesn\'t exisits .']);
            return response()->json($signaler);
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
            $signaler = Signaler::where('signalisation_id', $id);
            if( ! $signaler )
                return response()->json(['error' => 'error.']);
            $signaler->delete();
            return response()->json(['message' => 'signaler deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }

}
