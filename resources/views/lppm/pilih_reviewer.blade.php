@extends('layout.layoutlppm')

<!-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> -->
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
                    <th>Judul</th>
                    <th>File</th>
                    <th>Pengaju</th>
                    
                    <th>Reviewer</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="tbody">

                @foreach ( $proposal as $p )
                <tr class="thead">
                    <td align="center">{{ $p->judul}}</td>
                    <td align="center">{{ $p->file }}</td>
                    <td align="center">@if($p->pengaju){{ $p->pengaju->name }}@endif</td>
                    

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

                    <td >
                        <button   class="btn btn-primary btn-sm " data-toggle="modal" data-target="#PilihReviewer-{{$p->id}}" value="">Pilih Reviewer</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#TolakProposal" >Tolak</button>
                        <!-- <form id="delete-obat-{{$p->id}}" action=" {{ url('lppm/pilih_review/tolak'.$p->id) }}" method="POST" style="display: inline" data-id="{{$p->id}}">
                            @csrf

                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-obat-{{$p->id}}')">Tolak</button>
                        </form> -->
                        <!-- <a  href="{{url ('lppm/pilih_review/tolak'.$p->id) }}" class="btn btn-danger btn-sm">Tolak </a>  -->



                     </td>
                </tr>

                @endforeach
            </tbody>

        </table>


      </div>
    </div>
</div>



<!-- Modal pilih_review -->
@foreach ( $proposal as $p )

<div id="PilihReviewer-{{$p->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Reviewer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url('lppm/pilih'.$p->id) }}"method="POST" enctype="multipart/form-data">
                  @csrf

                <div class="form-group" hidden>
                    <label >id</label>
                    @foreach($proposal as $p)
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                    @endforeach
                </div>

                <div class="form-group">
                    <label >Reviewer</label>

                        <select class="custom-select" name="reviewer_id" >
                            <option selected>Pilih Reviewer</option>
                                @foreach($user as $p)
                            <option value="{{$p->id}}">{{$p->name}} </option>
                                @endforeach
                        </select>

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

@foreach ($proposal as $p)
<div id="TolakProposal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">

            <form action="{{ url('lppm/pilih_review/tolak'.$p->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf

                <div class="form-group">
                    <label >Revisi</label>
                        <input type="text" class="form-control" name="revisi"  required="required" >
                </div>

                <div class="form-group">
                    <label >Detail</label>
                        <input type="text" class="form-control" name="detail"  required="required" >
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



<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<!-- <script>
    function confirmDelete(item_id){
Swal.fire({
  title: 'Yakin dengan pilihan anda?',
  text: "Setelah melakukan penolakan, proposal tidak akan ditampilkan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Tolak!'
}).then((result) => {
    console.log(result.isConfirmed)
  if (result.isConfirmed) {
    $('#'+item_id).submit();
    Swal.fire(
      'Ditolak!',
      'Proposal ditolak.',
      'success'
    )
  }
})
    }

</script> -->

@endsection
