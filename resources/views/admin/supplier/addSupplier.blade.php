@extends('admin.master')

@section('title')
Pre-Costing | ERP
@endsection

@section('content')

    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Different Width</h3>
            </div>
            <div class="box-body">
                <form id="itemForm" method="POST" action="{{ route('supplier.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xs-4" style="margin-bottom: 8px" for="inputSuccess">
                            <input type="text" class="form-control input-sm" placeholder="Supplier Name">
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="number" class="form-control input-sm" placeholder="Supplier Phone">
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Contact Person">
                        </div>
                        <div class="col-xs-8" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Supplier Address">
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="email" class="form-control input-sm" placeholder="E-mail">
                        </div>
                        {{-- <div class="input-group col-xs-4" style="margin-bottom: 8px">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control input-sm" placeholder="Email">
                        </div> --}}
                        <div class="col-xs-5" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Web Address">
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="TIN Number">
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Supplier Type" data-toggle="modal" data-target="#supplierTypeModal">
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            <select type="text" class="form-control input-sm">
                                <option>Supplier Country</option>
                                <option value="1">Bangladesh</option>
                                <option value="2">Australia</option>
                                <option value="3">America</option>
                                <option value="4">China</option>
                                <option value="5">Japan</option>
                                <option value="6">Malyasia</option>
                            </select>
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            {{-- <input type="text" class="form-control input-sm" placeholder="Status"> --}}
                            <select type="text" class="form-control input-sm">
                                <option>Supplier Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            {{-- <input type="text" class="form-control input-sm" placeholder="Supplier Nature"> --}}
                            <select type="text" class="form-control input-sm">
                                <option>Supplier Nature</option>
                                <option value="1">Goods</option>
                                <option value="2">Service</option>
                                <option value="3">Both</option>
                            </select>
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Owner Info" data-toggle="modal" data-target="#ownerInfoModal">
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Tag Buyer" data-toggle="modal" data-target="#tagBuyerModal">
                        </div>
                        <div class="col-xs-3" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Tag Company" data-toggle="modal" data-target="#tagCompanyModal">
                        </div>
                        <div class="col-xs-6" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm" placeholder="Remarks">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Supplier Info</button>
                    </div>
                </form>

                {{-- <hr>

                <div class="row">
                    <div class="col-xs-3 form-group has-success" style="margin-bottom: 8px" for="inputSuccess">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-4 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-5 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-5">
                    </div>
                    <div class="col-xs-3 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-4 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-5 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-5">
                    </div>
                    <div class="col-xs-3 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-4 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-5 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-5">
                    </div>
                    <div class="col-xs-3 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-3">
                    </div>
                    <div class="col-xs-4 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-4">
                    </div>
                    <div class="col-xs-5 form-group has-success" style="margin-bottom: 8px">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-5">
                    </div>
                </div> --}}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>

    <hr>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->


    <!-- Modal for owner info -->
    <div class="modal fade" id="ownerInfoModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="itemForm" method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="modal-header">
                    <h4 class="modal-title">Owner Information Form</h4>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal">Close</button> --}}
                    </div>
                    <div class="modal-body row">
                        <div class="mb-5 col-lg-6">
                            <label>Owner Name</label>
                            <input type="text" name="owner_name" class="form-control" required>
                        </div>
                        <div class="mb-5 col-lg-6">
                            <label>Owner Contact</label>
                        <input type="number" name="owner_contact" class="form-control" required>
                        </div>
                        <div class="mb-5 col-lg-6">
                            <label>Owner NID</label>
                        <input type="text" name="owner_nid" class="form-control" required>
                        </div>
                        <div class="mb-5 col-lg-6">
                            <label>Owner E-mail</label>
                        <input type="email" name="owner_email" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for supplier type -->
    <div class="modal fade" id="supplierTypeModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px">
                <form id="itemForm" method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="box box-info">
                        <div class="box-body">
                            <h4>With checkbox and radio inputs</h4>
                            <div class="row">
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for tag buyer -->
    <div class="modal fade" id="tagCompanyModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px">
                <form id="itemForm" method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="box box-info">
                        <div class="box-body">
                            <h4>With checkbox and radio inputs</h4>
                            <div class="row">
                                <div class="col-lg-12" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for tag company -->
    <div class="modal fade" id="tagBuyerModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px">
                <form id="itemForm" method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="box box-info">
                        <div class="box-body">
                            <h4>With checkbox and radio inputs</h4>
                            <div class="row">
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Supplier Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection