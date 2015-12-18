<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories;

class LocationController extends Controller
{

    protected $deviceRepository;

    public function __construct(Repositories\DeviceRepository $deviceRepository){
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'printView']]);
        $this->deviceRepository = $deviceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $locations = $this->deviceRepository
                        ->getDeviceLocationRepository()
                        ->getAll();
        return view('location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
public function store(Requests\CreateAndUpdateLocationRequest $request)
    {
        $created = $this->deviceRepository
            ->getDeviceLocationRepository()
            ->create($request);

        if(!$created){
            return redirect('/locations')->withErrors('Location creation failed.');
        }

        return redirect('/locations')->withMessage('New location has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(\App\DeviceLocation $location)
    {
        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateAndUpdateLocationRequest $request, \App\DeviceLocation $location)
    {
        $updated = $this->deviceRepository
            ->getDeviceLocationRepository()
            ->update($request, $location);

        if(!$updated){
            return redirect('/locations')->withErrors('Updating location failed.');
        }

        return redirect('/locations')->withMessage('Location has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(\App\DeviceLocation $location)
    {
        $deleted = $this->deviceRepository
                ->getDeviceLocationRepository()
                ->delete($location);

        if(!$deleted){
            return redirect('/locations')->withErrors('Location deletion failed.');
        }

        return redirect('/locations')->withMessage('Location successfully deleted.');
    }

    /**
     * Ajax Requests for getting the device type slug.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getDeviceLocationBySlug(Request $request){
        if($request->ajax()){
            $deviceLocationSlug = $this->deviceRepository->getDeviceLocationRepository()->findById($request->id)->slug;
            return $deviceLocationSlug;
        }
    }

    public function printView(){
        $locations = $this->deviceRepository
                                ->getDeviceLocationRepository()
                                ->getAll();
        return view('location.printview', compact('locations'));
    }
}
