<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {

    use SoftDeletes;
    protected $fillable = ['title', 'content', 'published_at'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'deleted_at', 'published_at'];
    }
}
