<?php

namespace App\Repositories;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Hash;
use Auth;

class UserRepository implements RepositoryInterface{

	protected $permissionRepository;
	protected $activityLogRepository;

	public function __construct(PermissionRepository $permissionRepository, ActivityLogRepository $activityLogRepository){
		$this->permissionRepository = $permissionRepository;
		$this->activityLogRepository = $activityLogRepository;
	}

	public function getAll(){
		return \App\User::all();
	}
	public function findBySlug($slug){
		return \App\User::findBySlugOrFail($slug);
	}

	public function getAdmins(){
		return \App\Permission::with('users')->first()->users;
	}

	public function getSystemUsers(){
		return \App\Permission::with('users')->get()->get(1)->users;
	}

	public function getActivityLogRepository(){
		return $this->activityLogRepository;
	}

	public function findById($id){
		return \App\User::findOrFail($id);
	}
	public function getCount(){
		return \App\User::count();
	}
	public function orderBy($column){
		return \App\User::orderBy($column)->get();
	}
	public function lists($value, $key = ''){
		return \App\User::lists($value, $key);
	}

	public function createLog($time){
		$userLog = new \App\UserLog();
		$userLog->last_logged_in = $time;
		$userLog->user()->associate(Auth::user());
		$userLog->save();
		return $userLog;
	}

	public function getLogs(){
		return \App\UserLog::all();
	}

	public function create(Request $request){
		$user = new \App\User();
		$user->username = $request->username;
		$user->password = Hash::make($request->password);
		$user->email = $request->email;
		$user->firstname = $request->firstname;
		$user->middlename = $request->middlename;
		$user->lastname = $request->lastname;
		$user->permission()->associate(\App\Permission::find($request->permission_id));
		$user->save();
		$photo = new \App\Photo();
		$photo->path = 'default_user_thumbnail.png';
		$photo->user()->associate($user);
		$photo->save();
		return $user? true: false;
	}

	public function update(Request $request, Model $user){
		return $user->update($request->all());
	}

	public function delete(Model $user){
		return $user->delete();
	}

	public function getPermissionRepository(){
		return $this->permissionRepository;
	}

	public function togglePermission(\App\User $user){
		if($user->permission == $this->permissionRepository->first()){
			$user->permission()->associate($this->permissionRepository->getAll()->get(1));
			return $user->save();
		}

		$user->permission()->associate($this->permissionRepository->first());
		return $user->save();
	}
}