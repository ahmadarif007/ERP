@extends('admin.master')

@section('title')
Dashboard | Home
@endsection

@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap.min.css"/>




<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_item" data-toggle="tab">Item</a></li>
    <li><a href="#tab_size" data-toggle="tab">Size</a></li>
    <li><a href="#tab_color" data-toggle="tab">Color</a></li>
    <li><a href="#tab_fit" data-toggle="tab">Fit</a></li>
    <li><a href="#tab_season" data-toggle="tab">Season</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_item">
        @include('backend.company.partials.item')
    </div>
    <div class="tab-pane" id="tab_size">
        @include('backend.company.partials.size')
    </div>
    <div class="tab-pane" id="tab_color">
        @include('backend.company.partials.color')
    </div>
    <div class="tab-pane" id="tab_fit">
        @include('backend.company.partials.fit')
    </div>
    <div class="tab-pane" id="tab_season">
        @include('backend.company.partials.season')
    </div>
  </div>
</div>

<!-- jQuery (আগে থাকতে হবে) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap.min.js"></script>

@endsection