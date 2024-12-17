<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    /**
     * 
     * 
     * @var array
     */

    protected $fillable =[
        'customer_name',
        'date',
        'time',
        'package'
    ];
}
