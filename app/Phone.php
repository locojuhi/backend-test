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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'phone', 
    	'user_id', 
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
}
