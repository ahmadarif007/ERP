<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessGroup;
use DataTables;
use Illuminate\Support\Str;

class BusinessGroupController extends Controller
{
    public function index()
    {
        $groups = BusinessGroup::orderBy('id','asc')->paginate(10);
        return view('admin.company.business_group.index', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|unique:business_groups,group_name',
            'group_description' => 'nullable|string',
            'group_address' => 'nullable|string'
        ]);

        BusinessGroup::create($request->only('group_name', 'group_description', 'group_address'));
        return redirect()->route('business-groups.index')->with('success','Business Group Added Successfully');
    }

    public function edit($id)
    {
        $editData = BusinessGroup::findOrFail($id);
        $groups = BusinessGroup::orderBy('id','asc')->paginate(10);
        return view('admin.company.business_group.index', compact('groups','editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'group_name' => 'required|unique:business_groups,group_name,'.$id,
            'group_description' => 'nullable|string',
            'group_address' => 'nullable|string'
        ]);

        $group = BusinessGroup::findOrFail($id);
        $group->update($request->only('group_name', 'group_description', 'group_address'));

        return redirect()->route('business-groups.index')->with('success','Business Group Updated Successfully');
    }

    public function destroy($id)
    {
        BusinessGroup::findOrFail($id)->delete();
        return redirect()->route('business-groups.index')->with('success','Business Group Deleted Successfully');
    }

    

    public function list()
    {
        $groups = CompanyGroup::query();
        return DataTables::of($groups)->make(true);
    }



      /**
     * DataTables server-side data feed.
     * Accepts: draw, start, length, search[value], order[0][column], order[0][dir]
     */
    public function data(Request $request)
    {
        $columns = ['id', 'group_name', 'group_address', 'group_description']; // map index

        $query = BusinessGroup::query();

        // Search
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('group_name', 'like', "%{$search}%")
                  ->orWhere('group_address', 'like', "%{$search}%")
                  ->orWhere('group_description', 'like', "%{$search}%");
            });
        }

        $recordsTotal = BusinessGroup::count();
        $recordsFiltered = $query->count();

        // Order
        if ($request->has('order.0.column')) {
            $colIndex = (int) $request->input('order.0.column');
            $dir = $request->input('order.0.dir', 'asc');
            $colName = $columns[$colIndex] ?? 'id';
            $query->orderBy($colName, $dir);
        } else {
            $query->orderByDesc('id');
        }

        // Pagination
        $start  = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);
        if ($length > 0) {
            $query->skip($start)->take($length);
        }

        $data = $query->get()->map(function ($bg) {
            return [
                'id' => $bg->id,
                'group_name' => e($bg->group_name),
                'group_address' => e(Str::limit($bg->group_description, 50)),
                'group_description' => e(Str::limit($bg->group_description, 50)),
            ];
        });

        return response()->json([
            'draw' => (int) $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }
}
