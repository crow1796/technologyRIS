<?php
namespace App\Repositories;

use App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ActivityLogRepository implements RepositoryInterface{
	public function getAll(){
		return \App\Activity::all();
	}

	public function findBySlug($slug){
	}

	public function findById($id){
		return \App\Activity::findOrFail($id);
	}

	public function getCount(){
		return \App\Activity::count();
	}

	public function orderBy($column){
		return \App\Activity::orderBy($column)->get();
	}

	public function lists($value, $key = ''){
		return \App\Activity::lists($value ,$key);
	}

	
	public function create(Request $request){
	}

	public function update(Request $request, Model $model){

	}

	public function delete(Model $model){
		return $model->delete();
	}

	// Device Observers
	public function createCreateLogForDevice(\App\Device $device){
		$activity = new \App\Activity();
		$activity->action = 'Added new Device. SN: '. $device->serial;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createUpdateLogForDevice(\App\Device $device){
		$activity = new \App\Activity();
		$activity->action = 'Updated a device. SN: '. $device->serial;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createDeleteLogForDevice(\App\Device $device){
		$activity = new \App\Activity();
		$activity->action = 'Deleted a device. SN: '. $device->serial;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	// Device type observers
	public function createCreateLogForDeviceType(\App\DeviceType $model){
		$activity = new \App\Activity();
		$activity->action = 'Added new Device Type. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createUpdateLogForDeviceType(\App\DeviceType $model){
		$activity = new \App\Activity();
		$activity->action = 'Updated a Device Type. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createDeleteLogForDeviceType(\App\DeviceType $model){
		$activity = new \App\Activity();
		$activity->action = 'Deleted a Device Type. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	// Device location observers
	public function createCreateLogForDeviceLocation(\App\DeviceLocation $model){
		$activity = new \App\Activity();
		$activity->action = 'Added new Location. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createUpdateLogForDeviceLocation(\App\DeviceLocation $model){
		$activity = new \App\Activity();
		$activity->action = 'Updated a Location. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createDeleteLogForDeviceLocation(\App\DeviceLocation $model){
		$activity = new \App\Activity();
		$activity->action = 'Deleted a Location. Name: '. $model->name;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	// User observers
	public function createCreateLogForUser(\App\User $model){
		$activity = new \App\Activity();
		$activity->action = 'Added new '. $model->permission->name .'. Username: '. $model->username;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createUpdateLogForUser(\App\User $model){
		$activity = new \App\Activity();
		$activity->action = 'Updated a(n) '. $model->permission->name .' Information. Username: '. $model->username;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}

	public function createDeleteLogForUser(\App\User $model){
		$activity = new \App\Activity();
		$activity->action = 'Deleted a(n) '. $model->permission->name .'. Username: '. $model->username;
		$activity->user()->associate(Auth::user());
		$activity->save();
		return $activity;
	}
}