<?php

namespace App\Repositories;

use App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class PermissionRepository implements RepositoryInterface{
	public function getAll(){
		return \App\Permission::all();
	}

	public function findBySlug($slug){
		return \App\Permission::findBySlugOrFail($slug);
	}

	public function findById($id){
		return \App\Permission::findOrFail($id);
	}

	public function getCount(){
		return \App\Permission::count();
	}

	public function orderBy($column){
		return \App\Permission::orderBy($column)->get();
	}

	public function first(){
		return \App\Permission::first();
	}

	public function lists($value, $key = ''){
		return \App\Permission::lists($value, $key);
	}

	
	public function create(Request $request){

	}

	public function update(Request $request, Model $model){

	}

	public function delete(Model $model){

	}

}