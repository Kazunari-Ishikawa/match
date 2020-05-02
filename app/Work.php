<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    // 案件種別の定義
    const TYPE = [
        0 => '単発案件',
        1 => 'レベニューシェア'
    ];

    public function getTypeAttribute()
    {
        $type = $this->attributes['type'];

        // 未定義の場合
        if (!isset(self::TYPE[$type])) {
            return '';
        }

        return self::TYPE[$type];
    }

    // 日付フォーマットの変換
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('Y/m/d');
    }

    protected $fillable = [
        'title', 'type', 'category_id', 'max_price', 'min_price', 'content', 'user_id', 'is_closed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
