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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


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
        <li><a href="#" data-url="/job-entry"><span class="fa-solid fa-home"></span> Job Entry</a></li>
        <li><a href="#" data-url="/po-details"><span class="fa-solid fa-book"></span> PO Details Entry</a></li>
        <li><a href="#" data-url="/labdip"><span class="fa-solid fa-flask"></span>  LAB DIP Approval</a></li>
        <li><a href="#" data-url="/fabric-budget"><span class="fa-solid fa-shirt"></span> Fabric Costing</a></li>
        <li><a href="#" data-url="/trims-budget"><span class="fa-solid fa-rocket"></span> Trims Costing</a></li>
        <li><a href="#" data-url="/embelishment-budget"><span class="fa-solid fa-print"></span> Embelishment Costing</a></li>
        <li><a href="#" data-url="/fabric-booking"><span class="fa-solid fa-shirt"></span> Fabric Booking</a></li>
      </ul>

      <!-- এই div এর ভিতরে AJAX content লোড হবে -->
      <div id="content-area">
        {{-- <p>Welcome! Click a breadcrumb menu to load content without reload.</p> --}}
      </div>
      
      {{-- <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1> --}}

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        {{-- <li><a href="#">Forms</a></li> --}}
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <section class="content" id="datatable-section">
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
        // 🔹 Data Table section hide করো
        $('#datatable-section').hide();
        
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
