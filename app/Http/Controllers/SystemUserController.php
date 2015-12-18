<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class SystemUserController extends Controller
{
    protected $userRepository;

    public function __construct(\App\Repositories\UserRepository $userRepository){
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'printView']]);
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository
                        ->getSystemUsers()
                        ->except(Auth::user()->id);
        return view('users.sysuser.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.sysuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateUserRequest $request)
    {
        $request->permission_id = $this->userRepository->getPermissionRepository()->getAll()->get(1)->id;
        $created = $this->userRepository
                        ->create($request);

        if(!$created){
            return redirect('/users/systemusers')->withErrors('User creation failed.');
        }

        return redirect('/users/systemusers')->withMessage('New user has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(\App\User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(\App\User $user)
    {
        return view('users.sysuser.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\UpdateUserRequest $request, \App\User $user)
    {
        $updated = $this->userRepository
                        ->update($request, $user);

        if(!$updated){
            return redirect('/users/systemusers')->withErrors('Updating user failed.');
        }

        return redirect('/users/systemusers')->withMessage('User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(\App\User $user)
    {
        $deleted = $this->userRepository
                        ->delete($user);

        if(!$deleted){
            return redirect('/users/systemusers')->withErrors('User deletion failed.');
        }

        return redirect('/users/systemusers')->withMessage('New user has been deleted successfully.');
    }

    public function updatePermission(\App\User $user){
        $updated = $this->userRepository
                        ->togglePermission($user);
        if(!$updated){
            return redirect('/users/systemusers')->withErrors('Updating user permission failed.');
        }

        return redirect('/users/systemusers')->withMessage('User permission has been successfully updated.');
    }

    public function printView(){
        $users = $this->userRepository
                    ->getSystemUsers();
        return view('users.sysuser.printview', compact('users'));
    }
}
