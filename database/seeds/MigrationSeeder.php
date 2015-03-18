<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MigrationSeeder extends Seeder
{

    private $old;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->old = DB::connection('old_db');
        $this->importUsers();
    }

    private function importUsers()
    {
        $old_users = $this->old->table('users')->get();
        foreach($old_users as $old_user)
        {
            $user = new \App\User();
            $user->username = $old_user->username;
            $user->email = $old_user->email;
            $user->password = $old_user->password;
            $user->created_at = $old_user->created_at;
            $user->updated_at = $old_user->updated_at;
            $user->save();
            $user->roles()->sync([\App\Role::whereName('underdog')->first()->id]);
            $user->save();
        }
    }
}