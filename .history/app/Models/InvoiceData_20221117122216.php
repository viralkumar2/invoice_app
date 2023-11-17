<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceData extends Model
{
    use HasFactory;
    protected $table = 'clients';
    
    protected $fillable = [
        'id','first_name','last_name','email','phone','created_at','updated_at'
    ];
}
