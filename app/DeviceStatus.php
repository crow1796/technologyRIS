<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
class DeviceStatus extends Model implements SluggableInterface
{
    use SluggableTrait;

	protected $table = 'status';
	protected $fillable = ['name'];
	protected $sluggable = [
		'build_from' => 'name',
		'save_to' => 'slug'
	];
	public function __construct(){

	}

	public function devices(){
		return $this->hasMany('App\Device', 'status_id', 'id');
	}

}
