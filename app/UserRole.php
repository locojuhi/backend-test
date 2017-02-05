<?php

namespace Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model{
    use SoftDeletes;
    protected $fillable = [
        'name', 'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->hasMany('Backend\User');
    }
}
