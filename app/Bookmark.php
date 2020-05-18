<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmarks';

    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
