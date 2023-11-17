<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingsModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    
    protected $fillable = [
        'id','text','disscount','shipping','created_at','updated_at'
    ];
}