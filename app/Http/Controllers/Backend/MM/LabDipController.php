<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabDipController extends Controller
{
    public function labdip(){
        return view('admin.mm.labdip');
    }
}
