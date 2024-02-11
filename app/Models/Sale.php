<?php

namespace App\Models;

use App\Events\InvoiceCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status','ref_num','invoice_date','delivery_date','payee','payee_id',
        'total','currency','currency_total','paid','due','rounding','due_date',
        'attn','payment_term','payment_status','delivery_status','branch_id',
        'locked','staff_id','auther_id'
    ];

    protected $table = 'sales';

    protected $dispatchesEvents = [
        'created' => InvoiceCreated::class,
    ];
}
