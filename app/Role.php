<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 */
class Role extends Model {

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->belongsToMany('\App\Permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('\App\User');
    }
}
