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
                    <th>Pendanaan</th>
                    <th>Nama</th>
                    <th>Publikasi</th>
                    <th>Tahun</th>
                    <th>Url</th>
                    <th>File</th>
                    
                    
                  
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $penelitian as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">{{ $p->pendanaan}}</td>
                    <td align="center">@if($p->pengaju){{ $p->pengaju->name }}@endif</td>
                    <td align="center" >{{ $p->publikasi }} </td>
                    <td align="center" >{{ $p->tahun }} </td>
                    <td align="center">{{ $p->url}}</td>
                    <td align="center" ><a href="{{Storage::url('public/penelitian/'.$p->file)}}">{{ $p->file }}</a> </td>
                    
                    
					
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
