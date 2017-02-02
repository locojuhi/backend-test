<?php

namespace Backend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;
use Session;

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

    public function safeRecording($params){
        $user = new User();
        $user->first_name   = $params['first_name'];
        $user->last_name    = $params['last_name'];
        $user->email        = $params['email'];
        $user->password     = $params['password'];
        $user->save();
        Session::flash('message', 'User Created Successfully');
    }
}
