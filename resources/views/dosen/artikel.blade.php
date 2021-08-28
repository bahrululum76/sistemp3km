@extends('layout.layoutdosen')

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
        <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button>
      <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Judul</th>
                    <th>Tahun</th>
                    <th>File</th>
                    <th>Action</th>
                    
                  
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $artikel as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">{{ $p->tahun }}</td>
                    <td align="center">{{ $p->file }}</td>
                    <td align="center">
                      <button class="btn btn-primary btn-sm ">
                        <i class="fa fa-edit"></i>
                      </button >
                      <button class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                    </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url ('dosen/artikel/store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
               
                  <div class="form-group" hidden>
                    <label >Id Penelitian</label>
                        <input type="text" class="form-control" name="id_penelitian" value="{{$penelitian->id}}" required="required" >
                  </div>
                
                <div class="form-group" hidden>
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{$penelitian->judul}}"  required="required" >
                  </div>
                 
                  

                  <div class="form-group">
                    <label for="file">File</label>
                    <!-- <input type="file" class="form-control" name=""> -->
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
