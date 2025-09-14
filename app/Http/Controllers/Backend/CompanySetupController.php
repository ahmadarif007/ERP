<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\Color;
use App\Models\Fit;
use App\Models\Season;

class CompanySetupController extends Controller
{

    public function itemList(Request $request)
    {
        if ($request->ajax()) {
            $data = Item::latest()->get();
            return datatables()->of($data)
                ->addColumn('action', function($row){
                    return '<button onclick="editItem('.$row->id.')" class="btn btn-sm btn-edit"><i class="fa fa-edit"></i></button>
                            <button onclick="deleteItem('.$row->id.')" class="btn btn-sm btn-delete"><i class="fa fa-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // যদি Ajax না হয়, তখনও কিছু return করা দরকার
        return ('nothing');
    }



    // Item CRUD
    public function itemStore(Request $request) {
        $request->validate(['name'=>'required']);
        Item::updateOrCreate(
            ['id'=>$request->id],
            ['name'=>$request->name,'status'=>$request->status ?? 1]
        );
        return response()->json(['success'=>true,'message'=>'আইটেম সফলভাবে সংরক্ষণ হয়েছে']);
    }

    // public function itemList() {
    //     return datatables()->of(Item::latest()->get())
    //         ->addColumn('action', function($row){
    //             return '<button class="btn btn-sm btn-edit" onclick="editItem('.$row->id.')"><i class="fa fa-edit"></i></button>
    //                     <button class="btn btn-sm btn-delete" onclick="deleteItem('.$row->id.')"><i class="fa fa-trash"></i></button>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }

    public function itemDelete($id) {
        Item::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'আইটেম মুছে ফেলা হয়েছে']);
    }

    // একইভাবে Size, Color, Fit, Season এর CRUD method লিখবেন
}
