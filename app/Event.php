<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model {

    use SoftDeletes;
    protected $fillable = ['title', 'content', 'published_at'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'deleted_at', 'published_at', 'start_at', 'end_at'];
    }

    public static function findActive()
    {
        return Event::where('published_at', '<=', Carbon::now());
    }

    public static function findInactive()
    {
        return Event::where('published_at', '>', Carbon::now());
    }
}
