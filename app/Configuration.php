<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * App\Configuration
 *
 */
class Configuration extends Model {

	public $timestamps = false;

    /**
     * @param $key
     * @param $value
     * @return bool
     */
    public static function storeArray($key, $value) {
        if($query = Configuration::where('key', '=', $key)->count() == 0) {
            return false;
        }
        $store = new Configuration();
        $store->key = $key;
        $store->value = json_encode($value);
        return $store->save();
    }
    public static function fetchJson($key) {
        try {
            $query = Configuration::where('key', '=', $key)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return false;
        }
        return json_decode($query->value);
    }
}
