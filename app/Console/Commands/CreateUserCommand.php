<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hash;
use Symfony\Component\Console\Input\InputOption;
use \App\User;
use \App\Permission;
class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin or system user account.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user;
        switch(strtolower($this->option('permission'))){
            case 'admin':
            
                $user = new User();
                $user->username = 'admin';
                $user->password = Hash::make('admin');
                $user->email = 'admin@example.com';
                $user->firstname = 'Joshua';
                $user->middlename = 'Agagdan';
                $user->lastname = 'Tundag';
                Permission::first()->users()->save($user);
                $user->save();
            break;
            case 'user':

                $user = new User();
                $user->username = 'ododz';
                $user->password = Hash::make('gwapodz');
                $user->email = 'odozd@gwapodz.com';
                $user->firstname = 'Ododz';
                $user->middlename = 'G';
                $user->lastname = 'Gwapodz';
                Permission::all()->get(1)->users()->save($user);
                $user->save();
            break;
        }

        return $user;
    }

    public function getOptions(){
        return [
            ['permission', 'p', InputOption::VALUE_OPTIONAL, 'Permission type of an account.']
        ];
    }
}
