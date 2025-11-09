<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PODetailsController extends Controller
{
    public function podetails(){
        return view('admin.mm.podetails');
    }
}
