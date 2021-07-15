@extends('layout.layoutdosen')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
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

        @if (count($errors) > 0)
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        @if($proposal_kosong_1 == null)
            
            <button class="btn btn-sm btn-primary mt-4 mb-2 " id="createNewItem" data-toggle="modal" data-target="#ModalTambah" > Tambah Proposal </button>    
            
        @endif
        
        @foreach($proposal_kosong as $data_kosong)
        @if ($data_kosong->status_id == 2 || $data_kosong->status_id == 4) 
        <button class="btn btn-sm btn-primary mt-4 mb-2 " id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  > Tambah Proposal </button>
        @elseif ($data_kosong->status_id == 3 || $data_kosong->status_id == 1)
        <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah2" > Tambah </button>
       @endif
       @endforeach

        <!-- <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Judul</th>
                    <th>File</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $proposal as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">{{ $p->file }}</td>
                    <td align="center">{{ $p->periode }}</td>
                    <!-- <td align="center">{{$p->category_id}}</td> -->
					<td align="center">@if ($p->status_id == 1)
                        <span style="background-color:green;padding:5px;border-radius:5px;color:white;">{{'Diterima'}}</span>
                    @elseif ($p->status_id == 2)
                    <span style="background-color:yellow;padding:5px;border-radius:5px;">{{'Belum Diterima'}}</span>
                    @elseif ($p->status_id == 3)
                    <span style="background-color:blue;padding:5px;border-radius:5px;color:white;">{{'Direvisi'}}</span>
                    @elseif ($p->status_id == 4)
                    <span style="background-color:red;padding:5px;border-radius:5px;color:white;">{{'Ditolak'}}</span>
                    @endif</td>

                    <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalRevisi-{{$p->id}}"> Revisi </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>


      </div>
    </div>
</div>


<!-- Modal Revisi -->
@foreach ($proposal as $p)
<div id="ModalRevisi-{{$p->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Detail Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Detail Revisi</th>
                    <!-- <th>Status</th> -->
                </tr>
            </thead>

            <tbody class="tbody">
                
                <tr class="thead">
                    <td >{{ $p->detail_revisi }}</td>
                    <!-- <td align="center">{{$p->category_id}}</td> -->

                </tr>
                
            </tbody>

        </table>


      </div>

            </form>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endforeach


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
            <form action="{{ route ('proposal_pengabdian/store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" required="required" >
                  </div>
                  <div class="form-group">
                    <label >Periode</label>
                        <input type="text" class="form-control" name="periode" required="required" >
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Abstrak</label>
                    <textarea class="ckeditor" id="ckeditor" name="abstrak" required="required"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="">
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

<!-- Modal tambah2 -->
<div id="ModalTambah2" class="modal fade" role="dialog">
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
            
            <form action="{{ url('dosen/proposal_pengabdian/store2') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label >Judul</label>
                        <input type="text" class="form-control" name="judul" required="required" >
                  </div>
                  <div class="form-group">
                    <label >Periode</label>
                        <input type="text" class="form-control" name="periode" required="required" >
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Abstrak</label>
                    <textarea class="ckeditor" id="ckeditor" name="abstrak" required="required"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="">
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

<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>


@endsection
