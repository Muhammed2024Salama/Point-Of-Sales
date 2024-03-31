<?php

namespace Pos\Invoices\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices_details extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table="invoice_details";

    /**
     * @var string[]
     */
    protected $fillable=[
        'invoice_id',
        'status',
        'payment_date',
        'user_id'
    ];
}
