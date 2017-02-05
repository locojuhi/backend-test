<?php

namespace Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Phone extends Model
{
	use SoftDeletes;
    public function users(){
        return $this->belongsToMany('Backend\User');
    }

    protected $fillable = [
        'phone', 'user_id', 'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}
