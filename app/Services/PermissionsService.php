<?php namespace App\Services;

use App\User;
use App\Role;
use App\Configuration;
use App\Permission;
use App\Contracts\Permission as PermissionContract;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Permission provides basic tools for the permission system.
 * @package App\Services
 */
class PermissionsService implements PermissionContract {


    /**
     * Checks if a user has permission to do something.
     * @param Permission $permission
     * @param User $user
     * @return bool
     */
    public static function can(Permission $permission, User $user = null)
    {
        if(is_null($user))
        {
            if(Auth::check())
            {
                $user = Auth::user();
            }
        }
        if(is_null($user))
        {
            $availablePerms = Permission::find(PermissionsService::guestPermissions());
            foreach($availablePerms as $availablePerm)
            {
                if($availablePerm->id == $permission->id || $availablePerm->name == 'override')
                {
                    return true;
                }
            }
            return false;
        }
        $roles = $user->roles;
        foreach($roles as $role)
        {
            $availablePerms = $role->permissions;
            foreach($availablePerms as $availablePerm)
            {
                if($availablePerm->id == $permission->id || $availablePerm->name == 'override')
                {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Checks if a user has a role.
     * @param Role $role
     * @param User $user
     * @return bool
     */
    public static function hasRole(Role $role, User $user = null)
    {
        foreach($user->roles() as $availableRole)
        {
            if($availableRole->id == $role->id)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @return array|bool|mixed
     */
    public static function guestPermissions()
    {
        if(!$perms = Configuration::fetchJson('guest_permissions')) {
            return [];
        } else {
            return $perms;
        }
    }

    /**
     * @param $permission
     * @param User $user
     * @return bool
     */
    public static function canString($permission, User $user = null)
    {
        try {
            $perm = Permission::where("name", "=", $permission)->firstOrFail();
        }
        catch(ModelNotFoundException $e)
        {
            //Permission doesn't exist so default yes.
            return true;
        }
        return PermissionsService::can($perm, $user);
    }
}