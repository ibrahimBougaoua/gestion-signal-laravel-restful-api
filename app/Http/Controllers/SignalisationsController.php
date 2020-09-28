<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Signalisation;
use App\Signaler;
use App\Comments;

class SignalisationsController extends Controller
{

    protected $messages = array();
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $signalisations = Signalisation::join('images','images.signalisation_id','=','signalisations.id')
               ->join('signalers','signalers.signalisation_id','=','signalisations.id')
               ->join('users','users.id','=','images.user_id')
               ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.created_at','images.user_id','images.name','users.name as user_name')
               ->where('trash',0)->get();
        return response()->json(['data' => $signalisations], 201);
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

      if (empty(request('desc')) || empty(request('localisation')) || empty(request('lieu')) || empty(request('nature')) || empty(request('cause')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (empty($this->messages)) {
        $signalisation = Signalisation::create($request->all());
        return response()->json($signalisation, 201);
      }
      return response()->json(['errors' => $this->messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Signalisation::where('id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByValue()
    {
      if ( ! empty(request('desc')) )
             return Signalisation::where('desc','like', request('desc'))->orderBy('id')->get();

      if ( ! empty(request('nature')) )
             return Signalisation::where('nature','like', request('nature'))->orderBy('id')->get();
         
      if ( ! empty(request('cause')) )
             return Signalisation::where('cause','like', request('cause'))->orderBy('id')->get();
         
      if ( ! empty(request('localisation')) )
             return Signalisation::where('localisation','like', request('localisation'))->orderBy('id')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allSignalerCount()
    {
        return response()->json(['data' => Signalisation::count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allSignalisationByUserId($user_id)
    {
        return response()->json(['data' => Signalisation::join('images','images.signalisation_id','=','signalisations.id')
                                           ->join('signalers','signalers.signalisation_id','=','signalisations.id')
                                           ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.edit','signalisations.created_at','images.user_id','images.name')
                                           ->where('trash',0)->where('images.user_id',$user_id)->get()
                                        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allSignalisationByUserIdCountDashboard($user_id)
    {
        return response()->json(['data' => Signalisation::join('signalers','signalers.signalisation_id','=','signalisations.id')->where('user_id',$user_id)->count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashSignalisationByUserIdCountDashboard($user_id)
    {
        return response()->json(['data' => Signalisation::join('signalers','signalers.signalisation_id','=','signalisations.id')->where('user_id',$user_id)->where('trash',1)->count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SignalisationCompleteByUserIdCountDashboard($user_id)
    {
        return response()->json(['data' => Signalisation::join('signalers','signalers.signalisation_id','=','signalisations.id')->join('interventions','interventions.signalisation_id','=','signalisations.id')->where('etat_avancement','terminer')->where('user_id',$user_id)->where('trash',1)->count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SignalisationCommentsDashboard()
    {
        $data = Signalisation::join('comments','comments.signalisation_id','=','signalisations.id')
               ->select('cause',DB::raw('count(*) as total'))
               ->groupBy('cause')
               ->pluck('total','cause')
               ->all();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SignalisationEtatAvancementDashboard()
    {
        $data = Signalisation::join('interventions','interventions.signalisation_id','=','signalisations.id')
               ->select('etat_avancement',DB::raw('count(*) as total'))
               ->groupBy('etat_avancement')
               ->pluck('total','etat_avancement')
               ->all();
        return $data;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signalisationCount()
    {
        return response()->json(['data' => Signalisation::count()]);
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
      //if (empty(request('desc')) || empty(request('localisation')) || empty(request('lieu')) || empty(request('nature')) || empty(request('cause')) || empty(request('trash')) )
        //$this->messages['fields'] = 'you can not use a empty value !';

      //if (empty($this->messages)) {
        return response()->json(['success' => Signalisation::where('id', $id)->update($request->all()),'message' => 'Signalisation updated successfully !']);
      //} 
      //return response()->json(['errors' => $this->messages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $signalisation = Signalisation::where('id', $id)->delete();
        return 204;
    }
}
