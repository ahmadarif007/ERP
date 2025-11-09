<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function jobentry(){
        return view('admin.mm.jobentry');
    }
}
