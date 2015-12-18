<?php

namespace App\Repositories;

use App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class DeviceStatusRepository implements RepositoryInterface{

	/**
	 * Get all device status.
	 * @return Collection Collection of all device status.
	 */
	public function getAll(){
		return \App\DeviceStatus::all();
	}

	/**
	 * Get all devices from the specified device type.
	 * @param  String $slug Slug of a device type.
	 * @return Collection       Collection of all devices from the specified device type.
	 */
	public function getDevicesBySlug($slug){
		$devices = $this->find($slug)->devices();
	}

	public function getDevicesById($id){
		return $this->findById($id)->devices();
	}

	/**
	 * Find a device status by slug.
	 * @param  String $slug Slug of a device status.
	 * @return \App\DevieStatus       DeviceStatus Model
	 */
	public function findBySlug($slug){
		return \App\DeviceStatus::findBySlugOrFail($slug);
	}

	/**
	 * Find an item by id.
	 * @param  Int $id Id of an item.
	 * @return \App\DeviceStatus     DeviceStatus Model
	 */
	public function findById($id){
		return \App\DeviceStatus::findOrFail($id);
	}

	/**
	 * Get count of all device status.
	 * @return Int Count of all device status.
	 */
	public function getCount(){
		return \App\DeviceStatus::all()->count();
	}

	/**
	 * Get all device status ordered by the specified column.
	 * @param  String $column A column from a database table.
	 * @return Collection         Collection of device status.
	 */
	public function orderBy($column){
		return \App\DeviceStatus::orderBy($column)->get();
	}

	/**
	 * Get Lists of items.
	 * @param  String $value Column from database table.
	 * @param  String $key   Column from database table
	 * @return Collection        Collection Of Items.
	 */
	public function lists($value, $key = ''){
		return \App\DeviceStatus::lists($value ,$key);
	}

	public function first(){
		return \App\DeviceStatus::first();
	}

	public function get($index){
		return \App\DeviceStatus::all()->get($index);
	}

	public function create(Request $request){
		$status = new \App\DeviceStatus();
		$status->name = $request->name;
		$status->save();
		return $status? true: false;
	}

	public function update(Request $request, Model $status){
		return $status->update($request->all());
	}

	public function delete(Model $status){
		return $status->delete();
	}
}