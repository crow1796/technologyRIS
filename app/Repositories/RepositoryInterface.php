<?php
namespace App\Repositories;
use App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface{
	public function getAll();
	public function findBySlug($slug);
	public function findById($id);
	public function getCount();
	public function orderBy($column);
	public function lists($value, $key = '');
	
	public function create(Request $request);
	public function update(Request $request, Model $model);
	public function delete(Model $model);
}