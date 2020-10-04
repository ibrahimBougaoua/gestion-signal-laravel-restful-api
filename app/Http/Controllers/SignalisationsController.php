<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Signalisation;
use App\Signaler;
use App\Comments;
use App\User;

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
               //->join('signalers','signalers.signalisation_id','=','signalisations.id')
               ->join('users','users.id','=','images.user_id')
               ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.edit','signalisations.created_at','images.user_id','images.name','users.name as user_name')
               ->where('trash',0)->orderBy('signalisations.id', 'desc')->get();
        return response()->json(['data' => $signalisations], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signalisationHasEnding()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $signalisations = Signalisation::join('images','images.signalisation_id','=','signalisations.id')
               ->join('signalers','signalers.signalisation_id','=','signalisations.id')
               ->join('users','users.id','=','images.user_id')
               ->join('interventions','interventions.signalisation_id','=','signalisations.id')
               ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.edit','signalisations.created_at','images.user_id','images.name','users.name as user_name','interventions.etat_avancement')
               ->where('etat_avancement','terminer')->orderBy('signalisations.id', 'desc')->get();
        return response()->json(['data' => $signalisations], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $signalisations = Signalisation::join('images','images.signalisation_id','=','signalisations.id')
               ->join('signalers','signalers.signalisation_id','=','signalisations.id')
               ->join('users','users.id','=','images.user_id')
               ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.edit','signalisations.created_at','images.user_id','images.name','users.name as user_name')
               ->where('trash',1)->orderBy('signalisations.id', 'desc')->get();
        return response()->json(['data' => $signalisations], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signalisationsByAuthor($user_id)
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $signalisations = Signalisation::join('images','images.signalisation_id','=','signalisations.id')
               ->join('signalers','signalers.signalisation_id','=','signalisations.id')
               ->join('users','users.id','=','images.user_id')
               ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.trash','signalisations.edit','signalisations.created_at','images.user_id','images.name','users.name as user_name')
               ->where('images.user_id',$user_id)->orderBy('signalisations.id', 'desc')->get();
        return response()->json(['data' => $signalisations,'user_data' => User::where('id',$user_id)->first()], 201);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $signalisations = DB::table('signalisations')->whereNotExists(function ($query) {
               $query->select(DB::raw(2))
                     ->from('interventions')
                     ->whereRaw('interventions.signalisation_id = signalisations.id');
           })->get();
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

      //if (empty(request('desc')) || empty(request('localisation')) || empty(request('lieu')) || empty(request('nature')) || empty(request('cause')) )
        //$this->messages['fields'] = 'you can not use a empty value !';

      //if (empty($this->messages)) {
        //$signalisation = Signalisation::create($request->all());
        //return response()->json($signalisation, 201);
      //}
      //return response()->json(['errors' => $this->messages]);


          $signalisation = Signalisation::create([
            'desc' => request('desc'),
            'localisation' => request('localisation'),
            'lieu' => request('lieu'),
            'nature' => request('nature'),
            'nature' => request('nature'),
            'cause' => request('cause'),
            'edit' => request('edit'),
            'trash' => request('trash')
          ]);
        return response()->json($signalisation, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['data' => Signalisation::join('images','images.signalisation_id','=','signalisations.id')
                                           ->join('users','users.id','=','images.user_id')
                                           ->select('signalisations.id','signalisations.desc','signalisations.localisation','signalisations.lieu','signalisations.nature','signalisations.cause','signalisations.created_at','images.user_id','images.name','users.name as user_name')
                                           ->where('trash',0)->where('signalisations.id',$id)->first()
                                        ]);
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
