@extends('layout.layoutlppm')

<!-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> -->
@section('container-fluid')


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
                    <th>Judul</th>
                    <th>Pengaju</th>
                    <th>Prodi</th>
                    <th>File</th>
                    
                    
                    <th>Reviewer</th>
                    <th>Status</th>
             
                </tr>
            </thead>

            <tbody class="tbody">

                @foreach ( $proposal as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">@if($p->pengaju){{ $p->pengaju->name }}@endif</td>
                    <td align="center">{{$p->user->prodi}}
                    <td align="center">{{ $p->file }}</td>
                    
                    

                    <td align="center">@if($p->reviewer){{ $p->reviewer->name}}@endif</td>

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
