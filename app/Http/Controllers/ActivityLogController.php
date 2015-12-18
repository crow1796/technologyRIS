<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class ActivityLogController extends Controller
{

    protected $activityLogRepository;

    public function __construct(UserRepository $userRepository){
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'printView']]);
        $this->activityLogRepository = $userRepository->getActivityLogRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $activities = $this->activityLogRepository
                            ->getAll();
        return view('systemlogs.activitylog.index', compact('activities'));
    }

    public function destroy(\App\Activity $activity)
    {
        $deleted = $this->activityLogRepository
                        ->delete($activity);
        if(!$deleted){
            return redirect('/logs/activitylogs')->withErrors('Activity Deletion failed.');
        }

        return redirect('/logs/activitylogs')->withMessage('Activity has been deleted successfully.');
    }

    public function printView(){
        $activities = $this->activityLogRepository
                            ->getAll();
        return view('systemlogs.activitylog.printview', compact('activities'));
    }
}
