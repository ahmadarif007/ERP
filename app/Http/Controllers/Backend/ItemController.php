<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Item;

class ItemController extends Controller
{
    // ড্যাশবোর্ড/ইন্ডেক্স ভিউ
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::latest()->get();
            return view('admin.mmSetup.table.item-table', compact('items'));
        }

        // মূল পেজ যেখানে ট্যাব থাকবে — লোড হবে সব জাভাস্ক্রিপ্ট ও AJAX থেকে
        return view('admin.mmSetup.index');
    }

/* ============================
Item Methods (CRUD)
============================ */

    // Store Item (AJAX)
    public function storeItem(Request $request)
    {
        // Laravel server-side validation
        $validator = Validator::make($request->all(), [
            'item_code' => 'required|unique:items,item_code',
            'item_name' => 'required',
        ]);

        if ($validator->fails()) {
            // 422 Validation errors as JSON (frontend will show)
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // ডাটাবেজ ইনসার্ট
        $item = Item::create([
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'item_short_name' => $request->item_short_name,
            'item_status' => $request->item_status,
        ]);

        return response()->json(['success' => 'Item সফলভাবে সংরক্ষণ হয়েছে।']);
    }

    // Edit — রেকর্ড ফেরত দিবে (AJAX)
    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    // Update Item
    public function updateItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'item_code' => 'required|unique:items,item_code,' . $id,
            'item_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // আলাদা করে mapping — যাতে অনাকাঙ্ক্ষিত ফিল্ড ডাটাবেসে না যায়
        $item->update([
            'item_code' => $request->item_code,
            'item_name' => $request->item_name,
            'item_short_name' => $request->item_short_name,
            'item_status' => $request->item_status,
        ]);

        return response()->json(['success' => 'Item সফলভাবে আপডেট হয়েছে।']);
    }

    // Soft delete Item
    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete(); // soft delete
        return response()->json(['success' => 'Item সফলভাবে ডিলিট করা হয়েছে।']);
    }
}
