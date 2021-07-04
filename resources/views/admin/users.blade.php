@extends('layout.layoutadmin')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
@section('container-fluid')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">PENGGUNA</h1>
</div>


<div class="card shadow ">
    <div class="card-body">
        <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#ModalTambah"  >Tambah</button>
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>Nidn</th>
                    <th>Name</th>
                    <th>Prodi</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="tbody">
                @foreach ( $user as $p )
                <tr class="thead">
                    <td>{{ $p->nidn}}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{$p->prodi}}</td>
                    <td>{{$p->jabatan}}</td>
					<td>{{ $p->email }}</td>
                    <td>{{ $p->alamat}}</td>
                    <td>{{ $p->no_hp}}</td>
                    <td>@if ($p->roles_id == 1)
                        {{'admin'}}
                    @elseif ($p->roles_id == 2)
                        {{ 'lppm' }}
                    @elseif ($p->roles_id == 3)
                        {{ 'dosen' }}

                    @elseif ($p->roles_id == 4)
                        {{ 'reviewer' }}
                    @endif
                    </td>

                    <td >
                        <button   class="btn btn-primary btn-sm " data-toggle="modal" data-target="#EditModal-{{ $p->id }}" value="">Ubah</button>
                        {{-- <a  href="kelolaobat/delete/{{ $p->id }}" class="btn btn-danger btn-sm" >Hapus</a> --}}
                        <button class="btn btn-sm btn-warning " id="createNewItem" data-toggle="modal" data-target="#EditModalPassword-{{ $p->id }}"  >Ganti Password</button>
                        <form id="delete-obat-{{$p->id}}" action=" {{ url('admin/users/delete'.$p->id) }}" method="post" style="display: inline" data-id="{{$p->id}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ route('users/store') }}" method="post">
                  @csrf

                  <div class="form-group">
                    <label >Nidn</label>
                        <input type="number" class="form-control" name="nidn" required="required" >
                  </div>

                  <div class="form-group">
                    <label >Name</label>
                        <input type="text" class="form-control" name="name" required="required" >

                  </div>

                <label >Prodi</label>
                    <input type="text" class="form-control" name="prodi"  required="required" >
                </div>

                <div class="form-group">
                <label >Jabatan</label>
                    <input type="text" class="form-control" name="jabatan"  required="required" >
                </div>

                  <div class="form-group">
                    <label >Email</label>
                        <input type="text" class="form-control" name="email" required="required" >
                 </div>

                 <!-- <div class="form-group">
                    <label >Password</label>
                        <input type="password" class="form-control form-control-user" name="password" required="required" >
                 </div> -->

                 <div class="form-group">
                    <label >Alamat</label>
                        <input type="text" class="form-control form-control-user" name="alamat" required="required" >
                 </div>
                 <div class="form-group">
                    <label >No Hp</label>
                        <input type="text" class="form-control form-control-user" name="no_hp" required="required" >
                 </div>



                 <div class="form-group">
                    <label >Hak Akses</label>
                    <select class="custom-select" name="roles_id" id='roles_id' required>
                        <option selected>Hak akses</option>
                        <!-- <option value="1">admin</option> -->
                        <option value="2">lppm</option>
                        <option value="3">dosen</option>
                        <option value="4">reviewer</option>
                    </select>
                 </div>


                  <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
@foreach ($user as $p)
<div id="EditModal-{{ $p->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url('admin/users/edit'.$p->id) }}" method="POST">
                  @csrf

                <div class="form-group" hidden>
                    <label >Id</label>
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                </div>

                <div class="form-group">
                    <label >Nidn</label>
                        <input type="text" class="form-control" name="nidn" value="{{$p->nidn}}" required="required">
                </div>

                  <div class="form-group">
                    <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{$p->name}}" required="required">
                </div>
            
                <div class="form-group">
                <label >Prodi</label>
                    <input type="text" class="form-control" name="prodi" value="{{$p->prodi}}" required="required" >
                </div>

                <div class="form-group">
                <label >Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="{{$p->jabatan}}" required="required" >
                </div>

            <div class="form-group">
              <label >Email</label>
                  <input type="text" class="form-control" name="email" value="{{$p->email}}" required="required" >
           </div>

           <!-- <div class="form-group" hidden>
            <label >Password</label>
                <input type="text" class="form-control" name="password" value="{{$p->password}}" required="required" >
         </div> -->


           <div class="form-group">
            <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$p->alamat}}" required="required" >
            </div>

            <div class="form-group">
                <label >Np Hp</label>
                    <input type="number" class="form-control" name="no_hp" value="{{$p->no_hp}}" required="required" >
             </div>



           <div class="form-group">
                <label >Hak Akses</label>
                    <select class="custom-select" name="roles_id" id='roles_id' value="{{$p->roles_id}}">
                        <option value="{{$p->roles_id}}">@if ($p->roles_id == 1)
                            {{'admin'}}
                        @elseif ($p->roles_id == 2)
                            {{ 'lppm' }}
                        @elseif ($p->roles_id == 3)
                            {{ 'dosen' }}

                        @elseif ($p->roles_id == 4)
                            {{ 'reviewer' }}


                        @endif</option>
                        <!-- <option value="1" >admin</option> -->
                        <option value="2" >lppm</option>
                        <option value="3" >dosen</option>
                        <option value="4" >reviewer</option>
                    </select>
            </div>


           <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        </div>

            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- edit modal Password -->
@foreach ($user as $p)
<div id="EditModalPassword-{{ $p->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{ url('admin/users/edit'.$p->id) }}" method="POST">
                  @csrf

                <div class="form-group" hidden>
                    <label >Id</label>
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                </div>

                <div class="form-group" hidden >
                    <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{$p->name}}" required="required">
                </div>

                <div class="form-group" hidden >
                    <label >Email</label>
                        <input type="text" class="form-control" name="email" value="{{$p->email}}" required="required" >
                 </div>


                <div class="form-group">
                    <label >Password</label>
                        <input type="password" class="form-control form-control-user" name="password" required="required" placeholder="password" >
                 </div>

                 <div class="form-group" hidden>
                    <label >Hak Akses</label>
                        <select class="custom-select" name="role" id='role_' value="{{$p->role}}">
                            <option value="{{$p->role}}" >{{$p->role}}</option>
                            <option value="admin" >admin</option>
                            <option value="admin" >dokter</option>
                        </select>
                </div>

           <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        </div>

            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
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
  type: 'warning',
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

@endsection
