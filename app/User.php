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
        'first_name', 'last_name', 'email', 'password', 'role_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($value){
        if(!empty($value)){

        }
        $this->attributes['password'] = Hash::make($value);
    }

    public function userActivation()
    {
        return $this->hasOne('Backend\UserActivation');
    }

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
     public function role(){
        return $this->belongsTo('Backend\UserRole');
    }

     public function permission(){
        return $this->hasOne('Backend\UserPermission');
    }
    public function phones(){
        return $this->belongsToMany('Backend\Phone');
    }

    public function updateuser($request, $id){
        $user = User::find($id);
        $user->first_name   = $request['first_name'];
        $user->last_name    = $request['last_name'];
        $user->email        = $request['email'];
        $user->password     = $request['password'];
        $user->role_id      = $request['role'];
        $user->save();
        //$permission = $user->permission()->get();
        $permission = UserPermission::firstOrCreate(['user_id' => $id]);
        Session::flash('message', 'User updated Successfully');
           $permission->permission = '{"user" : {
                "read" : "'.$request['permission'].'"
            }}';
            $permission->save();
        //$this->permissionupdate($request, $permission, $id);       
    }

    public function permissionupdate($request, $permission, $id){
        //If no permission existed before
        if($permission->isEmpty()){
            //New object Instance
            $newpermission = new UserPermission();
            //Binding Params
            $newpermission->user_id = $id;
            $newpermission->permission = "user: {
                'read' : ".$request['permission']."
            }";
            //save new Attributes
            $newpermission->save();
        }else{
            $permission->permission = "user: {
                'read' : ".$request['permission']."
            }";
            $permission->save();
        }
    }
}
