<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    const INQUIRY = 'Inquiry';
    const INVOICE_ISSUED = 'Invoice Issued';
    const PAYMENT_RECEIVED = 'Payment Received';
    const SHIPPING = 'Shipping';
    const DOCUMENT = 'Document';
}
