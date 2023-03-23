<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;
    

    protected $table = 'vehicle';
    const INQUIRY = 'Inquiry';
    const INVOICE_ISSUED = 'Invoice Issued';
    const PAYMENT_RECEIVED = 'Payment Received';
    const SHIPPING = 'Shipping';
    const DOCUMENT = 'Document';
}
