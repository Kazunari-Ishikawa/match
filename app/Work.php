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

    // 案件種別を文字列に変換
    public function getTypeAttribute()
    {
        $type = $this->attributes['type'];

        return self::TYPE[$type];
    }

    // 日付フォーマットの変換
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('Y/n/j');
    }

    protected $fillable = [
        'title', 'type', 'category_id', 'max_price', 'min_price', 'content', 'user_id', 'is_closed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function applies()
    {
        return $this->hasMany('App\Apply');
    }
}
