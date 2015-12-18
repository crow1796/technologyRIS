<?php

namespace App\Repositories;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class DeviceLocationRepository implements RepositoryInterface{
	/**
	 * Get all device locations.
	 * @return Collection Collection of all device locations.
	 */
	public function getAll(){
		return \App\DeviceLocation::all();
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
	 * Find a device type by slug.
	 * @param  String $slug Slug of a device type.
	 * @return \App\DeviceType       DeviceType Model
	 */
	public function findBySlug($slug){
		return \App\DeviceLocation::findBySlugOrFail($slug);
	}

	/**
	 * Find an item by id.
	 * @param  Int $id Id of an item.
	 * @return \App\DeviceLocation     DeviceLocation Model
	 */
	public function findById($id){
		return \App\DeviceLocation::findOrFail($id);
	}

	/**
	 * Get count of device locations.
	 * @return int Count of all device locations.
	 */
	public function getCount(){
		return \App\DeviceLocation::all()->count();
	}

	/**
	 * Get all device locations ordered by the specified column.
	 * @param  String $column A column from a database table.
	 * @return Collection         Collection of device locations.
	 */
	public function orderBy($column){
		return \App\DeviceLocation::orderBy($column)->get();
	}

	/**
	 * Get Lists of items.
	 * @param  String $value Column from database table.
	 * @param  String $key   Column from database table
	 * @return Collection        Collection Of Items.
	 */
	public function lists($value, $key = ''){
		return \App\DeviceLocation::lists($value ,$key);
	}

	public function create(Requests\Request $request){
		$location = new \App\DeviceLocation();
		$location->name = $request->name;
		$location->save();
		return $location? true: false;
	}

	public function update(Requests\Request $request, Model $location){
		return $location->update($request->all());
	}

	public function delete(Model $location){
		return $location->delete();
	}
}