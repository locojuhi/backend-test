<?php

namespace Backend\Http\Controllers;

use Illuminate\Http\Request;
use Backend\User;
use Backend\Http\Requests\StoreUser;
use Backend\Http\Requests\UpdateUser;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::orderBy('first_name', 'ASC')->orderBy('last_name', 'asc')->orderBy('email', 'asc')->paginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        return view('users.edit', ['information' => $user]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message', 'User updated Successfully');
        return redirect()->route('users.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        Session::flash('message', 'User Deleted Successfully');
        return redirect()->action('UserController@index');
    }
}
