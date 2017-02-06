<?php

namespace Backend;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use Backend\Mail\AccountConfirmation;
use Hash;
use Session;
use Backend\UserActivation;
use Backend\UserPermission;

class User extends Authenticatable{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'password',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes manage softdeletes dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Mutator for the password attribute.
     * When password is received on a instance of this model
     * the value received will be encrypted with bcrypt
     * $password String
    */
    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = Hash::make($password);
        }
    }

    /**
     * Methods will seach related row with and user instance
    */
    public function userActivation(){
        return $this->hasOne('Backend\UserActivation');
    }

    public function role(){
        return $this->belongsTo('Backend\UserRole');
    }

     public function permission(){
        return $this->hasOne('Backend\UserPermission');
    }
    public function phones(){
        return $this->belongsToMany('Backend\Phone');
    }

    /**
    * Register a new user and generate activation code
    * that will be sent by email 
    * $params Array
    */
    public function safeRecording($params){
        $user = new User();
        $user->first_name   = $params['first_name'];
        $user->last_name    = $params['last_name'];
        $user->email        = $params['email'];
        $user->password     = $params['password'];
        $user->save();
        Session::flash('message', 'User Created Successfully, and Email was sent to confirmate account');
        $activation = new UserActivation();
        $activation->user_id    = $user->id;
        $activation->code       = str_random(40);
        $activation->save();
        Mail::to(['name' => $user->email])->send(new AccountConfirmation($activation));
    }
     
    /**
    * update and existing user
    * grant or revoke read permission
    * $request Array
    * $id integer
    */
    public function updateuser($request, $id){
        $user = User::find($id);
        $user->first_name   = $request['first_name'];
        $user->last_name    = $request['last_name'];
        $user->email        = $request['email'];
        $user->password     = $request['password'];
        if($request['role'] != null){
            $user->role_id = $request['role'];
        }else{
            $user->role_id = 3;
        }
        $user->save();
        $permission = UserPermission::firstOrCreate(['user_id' => $id]);
        Session::flash('message', 'User updated Successfully');
           $permission->permission = '{"user" : {
                "read" : "'.$request['permission'].'"
            }}';
            $permission->save();
    }

}
