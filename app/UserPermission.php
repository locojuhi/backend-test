<?php

namespace Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermission extends Model{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'permission',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    /**
     * The attributes manage softdeletes dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Methods will seach related row with and userpermission instance
    */
    public function user(){
        return $this->belongsTo('Backend\User');
    }
}
