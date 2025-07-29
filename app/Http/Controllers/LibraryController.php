<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Supplier;

class LibraryController extends Controller
{

    public function addSupplier(){
        return view('admin.supplier.addSupplier');
    }

    public function storeSupplier(Request $request ){
         // Validation
        $request->validate([
            'sup_name' => 'required|string|max:255',
            'sup_phone' => 'required|numeric',
        ]);

        // Item তৈরি এবং সেভ
        $supplier = new Supplier();
        $supplier->sup_name = $request->sup_name;
        $supplier->sup_phone = $request->sup_phone;
        $supplier->sup_address = $request->sup_address;
        $supplier->sup_contact_person = $request->sup_contact_person;
        $supplier->sup_type = $request->sup_type;
        $supplier->sup_web = $request->sup_web;
        $supplier->sup_tin_number = $request->sup_tin_number;
        $supplier->sup_country = $request->sup_country;
        $supplier->sup_status = $request->sup_status;
        $supplier->sup_email = $request->sup_email;
        $supplier->sup_owner_info = $request->sup_owner_info;
        $supplier->sup_tag_buyer = $request->sup_tag_buyer;
        $supplier->sup_tag_company = $request->sup_tag_company;
        $supplier->sup_remarks = $request->sup_remarks;
        $supplier->sup_nature = $request->sup_nature;
        $supplier->save();

        return redirect()->back()->with('success', 'আইটেম সফলভাবে সেভ হয়েছে!');
    }
}
