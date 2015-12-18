<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = [
        'path',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
