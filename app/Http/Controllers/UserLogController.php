<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserLogController extends Controller
{
    protected $userLogRepository;

    public function __construct(UserRepository $userRepository){
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'printView']]);
        $this->userLogRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userlogs = $this->userLogRepository
                            ->getLogs();
        return view('systemlogs.userlog.index', compact('userlogs'));
    }

    public function destroy(\App\UserLog $userLog)
    {
        $deleted = $this->userLogRepository
                        ->delete($userLog);
        if(!$deleted){
            return redirect('/logs/userlogs')->withErrors('User Log deletion failed.');
        }

        return redirect('/logs/userlogs')->withMessage('User Log has been deleted successfully.');
    }

    public function printView(){
        $userlogs = $this->userLogRepository
                        ->getLogs();
        return view('systemlogs.userlog.printview', compact('userlogs'));
    }
}
