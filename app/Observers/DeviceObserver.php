<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Observers\AbstractObserver as BaseObserver;
use App\Repositories\ActivityLogRepository;
use Auth;

class DeviceObserver extends BaseObserver{

	protected $activityLogRepository;

	public function __construct(ActivityLogRepository $activityLogRepository){
		$this->activityLogRepository = $activityLogRepository;
	}

	public function creating($device){
	}

	public function created($device){
		return $this->activityLogRepository->createCreateLogForDevice($device);
	}

	public function updating($device){
	}

	public function updated($device){
		return $this->activityLogRepository->createUpdateLogForDevice($device);
	}

	public function deleting($device){
	}

	public function deleted($device){
		return $this->activityLogRepository->createDeleteLogForDevice($device);
	}

	public function restoring($device){

	}

	public function restored($device){
		
	}
}