<?php

namespace Backend\Http\Controllers;

use Illuminate\Http\Request;
use Backend\User;
use Backend\Http\Requests\StoreUser;
use Backend\Http\Requests\UpdateUser;
use Session;
use Backend\UserActivation;
use Illuminate\Support\Facades\Auth;
use Backend\UserRole;
class UserController extends Controller
{
    
    public function __construct(){
        /*
        * Filter that allow to access a determinate request
        * param is a string name on App\http\kernel
        */
        $this->middleware('has.access', ['except' => ['activateAccount', 'editprofile', 'update']]);
        $this->middleware('edit.customer', ['only' => ['editprofile']]);
        $this->middleware('edit.own.customer', ['only' => ['editprofile']]);
        $this->middleware('read.permission', ['only' => ['show']]);
        $this->middleware('can.edit', ['only' => ['edit']]);
        $this->middleware('can.delete', ['only' => ['destroy','create']]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::orderBy('first_name', 'ASC')
            ->orderBy('last_name', 'asc')
            ->orderBy('email', 'asc')
            ->paginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $roles = UserRole::all(['id', 'name']);
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\StoreUser $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request){
        $save = new User();
        $params = ['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'email' => $request['email'], 'password' => $request['password'], 'repassword' => $request['repassword']];
        $save->safeRecording($params);
        return redirect('users/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = User::where('id', '=', $id)->get();
        return view('users.show', ['information' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::where('id', '=', $id)->get();
        $roles = UserRole::all(['name', 'id']);
        return view('users.edit', ['information' => $user, 'roles' =>$roles]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\UpdateUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id){
        $user = new User;
        $user->updateuser($request, $id);
        return redirect()->route('users.show', ['id' => $id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::find($id);
        $user->destroy($id);
        Session::flash('message', 'User Deleted Successfully');
        return redirect()->action('UserController@index');
    }
    /**
     * receive code and will compare is that code is valid for avalidate user
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
    */
    public function activateAccount($code){
        $activation = UserActivation::with(['User'])->where('code','=', $code)->get();
        if(!$activation->isEmpty()){
            $rowactivation = UserActivation::where('code', '=', $code);
            $user = null;
            foreach($activation as $activa){
                $user = User::find($activa->user->id);
            }
            $user->active = true;
            $user->save();
            $rowactivation->delete();
            Session::flash('message', 'User Activated Successfully');
            return redirect('login');
        }
        else{
            Session::flash('message', 'Validation Code is not valid, if you cant login to your account please contact the webmaster.');
            return redirect('login');
        }
        
    }
    /**
     * Customers Edit profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile($id){
        $user = User::where('id', '=', $id)->get();
        foreach ($user as $item) {
            if($item->id == Auth::user()->id){
                return view('profile.edit', ['information' => $user]);
            }
            
        }
        
    }
}
