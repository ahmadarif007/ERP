@extends('admin.master')

@section('title')
Order-Entry | ERP
@endsection

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
}

/* body {
  text-align: center;
  background-color: #34495e; /* $blue-gray */
} */

h1 {
  font-weight: 100;
  font-size: 32px;
  padding: 40px;
  color: #fff;
}

#breadcrumb {
  list-style: none;
  display: inline-block;
  width: 100%;
}

#breadcrumb .icon {
  font-size: 14px;
}

#breadcrumb li {
  float: left;
}

#breadcrumb li a {
  color: #fff;
  display: block;
  background: #3498db; /* $blue */
  text-decoration: none;
  position: relative;
  height: 40px;
  line-height: 40px;
  padding: 0 10px 0 5px;
  text-align: center;
  margin-right: 23px;
}

/* even items */
#breadcrumb li:nth-child(even) a {
  background-color: #2980b9; /* $blue-darken */
}
#breadcrumb li:nth-child(even) a:before {
  border-color: #2980b9;
  border-left-color: transparent;
}
#breadcrumb li:nth-child(even) a:after {
  border-left-color: #2980b9;
}

/* first item */
#breadcrumb li:first-child a {
  padding-left: 15px;
  /* border-radius: 4px 0 0 4px; */
}
#breadcrumb li:first-child a:before {
  border: none;
}

/* last item */
#breadcrumb li:last-child a {
  padding-right: 15px;
  border-radius: 0 4px 4px 0;
}
#breadcrumb li:last-child a:after {
  border: none;
}

/* base arrows */
#breadcrumb li a:before,
#breadcrumb li a:after {
  content: "";
  position: absolute;
  top: 0;
  border: 0 solid #3498db; /* $blue */
  border-width: 20px 10px;
  width: 0;
  height: 0;
}

#breadcrumb li a:before {
  left: -20px;
  border-left-color: transparent;
}

#breadcrumb li a:after {
  left: 100%;
  border-color: transparent;
  border-left-color: #3498db; /* $blue */
}

/* hover */
#breadcrumb li a:hover {
  background-color: #1abc9c; /* $green */
}
#breadcrumb li a:hover:before {
  border-color: #1abc9c;
  border-left-color: transparent;
}
#breadcrumb li a:hover:after {
  border-left-color: #1abc9c;
}

/* active */
/* #breadcrumb li a:active {
  background-color: #16a085; /* $green-darken *
}
#breadcrumb li a:active:before {
  border-color: #16a085;
  border-left-color: transparent;
}
#breadcrumb li a:active:after {
  border-left-color: #16a085;
} */

/* active breadcrumb link */
#breadcrumb li a.active {
  background-color: #1abc9c !important; /* green background */
}

/* arrow left shape */
#breadcrumb li a.active:before {
  border-color: #1abc9c !important;
  border-left-color: transparent !important;
}

/* arrow right shape */
#breadcrumb li a.active:after {
  border-left-color: #1abc9c !important;
}


</style>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <ul id="breadcrumb">
        <li><a href="#"><span class="icon icon-home"> </span>Home</a></li>
        <li><a href="#"><span class="icon icon-beaker"> </span> Projects</a></li>
        <li><a href="#"><span class="icon icon-double-angle-right"></span> Breadcrumb</a></li>
        <li><a href="#"><span class="icon icon-rocket"> </span> Getting started</a></li>
        <li><a href="#"><span class="icon icon-rocket"> </span> Getting started</a></li>
        <li><a href="#"><span class="icon icon-rocket"> </span> Getting started</a></li>
        <li><a href="#"><span class="icon icon-arrow-down"> </span> Download</a></li>
      </ul> --}}

      <ul id="breadcrumb">
        <li><a href="#" data-url="/job-entry"><span class="icon icon-home"></span> Job Entry</a></li>
        <li><a href="#" data-url="/po-details"><span class="icon icon-beaker"></span> PO Details Entry</a></li>
        <li><a href="#" data-url="/fabric-budget"><span class="icon icon-double-angle-right"></span> Fabric Costing</a></li>
        <li><a href="#" data-url="/trims-budget"><span class="icon icon-rocket"></span> Trims Costing</a></li>
        <li><a href="#" data-url="/embelishment-budget"><span class="icon icon-arrow-down"></span> Embelishment Costing</a></li>
        <li><a href="#" data-url="/fabric-booking"><span class="icon icon-arrow-down"></span> Fabric Booking</a></li>
      </ul>

      <!-- এই div এর ভিতরে AJAX content লোড হবে -->
      <div id="content-area">
        <p>Welcome! Click a breadcrumb menu to load content without reload.</p>
      </div>
      
      {{-- <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1> --}}

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Garments Job Entry</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

                <div class="form-group col-md-2">
                  <label>Company</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">ATL</option>
                    <option>YKIL</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Buyer</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Brand</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Minimal</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Team Leader</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label> Product Category</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>


                <div class="form-group col-md-2">
                  <label>Order Uom</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Product Group</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Season Year</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label> Dealing Merchant</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Region</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Quality Level</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>



                <div class="form-group col-md-2">
                  <label>Sus. Standard</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Location</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label> Factory Merchant</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Ship Mode</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Style Owner</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Fit</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>


                <div class="form-group col-md-2">
                  <label>Fab. Material</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Prod. Dept.</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Currency</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Packing</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Order Nature</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label>Item</label>
                  <select class="form-control select2 input-sm" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                  </select>
                </div>


                <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Style Ref.</label>
                  <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputPassword1">Style Description</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Job No</label>
                  <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
                </div>


                <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Sew SMV/ Pcs</label>
                  <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputPassword1">Cut SMV/ Pcs</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputEmail1">Fin SMV/ Pcs</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group col-md-2">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group col-md-2">
                  <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2 input-sm" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2 input-sm" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>

              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->


        <!-- right column -->
        <div class="col-md-3">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control input-sm" id="inputEmail3" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control input-sm" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
            <!-- /.box-body -->

          {{-- Data tablewithout search=============== --}}
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  {{-- <h3 class="box-title">Responsive Hover Table</h3> --}}

                  <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>PO No</th>
                      <th>Quantity</th>
                      <th>Status</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>QE0836542</td>
                      <td>100000</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>QE0836542</td>
                      <td>100000</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>QE0836542</td>
                      <td>100000</td>
                      <td><span class="label label-info">Pending</span></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>QE0836542</td>
                      <td>100000</td>
                      <td><span class="label label-danger">Unapproved</span></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>QE0836542</td>
                      <td>100000</td>
                      <td><span class="label label-success">Approved</span></td>
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>


          {{-- Data table with search======================= --}}

          {{-- <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SI</th>
                  <th>PO</th>
                  <th>Qauntity</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>5.5</td>
                  <td>A</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div> --}}


        </div>
          <!-- /.box -->
      </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
    <!-- /.content -->





    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-12">
          <div class="box-header with-border">
            <h3 class="box-title">PO Details Entry</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12">

              <div class="form-group col-md-2">
                <label>Order Status</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputEmail1">PO No</label>
                <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">PO Receive Date</label>
                <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Pub. Ship. Date</label>
                <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Avg. Rate Pcs/Set</label>
                <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Order Qty</label>
                <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
              </div>

              <div class="form-group col-md-2">
                <label>Garment Item</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label>Delivery Country</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label>Country Ship Date</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label>Po Status</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label>Pcs Per Pack</label>
                <select class="form-control select2 input-sm" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Int. Ref/ Grouping</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.box -->
    </section>

    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default col-12">
          <div class="box-header with-border">
            <h3 class="box-title">Select2</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password">
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.box -->


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
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                  <td>A</td>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->

<script>

var inputs = document.getElementsByTagName('input');

for (var i=0; i<inputs.length; i++) {
	inputs[i].addEventListener('focus', function() {
		this.previousSibling.previousSibling.classList.remove('fadeIn');
		this.previousSibling.previousSibling.classList.add('fadeOut');
	});

	inputs[i].addEventListener('blur', function() {
		if (!this.value.length) {
			this.previousSibling.previousSibling.classList.remove('fadeOut');
			this.previousSibling.previousSibling.classList.add('fadeIn');
		}
	});
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

  $('#breadcrumb a').on('click', function(e) {
    e.preventDefault(); // পেজ reload বন্ধ করে

    let url = $(this).data('url'); // data-url attribute থেকে URL নিচ্ছি
    let link = $(this);

    // active breadcrumb highlight করা (ঐচ্ছিক)
    $('#breadcrumb a').removeClass('active');
    link.addClass('active');

    // লোডিং মেসেজ দেখানো
    $('#content-area').html('<p style="color:#fff;">Loading...</p>');

    // AJAX call
    $.ajax({
      url: url,
      method: 'GET',
      success: function(response) {
        $('#content-area').html(response);
      },
      error: function() {
        $('#content-area').html('<p style="color:red;">Error loading content.</p>');
      }
    });
  });

});
</script>


@endsection
