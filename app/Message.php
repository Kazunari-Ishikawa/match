<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'board_id', 'user_id', 'content'
    ];

        // 日付フォーマットの変換
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])
            ->format('n/j G:i');
    }

    public function board()
    {
        return $this->belongsTo('App\Board');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
