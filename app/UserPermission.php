<?php

namespace Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermission extends Model{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('Backend\User');
    }

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'permission', 'created_at', 'updated_at', 'deleted_at',
    ];
}
