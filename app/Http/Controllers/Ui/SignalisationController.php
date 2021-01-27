<?php

namespace App\Http\Controllers\Ui;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignalisationController extends Controller
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
}
