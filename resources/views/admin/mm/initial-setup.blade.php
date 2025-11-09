@extends('admin.master')

@section('title', 'MM-Initial-Setup | ERP')
@section('page-title', 'MM Initial Setup')
@section('bread-title', 'Home')
@section('bread-sub-title', 'MM')

@section('content')

@php
    $tabs = ['fit' => 'Fit', 'color' => 'Color', 'size' => 'Size'];
@endphp


<ul class="nav nav-tabs">
    @foreach ($tabs as $tabId => $tabTitle)
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === $tabId ? 'active' : '' }}"
               href="{{ route('mm.initialSetup', ['tab' => $tabId]) }}">
                {{ $tabTitle }}
            </a>
        </li>
    @endforeach
</ul>

<div class="tab-content mt-3">
    @foreach ($tabs as $tabId => $tabTitle)
        <div class="tab-pane fade {{ $activeTab === $tabId ? 'show active' : '' }}" id="{{ $tabId }}">
            @includeIf("backend.mm.tabs.$tabId", $tabData)
        </div>
    @endforeach
</div>

{{-- <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'fit' ? 'active' : '' }}"
           href="{{ route('mm.initialSetup', ['tab' => 'fit']) }}">Fit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'color' ? 'active' : '' }}"
           href="{{ route('mm.initialSetup', ['tab' => 'color']) }}">Color</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'size' ? 'active' : '' }}"
           href="{{ route('mm.initialSetup', ['tab' => 'size']) }}">Size</a>
    </li>
</ul>

<div class="tab-content mt-4">
    @if ($activeTab == 'fit')
        @include('backend.mm.tabs.fit', $tabData)
    @elseif ($activeTab == 'color')
        @include('backend.mm.tabs.color', $tabData)
    @elseif ($activeTab == 'size')
        @include('backend.mm.tabs.size', $tabData)
    @endif
</div> --}}

@if(session('success'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        toast: true,
        icon: 'success',
        title: '{{ session('success') }}',
        timer: 2000,
        position: 'top-end',
        showConfirmButton: false
    });
</script>
@endif


@endsection
