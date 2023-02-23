<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact_forms';

    protected $fillable = [
        'name',
        'title',
        'email',
        'gender',
        'age',
        'content',
        'detail',
    ];
}
