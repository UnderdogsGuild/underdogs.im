<?php namespace App\Contracts;
use App\User;

/**
 * Interface Permission
 *
 * Basic required options for the permission system.
 *
 * @package App\Contracts
 */
interface Permission {

    public function can(Permission $permission, User $user = null);

    public function hasRole(User $user = null);

    public function guestPermissions();
}