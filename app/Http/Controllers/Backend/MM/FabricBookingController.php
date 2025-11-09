<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FabricBookingController extends Controller
{
    public function fabricbooking(){
        return view('admin.mm.fabricbooking');
    }
}
