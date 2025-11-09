<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fit;
use App\Models\Color;
use App\Models\SizeOne;

class MMController extends Controller
{
    public function mmInitialSetup(Request $request)
    {
        $activeTab = $request->get('tab', 'fit');

        $tabData['fits'] = Fit::latest()->get();
        $tabData['colors'] = Color::latest()->get();
        $tabData['sizes'] = SizeOne::latest()->get();


        switch ($activeTab) {
            case 'fit':
                $tabData['fits'] = Fit::latest()->get();
                if ($request->has('edit')) {
                    $tabData['editData'] = Fit::find($request->edit);
                }
                break;
            case 'color':
                $tabData['colors'] = Color::latest()->get();
                if ($request->has('edit')) {
                    $tabData['editData'] = Color::find($request->edit);
                }
                break;
            case 'size':
                $tabData['sizes'] = SizeOne::latest()->get();
                if ($request->has('edit')) {
                    $tabData['editData'] = SizeOne::find($request->edit);
                }
                break;
        }

        return view('admin.mm.initial-setup', [
            'activeTab' => $activeTab,
            'tabData' => $tabData,
        ]);
    }
}
