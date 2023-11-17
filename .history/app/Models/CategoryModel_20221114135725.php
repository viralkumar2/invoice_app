<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    
    protected $fillable = [
        'id','cat_name','last_name','email','phone','created_at','updated_at'
    ];
}
