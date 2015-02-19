<?php namespace App\Services;

use App\User;
use App\Role;
use App\Configuration;
use App\Permission;
use App\Contracts\Permission as PermissionContract;

/**
 * Class Permission provides basic tools for the permission system.
 * @package App\Services
 */
class PermissionsService implements PermissionContract {


    /**
     * Checks if a user has permission to do something.
     * @param PermissionContract $permission
     * @param User $user
     */
    public function can(PermissionContract $permission, User $user = null)
    {
        // TODO: Implement can() method.
    }

    /**
     * Checks if a user has a role.
     * @param User $user
     */
    public function hasRole(User $user = null)
    {
        // TODO: Implement role() method.
    }

    public function guestPermissions()
    {
        if(!$perms = Configuration::fetchJson('guest_permissions')) {
            return [];
        } else {
            return $perms;
        }
    }

}