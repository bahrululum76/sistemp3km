@extends('layout.layoutlppm')

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
                 
                    <th>Pengaju</th>
                    <th>Status</th>
               
                </tr>
            </thead>

            <tbody class="tbody">
               @foreach ($data as $proposal)
                   
               @endforeach
                <tr class="thead">
                    
                    
                    <td align="center"><a href="{{url('lppm/detailpilihreview/'.$proposal->id)}}">{{$proposal->user->name}}</a></td>
                    <td align="center">{{$proposal->status_id}}</td>
                    
                    
                </tr>

               
            </tbody>

        </table>


      </div>
    </div>
</div>




@endsection
