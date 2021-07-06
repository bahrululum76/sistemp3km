@extends('layout.layoutlppm')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
@section('container-fluid')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif




<div class="card shadow ">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Dana</h1>
        </div>
        <!-- <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Pelaksanaan</th>
                    <th>Bahan</th>
                    <th>Transport</th>
                    <th>Sewa</th>
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $dana as $p )
                <tr class="thead">
                    <td>{{ $p->user->name}}</td>
                    <td>{{ $p->proposal->judul }}</td>
                    <td>@currency($p->pelaksanaan)</td>
					<td>@currency ($p->bahan)</td>
                    <td>@currency($p->Transport)</td>
                    <td>@currency( $p->sewa)</td>
                    
                </tr>
                @endforeach
            </tbody>

        </table>


      </div>
    </div>
</div>





@endsection
