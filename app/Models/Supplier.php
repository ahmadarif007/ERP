<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
            'sup_name',
            'sup_phone',
            'sup_address',
            'sup_contact_person',
            'sup_type',
            'sup_web',
            'sup_tin_number',
            'sup_country',
            'sup_status',
            'sup_email',
            'sup_nature',
            'sup_owner_info',
            'sup_tag_buyer',
            'sup_tag_company',
            'sup_remarks'
    ];
}
