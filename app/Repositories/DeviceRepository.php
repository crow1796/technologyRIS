<?php
namespace App\Repositories;

use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class DeviceRepository implements RepositoryInterface{

	protected $deviceTypeRepository;
	protected $deviceStatusRepository;
	protected $deviceLocationRepository;

	public function __construct(
		DeviceTypeRepository $deviceTypeRepository,
		 DeviceStatusRepository $deviceStatusRepository,
		 DeviceLocationRepository $deviceLocationRepository){

		$this->deviceTypeRepository = $deviceTypeRepository;
		$this->deviceStatusRepository = $deviceStatusRepository;
		$this->deviceLocationRepository = $deviceLocationRepository;

	}

	/**
	 * Get all devices.
	 * @return Collection Collection of devices.
	 */
	public function getAll(){
		return \App\Device::all();
	}

	/**
	 * Find a device by slug.
	 * @param  String $slug slug of a device
	 * @return \App\Device       Device Model
	 */
	public function findBySlug($slug){
		return \App\Device::findBySlugOrFail($slug);
	}

	/**
	 * Find an item by id.
	 * @param  Int $id Id of an item.
	 * @return \App\Device     Device Model
	 */
	public function findById($id){
		return \App\Device::findOrFail($id);
	}

	/**
	 * Get count of all devices.
	 * @return int Count of all devices.
	 */
	public function getCount(){
		return \App\Device::all()->count();
	}

	/**
	 * Get Lists of items.
	 * @param  String $value Column from database table.
	 * @param  String $key   Column from database table
	 * @return Collection        Collection Of Items.
	 */
	public function lists($value, $key = ''){
		return \App\Device::lists($value ,$key);
	}

	/**
	 * Create new device.
	 * @param  Request $request Request for creating new device.
	 * @return \App\Device           Device Model
	 */
	public function create(Requests\Request $request){
		$device = new \App\Device;
		$device->name = trim($request->name);
        $device->model = trim($request->model);
        $device->brand = trim($request->brand);
        $device->serial = trim($request->serial);
        $device->deviceType()
        		->associate($request->type_id);
        $device->deviceLocation()
        		->associate($request->location_id);
        $device->description = trim($request->description);
        $device->deviceStatus()
        		->associate($this->getDeviceStatusRepository()->first()->id);
        $device->save();
        return $device;
	}

	/**
	 * Update existing device.
	 * @param  Request $request Request for updating a device.
	 * @param  \App\Device  $device  Device Model.
	 * @return \App\Device           Device Model.
	 */
	public function update(Requests\Request $request, Model $device){
		$device->name = trim($request->name);
        $device->model = trim($request->model);
        $device->brand = trim($request->brand);
        $device->serial = trim($request->serial);

        \App\DeviceType::find($request->type_id)->devices()->save($device);
        \App\DeviceLocation::find($request->location_id)->devices()->save($device);

        $device->description = trim($request->description);
        $device->resluggify();
        $device->save();
        return $device;
	}

	/**
	 * Get all devices ordered by the specified column.
	 * @param  String $column Column from a database table.
	 * @return Collection         Collection of devices.
	 */
	public function orderBy($column){
		return \App\Device::orderBy($column)->get();
	}

	/**
	 * Delete a device
	 * @param  \App\Device $device Device Model.
	 * @return bool              Determines if the devices has been deleted.
	 */
	public function delete(Model $device){
		return $device->delete();
	}

	public function findBySlugOrIdOrFail($id){
		return \App\Device::findBySlugOrIdOrFail($id);
	}

	/**
	 * Get the device type repository instance.
	 * @return DeviceTypeRepository Device Type Repository
	 */
	public function getDeviceTypeRepository(){
		return $this->deviceTypeRepository;
	}

	/**
	 * Get the device status repository instance.
	 * @return DeviceStatusRepository Device Status Repository
	 */
	public function getDeviceStatusRepository(){
		return $this->deviceStatusRepository;
	}

	/**
	 * Get the device location repository instance.
	 * @return DeviceLocationRepository Device Location Repository.
	 */
	public function getDeviceLocationRepository(){
		return $this->deviceLocationRepository;
	}
}