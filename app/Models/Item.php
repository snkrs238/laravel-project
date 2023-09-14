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
        'supplier_id',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeType($query,$type){
        return $query->where('type',$type);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }

    public function supplier(){
        return $this->hasMany(Supplier::class);
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
