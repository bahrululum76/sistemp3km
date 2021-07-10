@extends('layout.layoutreviewer')

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
                    <!-- <th>Judul</th>
                    <th>File</th> -->
                    <th>Pengaju</th>
                    <!-- <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>  -->
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $proposal as $p )
                <tr class="thead">
                  
                    <td align="center"><a href="{{url('reviewer/reviewproposalpengabdian/'.$p->user_id)}}">
                    @foreach($user as $q)
                    
                    @if ($p->user_id == $q->id)
                        {{$q->name}}
                    @endif

                    @endforeach
                
                    </a> </td>
                   
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(item_id){
Swal.fire({
  title: 'Yakin dengan pilihan anda?',
  text: "Setelah melakukan penolakan, proposal tidak akan ditampilkan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Terima!'
}).then((result) => {
    console.log(result.isConfirmed)
  if (result.isConfirmed) {
    $('#'+item_id).submit();
    Swal.fire(
      'Diterima!',
      'Proposal diterima.',
      'success'
    )
  }
})
    }

</script>

@endsection
