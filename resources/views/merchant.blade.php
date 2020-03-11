@extends('master')

@section('content')
<body>
    <div class="container">
        <h1>Merchant</h1>
        <form action="search" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="merchant" class="form-control" placeholder="Enter Merchant ID" value="{{ old('search') }}">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-hover">
            <tr>
                <th>Merchant ID</th>
                <th>Brand Name</th>
                <th>Store</th>
            </tr>
            @if(count($result))
            @foreach($result as $row)
            <tr>
                <td>{{ $row->merchant_id }}</td>
                <td>{{ $row->brand_name }}</td>
                <td><a href="{{route('view')}}">Store</a></td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="3">Data not found.</td>
                @endif
        </table>
    </div>
</body>