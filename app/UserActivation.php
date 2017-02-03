<?php

namespace Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivation extends Model{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'code', 'created_at', 'updated_at', 'deleted_at',
    ];
    public function user()
    {
        return $this->belongsTo('Backend\User');
    }
}
