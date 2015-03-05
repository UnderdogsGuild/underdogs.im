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
        $this->createServerAdmin('Server Admin', 'server_admin', 'sa');
        $this->createServerAdmin('Topdog', 'topdog', 'td');
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

    private function createServerAdmin($prettyname, $uglyname, $doubleletter)
    {
        $permission = Permission::whereName('override')->firstOrFail();
        $role = new Role();
        $role->name = $uglyname;
        $role->pretty_name = $prettyname;
        $role->icon = '/img/' . $doubleletter . '.png';
        $role->save();
        DB::table('permission_role')->insert(['role_id' => $role->id, 'permission_id' => $permission->id]);
    }

    private function createWatchdog()
    {

    }
}
