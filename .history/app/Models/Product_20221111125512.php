<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';


    protected $fillable = [
        'id','sr_no','name','description','quantity','amount','tax','image','created_at'
    ];

}
