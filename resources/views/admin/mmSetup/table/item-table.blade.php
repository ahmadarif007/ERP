<div class="card" id="itemTableArea">
    <div class="card-body">
        <table id="itemTable" class="table table-bordered table-sm">
            <thead class="table-light">
                <tr class="text-center">
                    <th class="border">#</th>
                    <th class="border">Code</th>
                    <th class="border">Name</th>
                    <th class="border">Short Name</th>
                    <th class="border">Status</th>
                    <th class="border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Item::latest()->get() as $k => $item)
                <tr>
                    <td class="text-center border align-middle">{{ $k+1 }}</td>
                    <td class="text-center border align-middle">{{ $item->item_code }}</td>
                    <td class="border align-middle">{{ $item->item_name }}</td>
                    <td class="text-center border align-middle">{{ $item->item_short_name }}</td>
                    <td class="text-center border align-middle">
                        <span style="color: white; font-weight: bold" class="badge bg-{{ $item->item_status ? 'success' : 'primary' }}">
                            {{ $item->item_status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="text-center border col-md-2 align-middle">
                        <button class="btn btn-sm btn-warning" onclick="editItem({{ $item->id }})"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-info" onclick="viewItem({{ $item->id }})"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="deleteItem({{ $item->id }})"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
