@extends('layout.layoutadmin')

<!-- {{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}} -->
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
        <!-- <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button> -->
      <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Dipublikasikan pada</th>
                    <th>Tahun Publikasi</th>
                    <th>File</th>
                    
                    
                  
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $pengabdian as $p )
                <tr class="thead">
                    <td align="center">{{ $p->user->name}}</td>
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center" >{{ $p->dipublikasikan_pada }} </td>
                    <td align="center" >{{ $p->tahun_publikasi }} </td>
                    <td align="center" >{{ $p->file }} </td>     
                </tr>
                @endforeach
            </tbody>

        </table>



      </div>
    </div>
</div>



<!-- Modal tambah -->
<div id="ModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Proposal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url ('dosen/penelitian/store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" required="required" >
                  </div>

                  <div class="form-group">
                    <label >Dipublikasikan Pada</label>
                        <input type="text" class="form-control" name="dipublikasikan_pada" required="required" >
                  </div>
                  <div class="form-group">
                    <label >Tahun Publikasi</label>
                        <input type="text" class="form-control" name="tahun_publikasi" required="required" >
                  </div>
                  
                  <div class="form-group">
                    <label for="file">File</label>
                    <!-- <input type="file" class="form-control" name="file"> -->
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    </div>
                  


                  <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>






@endsection
