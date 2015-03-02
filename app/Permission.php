<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Permission
 *
 */
class Permission extends Model {

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('\App\Role');
    }
}