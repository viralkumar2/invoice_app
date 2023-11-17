<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingsModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    
    protected $fillable = [
        'id','text','created_at','updated_at'
    ];
}
