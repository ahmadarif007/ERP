<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrimsBudgetController extends Controller
{
    public function trimsbudget(){
        return view('admin.mm.trimsbudget');
    }
}
