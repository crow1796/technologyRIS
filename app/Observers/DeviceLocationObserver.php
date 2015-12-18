<?php

namespace App\Observers;

use App\Observers\AbstractObserver as BaseObserver;
use App\Repositories\ActivityLogRepository;

class DeviceLocationObserver extends BaseObserver{

	protected $activityLogRepository;

	public function __construct(ActivityLogRepository $activityLogRepository){
		$this->activityLogRepository = $activityLogRepository;
	}

	public function creating($model){
	}

	public function created($model){
		return $this->activityLogRepository->createCreateLogForDeviceLocation($model);
	}

	public function updating($model){
	}

	public function updated($model){
		return $this->activityLogRepository->createUpdateLogForDeviceLocation($model);
	}

	public function deleting($model){
	}

	public function deleted($model){
		return $this->activityLogRepository->createDeleteLogForDeviceLocation($model);
	}

	public function restoring($model){

	}

	public function restored($model){
		
	}
}