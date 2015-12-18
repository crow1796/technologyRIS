<?php
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractObserver {
	public function creating($model){

	}

	public function created($model){

	}

	public function updating($model){

	}

	public function updated($model){

	}

	public function saving($model){

	}

	public function saved($model){

	}

	public function deleting($model){

	}

	public function deleted($model){

	}

	public function restoring($model){

	}

	public function restored($model){

	}
}