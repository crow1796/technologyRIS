<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Device extends Model implements SluggableInterface
{
    use SluggableTrait;

	protected $table = 'devices';

	protected $fillable = [
		'name',
		'model',
        'brand',
        'serial',
        'description',
		'type_id',
		'status_id',
		'location_id'
	];

	protected $dates = [
		'created_at'
	];

	protected $sluggable = [
		'build_from' => 'name',
		'save_to' => 'slug'
	];

	public function __construct(){
		
	}

	public function deviceType(){
		return $this->belongsTo('App\DeviceType', 'type_id', 'id');
	}

	public function deviceStatus(){
		return $this->belongsTo('App\DeviceStatus', 'status_id', 'id');
	}

	public function deviceLocation(){
		return $this->belongsTo('App\DeviceLocation', 'location_id', 'id');
	}

}
