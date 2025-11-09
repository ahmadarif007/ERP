<div class="card mb-3">
    <div class="card-body">
        <form id="itemForm">
            @csrf
            <input type="hidden" id="item_id" name="item_id">

            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="item_code" id="item_code" class="form-control form-control-sm" placeholder="আইটেম কোড">
                </div>
                <div class="col-md-6">
                    <input type="text" name="item_name" id="item_name" class="form-control form-control-sm" placeholder="আইটেম নাম">
                </div>
                <div class="col-md-3">
                    <input type="text" name="item_short_name" id="item_short_name" class="form-control form-control-sm" placeholder="আইটেম সংক্ষিপ্ত নাম">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <select name="item_status" id="item_status" class="form-select form-select-sm"> 
                        <option>সিলেক্ট আইটেম স্ট্যাটাস</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row mt-2 align-items-center">
                <div class="text-end">
                    <button type="submit" id="saveBtn" class="btn btn-sm btn-success" title="Save Info"><i class="bi bi-save"></i> Save</button>
                    <button type="button" id="reloadBtn" class="btn btn-sm btn-outline-secondary" title="Reload Page"><i class="bi bi-arrow-repeat"></i> Reload</button>
                    <button type="button" id="refreshBtn" class="btn btn-sm btn-outline-danger" title="Refresh Page"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    
                    <button type="submit" id="updateBtn" class="btn btn-sm btn-primary d-none" title="Upadte Info"><i class="bi bi-pencil"></i> Update</button>
                    <button type="button" id="cancelBtn" class="btn btn-sm btn-secondary d-none" title="Cancel"><i class="bi bi-x-circle"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
