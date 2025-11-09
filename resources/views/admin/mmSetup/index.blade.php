@extends('admin.master')

@section('title', 'MM | ERP')
@section('page-title', 'MM')
@section('bread-title', 'Home')
@section('bread-sub-title', 'MM-setup')

@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">



<div class="container-fluid">
    <h4 class="mb-3">MM → Initial Setup</h4>

    {{-- Nav tabs --}}
    <ul class="nav nav-tabs" id="mmTabs">
        <li class="nav-item"><a class="nav-link active" data-tab="gmts-item" href="javascript:void(0)">Garments Item</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="item_category" href="javascript:void(0)">Item Category</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="fit" href="javascript:void(0)">Fit</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="color" href="javascript:void(0)">Color</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="size" href="javascript:void(0)">Size</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="season" href="javascript:void(0)">Season</a></li>
        <li class="nav-item"><a class="nav-link" data-tab="sample" href="javascript:void(0)">Sample</a></li>
    </ul>

    {{-- Dynamic content area --}}
    <div class="pt-3" id="tabContentArea">
        {{-- AJAX will load form + table here --}}
    </div>
</div>

<!-- SweetAlert2 (if not in master) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap 5 CSS & JS, jQuery, Bootstrap Icons, SweetAlert2 - load in master -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
    $(function() {
        // CSRF token for AJAX
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });

        // load a tab's partials (form + table) via AJAX
        function loadTab(tab) {
            $('#tabContentArea').html('<div class="text-center py-4">লোড হচ্ছে...</div>');
            $.get(`/item/item/tab-content/${tab}`, function(res) {
                // server-side route not provided above — but we will instead render client-side partials
            }).fail(function() {
                // if you don't have server loader, we'll use local include via blade fragments.
                // For simplicity, just load client-side via switch:
                if (tab === 'gmts-item') {
                    $('#tabContentArea').html(`@include('admin.mmSetup.form.item-form') @include('admin.mmSetup.table.item-table')`);
                    initItem(); // init JS after DOM insert
                } 
            });
        }

        // Tab Click Event
        $('#mmTabs .nav-link').click(function() {
            $('#mmTabs .nav-link').removeClass('active');
            $(this).addClass('active');

            let tab = $(this).data('tab');
            localStorage.setItem('activeItemTab', tab); // tab name save

            // Sidebar menu open করানো
            $('.sidebar-item').removeClass('selected open');
            $('.sidebar-link').removeClass('active');

            loadTab(tab);
        });

        // Initial Load - last saved tab অথবা default item
        let lastTab = localStorage.getItem('activeItemTab') || 'item';
        $('#mmTabs .nav-link').removeClass('active'); // remove all active
        $('#mmTabs .nav-link[data-tab="'+lastTab+'"]').addClass('active');
        loadTab(lastTab);
    });
    console.log("✅ item.js loaded properly!");
</script>


<script src="{{ asset('backend/custom-js/mm/item.js') }}"></script>

@endsection

