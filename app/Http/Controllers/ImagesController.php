<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Images::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';

        if($request->name != '')
        {
            $name = time().'.jpg';
            file_put_contents('storage/images/'.$name, base64_decode($request->name));
            $request->name = $name;
        }

          $images = Images::create([
            'name' => $name,
            'size' => request('size')
          ]);

        return response()->json(['success' => $images,'message' => 'upload successfully !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $img_source = "storage/images/1599424543.png"; // image path/name
        $img_binary = fread(fopen($img_source, "r"), filesize($img_source));
        $img_string = base64_encode($img_binary);
        return $img_string;//Images::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return Images::where('signalisation_id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $images = Images::where('signalisation_id', $id)->delete();
        return 204;
    }
}
