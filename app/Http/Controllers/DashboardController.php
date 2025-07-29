<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Item;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.adminHome.home');
    }

    public function orderEntry(){
        return view('admin.order.orderEntry');
    }

    public function precosting(){
        // return view('admin.order.precosting');
        $items = Item::all();
        return view('admin.order.precosting', compact('items'));
    }


    // public function itemSave(Request $request)
    // {
    //     dd('done');
    //     // Validation
    //     $request->validate([
    //         'item_name' => 'required|string|max:255',
    //         'price' => 'required|numeric',
    //     ]);

    //     // Item তৈরি এবং সেভ
    //     $item = new Item();
    //     $item->item_name = $request->item_name;
    //     $item->quantity = $request->quantity;
    //     $item->rate = $request->rate;
    //     $item->save();

    //     return redirect()->back()->with('success', 'আইটেম সফলভাবে সেভ হয়েছে!');
    // }

    public function itemSave(Request $request)
{
    $validated = $request->validate([
        'item_name' => 'required|string|max:255',
        'quantity' => 'required|numeric',
        'rate' => 'required|numeric',
    ]);

    $item = Item::create($validated);
    return redirect()->back()->with('message', 'আইটেম সফলভাবে সেভ হয়েছে!');

    // return response()->json($item); // এখানে response এ item_name এবং rate আসবে
}


     public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function store1(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $item = Item::create($data);

        return response()->json($item); // AJAX success response
    }
}
