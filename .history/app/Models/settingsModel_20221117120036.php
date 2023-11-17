<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingsModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    
    protected $fillable = [
        'id','text','disscount','shipping','company_address','company_name','company_email','company_phone','','logo','created_at','updated_at'
    ];
}
