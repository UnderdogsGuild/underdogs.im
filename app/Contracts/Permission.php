<?php namespace App\Contracts;
use App\Role;
use App\User;

/**
 * Interface Permission
 *
 * Basic required options for the permission system.
 *
 * @package App\Contracts
 */
interface Permission {

    public static function can(\App\Permission $permission, User $user = null);

    public static function hasRole(Role $role, User $user = null);

    public static function guestPermissions();

    public static function canString($permission, User $user = null);
}