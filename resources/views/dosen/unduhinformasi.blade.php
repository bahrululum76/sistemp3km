@extends('layout.layoutdosen')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
@section('container-fluid')

<div class="card shadow ">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif 


<div class="row" style="margin:auto;">
    @foreach ( $informasi as $p) 
    <div class="col-md-4">
        <div class="card-columns-fluid">
            <div class="card bg-dark" style="width: 18rem; ">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center; font-size:30px;"><b>{{$p->judul}}</b></h5>
                    <p class="card-text" style="text-align:justify;"><b>{{$p->keterangan}}</b></p>
                    <p class="card-text">{{$p->file}}</p> 
                </div>
            </div>
        </div>
    </div>
 
        
    @endforeach
</div>
</div>

@endsection


<!--<div class="card-body">
    
    <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button>
  <div class="table-responsive">
    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead class="thead">
            <tr class="tbody">
                <th>Judul</th>
                <th>Keterangan</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="tbody">
            @foreach ( $informasi as $p )
            <tr class="thead">
                <td>{{ $p->judul}}</td>
                <td>{{ $p->keterangan }}</td>
                <td>{{ $p->file }}</td>
                <td >
                    <button   class="btn btn-primary btn-sm " data-toggle="modal" data-target="#EditModal-{{ $p->id }}" >Ubah</button>
                    {{-- <a  href="kelolaobat/delete/{{ $p->id }}" class="btn btn-danger btn-sm" >Hapus</a> --}}
                    <form id="delete-obat-{{$p->id}}" action=" {{ url('admin/kelolainformasi/delete'.$p->id) }}" method="post" style="display: inline" data-id="{{$p->id}}">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-obat-{{$p->id}}')">delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


  </div>
</div> -->
