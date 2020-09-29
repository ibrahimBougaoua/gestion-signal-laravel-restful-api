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

    protected $messages = array();
    protected $sexe = ['male','female'];
    protected $roles = ['teacher','student','adminstrator','manager','interventionteam','ats'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where([['id' ,'!=', JWTAuth::parseToken()->toUser()->id]])->orderBy('id', 'desc')->get();
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
      if (empty(request('name')) || empty(request('email')) || empty(request('password')) || empty(request('telephone')) || empty(request('sexe')) || empty(request('role')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (User::where('email','=',request('email'))->exists())
        $this->messages['email'] = 'email allready exists !';

      if (User::where('telephone','=',request('telephone'))->exists())
        $this->messages['telephone'] = 'telephone allready exists !';

      if (request('sexe') != $this->sexe[0] && request('sexe') != $this->sexe[1])
        $this->messages['sexe'] = 'do not play with sexe values please !';

      if (request('role') != $this->roles[0] && request('role') != $this->roles[1] && request('role') != $this->roles[2] && request('role') != $this->roles[3] && request('role') != $this->roles[4] && request('role') != $this->roles[5] && request('role') != $this->roles[6])
        $this->messages['role'] = 'do not play with roles values please !';
    
      if (empty($this->messages)) {
          $User = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'telephone' => request('telephone'),
            'sexe' => request('sexe'),
            'role' => request('role')
          ]);
        return response()->json($User, 201);
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
        return User::where('id', $id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ListOfManagersAndChefs()
    {
        //return response()->json(['data' => User::where([['role', $role],['id' ,'!=', JWTAuth::parseToken()->toUser()->id]])->get()]);
        return response()->json(['data' => User::where('role', 'manager')->orWhere('role' ,'interventionteam')->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserByRole($role)
    {
        //return response()->json(['data' => User::where([['role', $role],['id' ,'!=', JWTAuth::parseToken()->toUser()->id]])->get()]);
        return response()->json(['data' => User::where('role', $role)->get()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allChefsHasNoIntervention()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $users = DB::table('users')->whereNotExists(function ($query) {
               $query->select(DB::raw(5))
                     ->from('equipes')
                     ->whereRaw('equipes.chef_equipe = users.id');
           })->where('role','interventionteam')->get();
        return response()->json(['data' => $users], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allChefsHasNoInformer($signalisation_id)
    {
        $users = DB::table('users')->whereNotExists(function ($query) {
            $signalisation_id = 1;
               $query->select(DB::raw(2,3))
                     ->from('informers')
                     ->whereRaw('informers.chef_id = users.id and informers.signalisation_id = '.$signalisation_id);
           })->where('role','=','interventionteam')->get();
           //})->where([['role','=','interventionteam'],['informers.gest_id','=',$user_id]])->get();
        return response()->json(['data' => $users], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allAtssHasNoInvitationInTeam()
    {
        //$signalisations = Signalisation::where('trash',0)->get();

        $users = DB::table('users')->whereNotExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('membres')
                     ->whereRaw('membres.user_id = users.id');
           })->where('role','ats')->get();
        return response()->json(['data' => $users], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCountByRole($role)
    {
        return response()->json(['data' => User::where('role', $role)->count()]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCount()
    {
      return response()->json(['data' => User::count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userRoleDashboard()
    {
        return User::select('role',DB::raw('count(*) as total'))
               ->groupBy('role')
               ->pluck('total','role')
               ->all();
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
        /*
      if (empty(request('name')) || empty(request('email')) || empty(request('telephone')) || empty(request('sexe')) || empty(request('role')) )
        $this->messages['fields'] = 'you can not use a empty value !';

      if (User::where('email','=',request('email'))->exists())
        $this->messages['email'] = 'email allready exists !';

      if (User::where('telephone','=',request('telephone'))->exists())
        $this->messages['telephone'] = 'telephone allready exists !';

      if (request('sexe') != $this->sexe[0] && request('sexe') != $this->sexe[1])
        $this->messages['sexe'] = 'do not play with sexe values please !';

      if (request('role') != $this->roles[0] && request('role') != $this->roles[1] && request('role') != $this->roles[2] && request('role') != $this->roles[3] && request('role') != $this->roles[4])
        $this->messages['role'] = 'do not play with roles values please !';
*/
      if (empty($this->messages)) {

        return response()->json(['success' => User::where('id', $id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'telephone' => request('telephone'),
            'sexe' => request('sexe'),
            'role' => request('role')
          ]),'message' => 'Intervention updated successfully !']);
      }
      return response()->json(['errors' => $this->messages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::where('id', $id)->delete();
        return 204;
    }
}
