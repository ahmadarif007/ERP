<?php

namespace App\Http\Controllers\Backend\MM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FabricBudgetController extends Controller
{
    public function fabricbudget(){
        return view('admin.mm.fabricbudget');
    }
}
