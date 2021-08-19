@extends('layout.layoutlppm')

<!-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> -->
@section('container-fluid')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


<div class="card shadow ">
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                  
                    <th>Prodi</th>
                  
            </thead>

            <tbody class="tbody">
                <tr>
                    <td align="center"><a href="{{route('pilih_review')}}"> Informatika </a></td>
                    
                </tr>
                <tr>
                <td align="center"><a href=""> Industri </a></td>
                </tr>
                <tr>
                <td align="center"><a href=""> Sipil </a></td>
                </tr>

               
            </tbody>

        </table>


      </div>
    </div>
</div>


@endsection
