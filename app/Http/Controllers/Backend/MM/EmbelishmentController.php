<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmbelishmentController extends Controller
{
    public function embbudget(){
        return view('admin.mm.embbudget');
    }
}
