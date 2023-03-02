<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'price',
        'quantity',
        'image',
        'production_aria',
        'detail',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeType($query,$type){
        return $query->where('type',$type);
    }

    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
