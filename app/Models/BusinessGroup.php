<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'group_description',
        'group_address'
    ];
}
