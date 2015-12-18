<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Permission extends Model implements SluggableInterface
{
	use SluggableTrait;
	protected $table = 'permissions';
    protected $fillable = ['name'];
    protected $sluggable = [
    					'build_from' => 'name',
    					'save_to' => 'slug'
    					];

    public function users(){
    	return $this->hasMany('App\User', 'permission_id', 'id');
    }
}
