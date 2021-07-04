@extends('layout.layoutlppm')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
@section('container-fluid')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


<div class="card shadow ">
    <div class="card-body">

        <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Judul</th>
                    <th>Nama</th>
                    <th>File</th>
                    <th>Progres</th>
                    
                  
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $kemajuan as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">{{ $p->user->name}}</td>
                    <td align="center"><a href="{{Storage::url('public/progrespenelitian/'.$p->file)}}">{{ $p->file }}</a></td>
                    <td align="center" >{{ $p->progres }} %</td>
                    
					
                </tr>
                @endforeach
            </tbody>

        </table>


      </div>
    </div>
</div>








<script>
        // delete

</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>




@endsection
