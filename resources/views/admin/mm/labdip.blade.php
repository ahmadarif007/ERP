<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lab Dip Approval</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <form role="form">
                <div class="box-body">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">PO Number</label>
                        <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter PO Number">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Color Name</label>
                        <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter Color Name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Action Date</label>
                        <input type="date" class="form-control input-sm">
                    </div>

                    
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Labdip No</label>
                        <input type="text" class="form-control input-sm" placeholder="Enter Lab Dip No">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Shade %</label>
                        <input type="text" class="form-control input-sm" placeholder="Enter Shade %">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Action</label>
                        <select class="form-control select2 input-sm" style="width: 100%;">
                            <option>----- Select Action -----</option>
                            <option>Submitted</option>
                            <option>Rejected</option>
                            <option>Approved</option>
                            <option>Re-Submitted</option>
                            <option>Canceled</option>
                            <option>Pending</option>
                        </select>
                    </div>

                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Comments</label>
                        <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="Comments Here">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <select class="form-control select2 input-sm" style="width: 100%;">
                        <option selected="selected">Active</option>
                        <option>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    <button type="submit" class="btn btn-warning">Refresh</button>
                    <button type="submit" class="btn btn-info">Reload</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</section>