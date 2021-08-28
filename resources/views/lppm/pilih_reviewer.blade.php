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
            @foreach ( $proposal as $p )
                   
               
                <tr class="thead">
                    
                    
                    <td align="center"><a href="{{url('lppm/detailpilihreview/'.$p->id)}}">{{$p->user->name}}</a></td>
                    <td align="center">
                        @if ($p->status_id == 1)
                            <span style="background-color:green;padding:5px;border-radius:5px;color:white;">{{'Diterima'}}</span>
                        @elseif ($p->status_id == 2)
                            <span style="background-color:yellow;padding:5px;border-radius:5px;">{{'Belum Diterima'}}</span>
                        @elseif ($p->status_id == 3)
                            <span style="background-color:blue;padding:5px;border-radius:5px;color:white;">{{'Direvisi'}}</span>
                        @elseif ($p->status_id == 4)
                            <span style="background-color:red;padding:5px;border-radius:5px;color:white;">{{'Ditolak'}}</span>
                        @endif
                    </td>
                    
                    
                </tr>
                @endforeach

               
            </tbody>

        </table>


      </div>
    </div>
</div>




@endsection
