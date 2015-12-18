<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'userlogs';
    public $timestamps = false;
    protected $dates = ['last_logged_in'];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getLastLoggedInAttribute($value){
    	$datetime = $this->asDateTime($value);
    	return $datetime->timezone('Asia/Manila')->toDayDateTimeString();
    }
}
