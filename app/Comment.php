<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = [
        'work_id', 'user_id', 'content'
    ];


    // 日付フォーマットの変換
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])
            ->format('n/j G:i');
    }

    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
