@extends('master')

@section('content')
<a href="{{route('search')}}" class="btn btn-success my-3" target="_blank">Back</a>
<h1>DANA Store List</h1>
<table class="table table-hover" id="datatable">
    <thead>
        <tr>
            <th>Merchant ID</th>
            <th>Internal Shop ID</th>
            <th>External Shop ID</th>
            <th>Brand Name</th>
            <th>Merchant Name</th>
            <th>Shop Name</th>
            <th>MCC</th>
            <th>NMID</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>City</th>
            <th>Province</th>
            <th>PIC Name</th>
            <th>PIC Contact</th>
            <th>Latitutde</th>
            <th>Longitude</th>
            <th>Shop Status</th>
            <th>Deployment Status</th>
        </tr>
    </thead>
</table>
@stop
@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'excel', 'csv', 'pdf', 'copy'
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            processing: true,
            serverSide: true,
            ajax: "{{url('cms/json')}}",
            columns: [{
                    data: 'merchant_id',
                    name: 'dana_merchant.merchant_id'
                },
                {
                    data: 'internal_shop_id',
                    name: 'dana_store.internal_shop_id'
                },
                {
                    data: 'external_shop_id',
                    name: 'dana_store.external_shop_id'
                },
                {
                    data: 'brand_name',
                    name: 'dana_merchant.brand_name'
                },
                {
                    data: 'merchant_name',
                    name: 'dana_merchant.merchant_name'
                },
                {
                    data: 'shop_name',
                    name: 'dana_store.shop_name'
                },
                {
                    data: 'mcc',
                    name: 'dana_store.mcc'
                },
                {
                    data: 'nmid',
                    name: 'dana_store.nmid'
                },
                {
                    data: 'address',
                    name: 'dana_store.address'
                },
                {
                    data: 'postal_code',
                    name: 'dana_store.postal_code'
                },
                {
                    data: 'city',
                    name: 'dana_store.city'
                },
                {
                    data: 'province',
                    name: 'dana_store.province'
                },
                {
                    data: 'pic_name',
                    name: 'dana_store.pic_name'
                },
                {
                    data: 'pic_contact',
                    name: 'dana_store.pic_contact'
                },
                {
                    data: 'latitude',
                    name: 'dana_store.latitude'
                },
                {
                    data: 'longitude',
                    name: 'dana_store.longitude'
                },
                {
                    data: 'shop_status',
                    name: 'dana_store.shop_status'
                },
                {
                    data: 'deployment_status',
                    name: 'dana_store.deployment_status'
                }
            ]
        });
    });
</script>
@endpush