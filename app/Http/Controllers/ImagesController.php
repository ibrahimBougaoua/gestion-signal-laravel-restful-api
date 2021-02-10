<?php

namespace App\Http\Controllers;

use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Images;

class ImagesController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Images::all()
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
        $name = $this->upload($request->name);
        if( ! empty($name) )
        {
            $images = Images::create([
                'name' => $name,
                'size' => 1,
                'user_id' => 1,
                'signalisation_id' => 1
            ]);
            return response()->json(['success' => $images,'message' => 'upload successfully !'], 201);
        }
        return response()->json(['error' => 'error.']);
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
            $image = Images::find($id);
            if( ! $image )
                return response()->json(['error' => 'this image doesn\'t exists']);
            return response()->json(['url' => $image->name]);

        } catch (Exception $e)
        {
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
            $image = Images::where('id', $id);
            if( ! $image )
                return response()->json(['error' => 'error.']);
            $image->delete();
            return response()->json(['message' => 'image deleted suucessfully !']);
        } catch (Exception $e) {
            return response()->json(['error' => 'error.']);
        }
    }
}
