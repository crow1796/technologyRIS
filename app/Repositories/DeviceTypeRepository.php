<?php
namespace App\Repositories;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class DeviceTypeRepository implements RepositoryInterface{

	/**
	 * Get all device types.
	 * @return Collection Collection of all device types.
	 */
	public function getAll(){
		return \App\DeviceType::all();
	}

	/**
	 * Get all devices from the specified device type.
	 * @param  String $slug Slug of a device type.
	 * @return Collection       Collection of all devices from the specified device type.
	 */
	public function getDevicesBySlug($slug){
		return $this->findBySlug($slug)->devices();
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
		return \App\DeviceType::findBySlugOrFail($slug);
	}

	/**
	 * Find an item by id.
	 * @param  Int $id Id of an item.
	 * @return \App\DeviceType     DeviceType Model
	 */
	public function findById($id){
		return \App\DeviceType::findOrFail($id);
	}

	/**
	 * Get count of device types.
	 * @return int Count of all device types.
	 */
	public function getCount(){
		return \App\DeviceType::all()->count();
	}

	/**
	 * Get all device types ordered by the specified column.
	 * @param  String $column A column from a database table.
	 * @return Collection         Collection of device types.
	 */
	public function orderBy($column){
		return \App\DeviceType::orderBy($column)->get();
	}

	/**
	 * Get Lists of items.
	 * @param  String $value Column from database table.
	 * @param  String $key   Column from database table
	 * @return Collection        Collection Of Items.
	 */
	public function lists($value, $key = ''){
		return \App\DeviceType::lists($value ,$key);
	}

	/**
	 * Delete device type.
	 * @param  \App\DeviceType $deviceType [description]
	 * @return boolean                      [description]
	 */
	public function delete(Model $deviceType){
		return $deviceType->delete();
	}

	/**
	 * Update device type.
	 * @param  Requests\Request $request    [description]
	 * @param  \App\DeviceType  $deviceType [description]
	 * @return [type]                       [description]
	 */
	public function update(Requests\Request $request, Model $deviceType){
		return $deviceType->update($request->all());
	}

	/**
	 * Create new device type.
	 * @param  Requests\Request $request [description]
	 * @return \App\DeviceType                    [description]
	 */
	public function create(Requests\Request $request){
		$deviceType = new \App\DeviceType();
		$deviceType->name = $request->name;
		$deviceType->save();
		return $deviceType? true: false;
	}
}