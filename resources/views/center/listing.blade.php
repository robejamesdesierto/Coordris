@extends('adminlte::page')
@section('title', 'COORDRIS - Center Detail')
@section('content_header')
    <h1>Center Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
        <form action="{{\route('centers.registration')}}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger text-xs">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="#centerName">Center Name:</label>
                <input class="form-control" type="text" name="name" id="centerName" placeholder="Example: Sendong Survivors Center">
            </div>
            <!-- <div class="form-group">
                <label for="#city">Select City:</label>
                <select id="city" name="city_id" class="form-control">
                    @foreach($cities as $city)
                        <option class="form-control" value="{{$city->id}}"> {{$city->name}}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="form-group">
                <label for="#barangay">Select Baranagay:</label>
                <select id="barangay" name="barangay_id" class="form-control">
                    @foreach($barangays as $barangay)
                        <option class="form-control" value="{{$barangay->id}}"> {{$barangay->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#infrastructure">Select Infrastructure:</label>
                <select id="infrastructure" name="infrastructure_id" class="form-control">
                    @foreach($infrastructures as $infrastructure)
                        <option class="form-control" value="{{$infrastructure->id}}"> {{$infrastructure->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-goup">
                <button class="btn btn-block btn-primary">Register</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title text-capitalize">Center Summary</h4>
            </div>
            <div class="box-body">
                <table id="centers-table" class="table table-responsive table-striped table-hover">
                    <thead class="bg-blue-gradient">
                    <tr>
                        <th>Name</th>
                        <th>Infrastructure</th>
                        <th>Barangay</th>
                        <th>City</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/DataTables/datatables.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/mdb/css/mdb.min.css')}}"/>
@endpush
@push('js')
<script type="text/javascript" src="{{\asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/mdb.min.js')}}"></script>
<script>
    $(function() {
        var table = $('#centers-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": [
                'pageLength', 'pdf', 'csv'
            ],
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "name", "orderable": false, "searchable": true },
                { "data": "structure", "orderable": false, "searchable": true },
                { "data": "barangay", "orderable": false, "searchable": true},
                { "data": "city", "orderable": false, "searchable": true },
            ],
            "ajax": "{{\route('api.lgu.centers.listing', \compact('lgu'))}}"
        });
        //click rows
        $('#centers-table tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            window.location.href = ""+ data['slug'] +"/detail";
        });
    });
</script>
@endpush