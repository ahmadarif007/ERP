<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemSize extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['item_size_name','item_size_short_name','item_size_status'];
}
