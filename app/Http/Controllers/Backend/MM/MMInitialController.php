<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MMInitialController extends Controller
{
    public function mminitial(){
        return view('admin.mm.mminitial');
    }
}
