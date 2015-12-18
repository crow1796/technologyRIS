<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{

    protected $deviceRepository;

    public function __construct(\App\Repositories\RepositoryInterface $deviceRepository){
        $this->middleware('auth');
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $deviceStatus = $this->deviceRepository
                        ->getDeviceStatusRepository()
                        ->getAll();

        $deviceLocations = $this->deviceRepository
                        ->getDeviceLocationRepository()
                        ->lists('name', 'id');

        $devices = $this->deviceRepository
                        ->orderBy('status_id');

        return view('inventory.index', compact('devices', 'deviceStatus', 'deviceLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $deviceTypes = $this->deviceRepository
                            ->getDeviceTypeRepository()
                            ->lists('name', 'id');

        $deviceLocations = $this->deviceRepository
                            ->getDeviceLocationRepository()
                            ->lists('name', 'id');

        return view('inventory.create', compact('deviceTypes', 'deviceLocations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\AddDeviceRequest $request)
    {
        $created = $this->deviceRepository
                ->create($request);

        if(!$created){
            return redirect('/devices')->withErrors('Device creation failed.');
        }

        return redirect('/devices')->with(['message' => 'Device has been added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(\App\Device $device)
    {
        return view('inventory.show', compact('device'))->with(['title' => $device->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(\App\Device $device)
    {
        $deviceTypes = $this->deviceRepository
                            ->getDeviceTypeRepository()
                            ->lists('name', 'id');

        $deviceLocations = $this->deviceRepository
                            ->getDeviceLocationRepository()
                            ->lists('name', 'id');

        return view('inventory.edit', compact('device', 'deviceTypes', 'deviceLocations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\UpdateDeviceRequest $request, \App\Device $device)
    {
        $updated = $this->deviceRepository
            ->update($request, $device);

        if(!$updated){
            return redirect('/devices')->withErrors('Updating device failed.');
        }

        return redirect('/devices')->with(['message' => 'Device has been updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(\App\Device $device)
    {
        $deleted = $this->deviceRepository->delete($device);
        if(!$deleted){
            return redirect('/devices')->withErrors('Device deletion failed.');
        }
        return redirect('/devices')->with(['message' => 'Device has been deleted successfully.']);
    }

    /**
     * Update Device's status.
     * @param  Request     $request [description]
     * @param  \App\Device $device  [description]
     * @return [type]               [description]
     */
    public function updateStatus(Request $request, \App\Device $device){
        $this->deviceRepository
            ->getDeviceStatusRepository()
            ->getDevicesById($request->status_id)
            ->save($device);

        return redirect('/devices')->with(['message' => 'Device status has been successfully updated.']);
    }
    /**
     * Ajax Requests for getting the device status.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getDeviceByStatus(Request $request){
        if($request->ajax()){
            $device = $this->deviceRepository->findById($request->id);
            return $device;
        }
    }
    /**
     * Ajax Requests for getting the device slug.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getDeviceBySlug(Request $request){
        if($request->ajax()){
            $deviceSlug = $this->deviceRepository->findById($request->id)->slug;
            return $deviceSlug;
        }
    }

    public function printView(){
        $deviceStatus = $this->deviceRepository
                                ->getDeviceStatusRepository()
                                ->getAll();

        $deviceLocations = $this->deviceRepository
                        ->getDeviceLocationRepository()
                        ->lists('name', 'id');

        $devices = $this->deviceRepository
                        ->orderBy('status_id');

        return view('inventory.printview', compact('devices', 'deviceStatus', 'deviceLocations'));
    }
}
