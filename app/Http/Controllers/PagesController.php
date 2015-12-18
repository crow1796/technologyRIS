<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard;
use Hash;
use Auth;

class PagesController extends Controller
{

	private $deviceRepository;

	public function __construct(\App\Repositories\RepositoryInterface $deviceRepository){
		$this->middleware('auth');
		$this->deviceRepository = $deviceRepository;
	}

    public function index(){
        $locationsCount = $this->deviceRepository
                                ->getDeviceLocationRepository()
                                ->getCount();

        return view('pages.index', compact('devices', 'locationsCount'))->with(['deviceRepository' => $this->deviceRepository]);
    }

    public function usersIndex(){
        return view('pages.usersindex');
    }

    public function logsIndex(){
        return view('pages.logsindex');
    }

    public function getChangePassword(){
        return view('auth.changepassword');
    }

    public function postChangePassword(UpdatePasswordRequest $request, \App\User $user){
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/')->withMessage('Your password has been changed successfully.');
    }

    public function getEditUserProfile(){
        return view('auth.edituser');
    }

    public function postEditUserProfile(Requests\UpdateUserRequest $request, \App\User $user){
        $user->username = $request->username;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->save();
        return redirect('/')->withMessage('Your information has been updated successfully.');
    }

    public function getChangePhoto(){
        return view('auth.changephoto');
    }

    public function postChangePhoto(Request $request, \App\User $user){
        if($request->file('user_photo')->isValid()){
            $destinationPath = base_path() . '/public/images/uploads';
            $extension = $request->file('user_photo')->getClientOriginalExtension();
            $fileName = md5($request->file('user_photo')->getFileName()).'.'.$extension;
            $moved = $request->file('user_photo')->move($destinationPath, $fileName);
            if(!$moved){
                return redirect('/')->withMessage('There was a problem uploading your photo.');
            }
            $photo = \App\Photo::where('user_id', $user->id)->first();
            $photo->path = $fileName;
            $photo->save();
        }
        return redirect('/')->withMessage('Your photo has been updated successfully.');
    }
}
