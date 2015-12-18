<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeviceTypeController extends Controller
{

    protected $deviceRepository;

    public function __construct(\App\Repositories\DeviceRepository $deviceRepository){
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
        $deviceTypes = $this->deviceRepository
                            ->getDeviceTypeRepository()
                            ->getAll();

        return view('type.index', compact('deviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateAndUpdateDeviceTypeRequest $request)
    {
        $created = $this->deviceRepository
            ->getDeviceTypeRepository()
            ->create($request);

        if(!$created){
            return redirect('/types')->withErrors('Device type creation failed.');
        }

        return redirect('/types')->withMessage('New device type has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(\App\DeviceType $deviceType)
    {
        return view('type.show', compact('deviceType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(\App\DeviceType $deviceType)
    {
        return view('type.edit', compact('deviceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CreateAndUpdateDeviceTypeRequest $request, \App\DeviceType $deviceType)
    {

        $updated = $this->deviceRepository
            ->getDeviceTypeRepository()
            ->update($request, $deviceType);

        if(!$updated){
            return redirect('/types')->withErrors('Updating device type failed.');
        }

        return redirect('/types')->withMessage('Device type has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(\App\DeviceType $deviceType)
    {
        $deleted = $this->deviceRepository
                ->getDeviceTypeRepository()
                ->delete($deviceType);

        if(!$deleted){
            return redirect('/types')->withErrors('Device type deletion failed.');
        }

        return redirect('/types')->withMessage('Device Type successfully deleted.');
    }

    /**
     * Ajax Requests for getting the device type slug.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getDeviceTypeBySlug(Request $request){
        if($request->ajax()){
            $deviceTypeSlug = $this->deviceRepository->getDeviceTypeRepository()->findById($request->id)->slug;
            return $deviceTypeSlug;
        }
    }
    
    public function printView(){
        $types = $this->deviceRepository
                    ->getDeviceTypeRepository()
                    ->getAll();
        return view('type.printview', compact('types'));
    }
}
