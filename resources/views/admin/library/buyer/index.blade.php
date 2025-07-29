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

                        <x-input name="buy_name" type="text" placeholder="Buyer Name" divClass="col-xs-4 has-success"/>
                        <x-input name="buy_short_name" placeholder="Short Name" type="text" divClass="col-xs-4 has-success"/>
                        <x-input name="buy_contact_person" placeholder="Contact Person" type="text" divClass="col-xs-4 has-success"/>
                        <x-input name="buy_contact_no" placeholder="Contact No" type="number" divClass="col-xs-4 has-success"/>
                        <x-input name="buy_address" placeholder="Address" type="text" divClass="col-xs-8 has-success"/>
                        <x-input name="buy_email" type="email" placeholder="E-mail" divClass="col-xs-4 has-success"/>
                        <x-input name="buy_address_2" placeholder="Address 2" type="text" divClass="col-xs-8 has-success"/>
                        <x-input name="buy_web_address" placeholder="Web Address" type="text" divClass="col-xs-4 has-success"/>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm has-success" placeholder="Tag Company" data-toggle="modal" data-target="#tagCompanyModal">
                            <input type="hidden" name="modal[category]" id="modal_category" class="form-control mb-2" placeholder="Modal Category" readonly>
                            <input type="hidden" name="modal[status]" id="modal_status" class="form-control mb-2" placeholder="Modal Status" readonly>
                            <input type="hidden" name="modal[flag]" id="modal_flag" class="form-control mb-2" placeholder="Modal Flag" readonly>
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm has-success" placeholder="Party Type" data-toggle="modal" data-target="#partyTypeModal">
                            <input type="hidden" name="modal[category]" id="modal_category" class="form-control mb-2" placeholder="Modal Category" readonly>
                            <input type="hidden" name="modal[status]" id="modal_status" class="form-control mb-2" placeholder="Modal Status" readonly>
                            <input type="hidden" name="modal[flag]" id="modal_flag" class="form-control mb-2" placeholder="Modal Flag" readonly>
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <input type="text" class="form-control input-sm has-success" placeholder="Tag Sample" data-toggle="modal" data-target="#tagSampleModal">
                            <input type="hidden" name="modal[category]" id="modal_category" class="form-control mb-2" placeholder="Modal Category" readonly>
                            <input type="hidden" name="modal[status]" id="modal_status" class="form-control mb-2" placeholder="Modal Status" readonly>
                            <input type="hidden" name="modal[flag]" id="modal_flag" class="form-control mb-2" placeholder="Modal Flag" readonly>
                        </div>
                        <div class="col-xs-4" style="margin-bottom: 8px">
                            <select name="buy_country" type="text" class="form-control input-sm">
                                <option>Buyer Country</option>
                                <option value="1">Bangladesh</option>
                                <option value="2">Australia</option>
                                <option value="3">America</option>
                                <option value="4">China</option>
                                <option value="5">Japan</option>
                                <option value="6">Malyasia</option>
                            </select>
                        </div>


                        {{-- static select component --}}
                        {{-- <x-form.select 
                            name="buyer_country_id" 
                            label="Buyer Country" 
                            :options="[
                                '1' => 'Bangladesh', 
                                '2' => 'Australia', 
                                '3' => 'America',
                                '4' => 'China',
                                '5' => 'Japan',
                                '6' => 'Malyasia',
                            ]"
                            :selected="old('buyer_country_id')"
                        /> --}}

                        {{-- dynamic select component  --}}

                        {{-- for controller file --}}
                        {{-- $categories = Category::pluck('name', 'id'); // [id => name]
                        return view('your.view', compact('categories')); --}}

                        {{-- <x-form.select 
                            name="category_id" 
                            label="Select Category" 
                            :options="$categories" 
                            :selected="old('category_id')"
                        /> --}}


                        <div class="col-xs-4" style="margin-bottom: 8px">
                            {{-- <input type="text" class="form-control input-sm" placeholder="Status"> --}}
                            <select name="buy_status" type="text" class="form-control input-sm">
                                <option>Buyer Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-xs-7" style="margin-bottom: 8px">
                            <input name="buy_remarks" type="text" class="form-control input-sm has-success" placeholder="Remarks">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Buyer Info</button>
                    </div>
                </form>

                {{-- <hr> --}}

                {{-- <div class="row">
                    <div class="col-xs-3 form-group has-success" style="margin-bottom: 8px" for="inputSuccess">
                        <input type="text" class="form-control input-sm" placeholder=".col-xs-3">
                    </div>
                    <x-input name="email" type="email" placeholder="E-mail" divClass="col-xs-4 has-success"/>
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

    <!-- Modal for party type -->
    <div class="modal fade" id="partyTypeModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
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
                                        <input placeholder="Buyer" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer/Buying Agent" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer/Subcontract" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer/Supplier" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Export LC Applicant" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Other Buyer" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Subcontract" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer Type" type="text" class="form-control input-sm">
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
                                        <input placeholder="Buyer Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer Type" type="text" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox">
                                        </span>
                                        <input placeholder="Buyer Type" type="text" class="form-control input-sm">
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
    <div class="modal fade" id="tagSampleModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
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