<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'buy_name', 
        'buy_short_name', 
        'modabuy_contact_personl_status', 
        'buy_contact_no',
        'buy_address',
        'buy_email',
        'buy_address_2',
        'buy_web_address',
        'buy_country',
        'buy_status',
        'buy_remarks'
    ];
}
