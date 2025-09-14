<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('erp_dashboard/')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Knit Garments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a class="active" href="#"><i class="fa fa-circle-o"></i>Order Tracking
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                    <li><a href="{{ url('order/entry/') }}"><i class="fa fa-circle-o"></i>Order Entry by Matrix</a></li>
                    <li><a href="{{ url('pre-costing/') }}"><i class="fa fa-circle-o"></i>Pre-Costing</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Sample Requisition With Booking</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Library</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('supplier') }}"><i class="fa fa-circle-o"></i>Supplier</a></li>
            <li><a href="{{ Route('item.list') }}"><i class="fa fa-circle-o"></i>Item List</a></li>
            <li><a href="{{ url('/items') }}"><i class="fa fa-circle-o"></i>Item</a></li>
            {{-- <li><a href="{{ url('/add/form') }}"><i class="fa fa-circle-o"></i>Form</a></li>
            <li><a href="{{ url('/form') }}"><i class="fa fa-circle-o"></i>Form2</a></li>
            <li><a href="{{ route('form.show') }}"><i class="fa fa-circle-o"></i>Form3</a></li>
            <li><a href="{{ route('form.store4') }}"><i class="fa fa-circle-o"></i>Form4</a></li> --}}
            <li><a href="#"><i class="fa fa-circle-o"></i>Yarn Count</a></li>
            <li><a href="{{ url('buyer') }}"><i class="fa fa-circle-o"></i>Buyer</a></li>
            <li><a href="{{ url('brand') }}"><i class="fa fa-circle-o"></i>Brand</a></li>
            <li><a href="{{ url('party-type') }}"><i class="fa fa-circle-o"></i>Part Type</a></li>
            <li><a href="{{ url('company') }}"><i class="fa fa-circle-o"></i>Company</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Company</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('business-groups.index') }}"><i class="fa fa-circle-o"></i>Business Group</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Unit Name</a></li>
            <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>