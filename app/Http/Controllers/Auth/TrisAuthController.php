<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Repositories\UserRepository;

class TrisAuthController extends Controller
{
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectPath = '/login';
	protected $userRepository;

	public function __construct(UserRepository $userRepository){
		$this->middleware('guest', ['except' => 'getLogout']);
		$this->userRepository = $userRepository;
	}

	public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(Request $request){
		$username = $request->input('username');
		$password = $request->input('password');

		if(\Auth::attempt(['username' => $username,'password' => $password])){
			$this->userRepository
				->createLog(Carbon\Carbon::now());
			return redirect('/');
		}
		return redirect('/login')->withErrors('Invalid Username or Password.');
	}

	public function validator(array $data){
		return Validator::make($data, [
				'username' => 'required|min:3|unique:trisusers',
				'password' => 'required|confirmed|min:6',
				'email'		=> 'required|email|max:255|unique:trisusers',
				'firstname' => 'required|min:2',
				'middlename' => 'required|min:2',
				'lastname' => 'required|min:2',
			]);
	}

	public function create(array $data){
		return User::create([
			'username' => $data['username'],
			'password' => Hash::make($data['password']),
			'email' 	=> $data['email'],
			'firstname' => $data['firstname'],
			'middlename' => $data['middlename'],
			'lastname' => $data['lastname']
			]);
	}
}
