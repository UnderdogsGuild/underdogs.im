<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->createPermissions();
        $this->createServerAdmin();
    }

    /**
     *
     */
    private function createPermissions()
    {
        $perms = [
            new Permission(['name' => 'override', 'pretty_name' => 'Override Permissions', 'category' => 'Special'])
        ];

        foreach(\Config::get('permissions') as $item)
        {
            array_push($perms, new Permission(['name' => $item, 'pretty_name' => $item, 'category' => 'Controller Middleware']));
        }

        foreach($perms as $perm)
        {
            $perm->save();
        }
    }

    private function createServerAdmin()
    {
        $permission = Permission::whereName('override')->firstOrFail();
        $role = new Role();
        $role->name = 'server_admin';
        $role->pretty_name = 'Server Admin';
        $role->icon = '/img/sa.png';
        $role->save();
        DB::table('permission_role')->insert(['role_id' => $role->id, 'permission_id' => $permission->id]);
    }
}
