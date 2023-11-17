<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = 'invoice_data';
    
    protected $fillable = [
        'id','client_id','sub_total','tex','tax_amount','Discount_amount','total_amount','created_at','updated_at'
    ];
}
