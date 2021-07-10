@extends('layout.layoutadmin')

<!-- {{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}} -->
@section('container-fluid')

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->



<div class="card shadow ">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

    <div class="card-body">
    
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
                    <td>{!! $p->keterangan !!}</td>
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
    </div>
</div>


<!-- Modal tambah -->
<div id="ModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ route('kelolainformasi/store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" required="required" >
                  </div>

                  <div class="form-group">
                    <label >Keterangan</label>
                    <textarea class="ckeditor" id="ckeditor" name="keterangan" required="required"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="file">
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


<!-- edit modal -->
@foreach ( $informasi as $p )
<div id="EditModal-{{ $p->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url('admin/kelolainformasi/edit'.$p->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group" hidden>
                    <label >Id</label>
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                  </div>
                  <div class="form-group">
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{$p->judul}}" required="required"  >
                  </div>

                  <div class="form-group">
                    <label >Keterangan</label>
                    <textarea class="ckeditor" id="ckeditor" name="keterangan" value="{{$p->keterangan}}" required="required">{{$p->keterangan}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="file" value="{{$p->file}}" >
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file"value="{{$p->file}}">
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
@endforeach


<script>
        // delete

</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(item_id){
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    console.log(result.isConfirmed)
  if (result.isConfirmed) {
    $('#'+item_id).submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
    }
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

   <!-- echo $informasi->count(); -->
    

@endsection
