@extends('admin.master')

@section('title')
Buyer-Entry | ERP
@endsection

@section('content')



@endsection

<x-input name="buyer_name" type="text" placeholder="Buyer Name" divClass="col-xs-4 mb-2"/>
<x-input name="short_name" placeholder="Short Name" type="text" divClass="col-xs-4 mb-2"/>
<x-input name="contact_person" placeholder="Contact Person" type="text" divClass="col-xs-4 mb-2"/>
<x-input name="contact_no" placeholder="Contact No" type="number" divClass="col-xs-4 mb-2"/>
<x-input name="email" type="email" placeholder="E-mail" divClass="col-xs-4 mb-2">
<x-input name="address" placeholder="Address" type="text" divClass="col-xs-8 mb-2"/>
<x-input name="web_address" placeholder="Web Address" type="text" divClass="col-xs-4 mb-2"/>
<x-input name="short_name" placeholder="Buyer Short Name" type="text" divClass="col-xs-4 mb-2"/>