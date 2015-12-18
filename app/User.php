<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,
                                    SluggableInterface
{
    use Authenticatable, Authorizable, CanResetPassword, SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trisusers';

    protected $sluggable = ['build_from' => 'username',
                            'save_to' => 'slug'
                            ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username',
                            'email',
                            'password',
                            'firstname',
                            'middlename',
                            'lastname'
                              ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function photo(){
        return $this->hasOne('App\Photo', 'user_id', 'id');
    }

    public function permission(){
        return $this->belongsTo('App\Permission', 'permission_id', 'id');
    }

    public function activities(){
        return $this->hasMany('App\Activity', 'user_id', 'id');
    }

    public function logs(){
        return $this->hasMany('App\UserLog', 'user_id', 'id');
    }

    public function isAdmin(){
        return $this->permission == \App\Permission::first()? true: false;
    }
}
