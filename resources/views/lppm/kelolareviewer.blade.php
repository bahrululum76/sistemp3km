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
       
        <button class="btn btn-sm btn-primary mt-4 mb-2" id="createNewItem" data-toggle="modal" data-target="#TambahModal"  >Tambah</button>
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead class="thead">
                <tr class="tbody">
                    <th>NIDN</th>
                    <th>NAMA</th>
                    <th>PRODI</th>
                    <th>JABATAN FUNGSIONAL</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th>NO HP</th>
                    <th>HAK AKSES</th>
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
                    
                        
                        

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>


      </div>
    </div>
</div>


<div id="TambahModal" class="modal fade" role="dialog">
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
            <form action="{{ url('lppm/kelolareviewer/rev') }}" method="POST">
                  @csrf



                <div class="form-group">
                <label >Nama</label>
                    <select class="custom-select" name="id" id='id' value="{{$p->id}}">
                    <option value="">Pilih Dosen</option>    
                    @foreach($user1 as $p)
                    <option value="{{$p->id}}">{{$p->name}}
                     </option>
                     @endforeach
                       
                    </select>
            </div>

               
           <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        </div>

            <!-- footer modal -->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->
            </div>
        </div>
    </div>
</div>


<!-- edit modal -->

@foreach ($user1 as $p)
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
            <form action="{{ url('lppm/kelolareviewer/edit'.$p->id) }}" method="POST">
                  @csrf

                <div class="form-group" hidden>
                    <label >Id</label>
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                </div>

                <div class="form-group" hidden>
                    <label >Nidn</label>
                        <input type="text" class="form-control" name="nidn" value="{{$p->nidn}}" required="required">
                </div>

                  <div class="form-group"hidden>
                    <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{$p->name}}" required="required">
                </div>

                <div class="form-group" hidden>
                    <label >Prodi</label>
                    <select class="custom-select" name="prodi"  required="required">
                        <option value="{{$p->prodi}}">{{$p->prodi}}</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Industri">Industri</option>
                        <option value="Sipil">Sipil</option>
                    </select>
                 </div>
                 <div class="form-group" hidden>
                    <label >Prodi</label>
                    <select class="custom-select" name="prodi"  required="required">
                        <option value="{{$p->jabatan}}">{{$p->jabatan}}</option>
                       
                    </select>
                 </div>

            <div class="form-group" hidden>
              <label >Email</label>
                  <input type="text" class="form-control" name="email" value="{{$p->email}}" required="required" >
           </div>

            <div class="form-group" hidden>
            <label >Password</label>
                <input type="text" class="form-control" name="password" value="{{$p->password}}" required="required" >
         </div> 


           <div class="form-group"hidden>
            <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$p->alamat}}" required="required" >
            </div>
            <div class="form-group" hidden>
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
                        <option value="3" >dosen</option>
                        <option value="4" >reviewer</option>
                    </select>
            </div>
           <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        </div>

            <!-- footer modal -->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->
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
            <form action="{{ url('lppm/kelolaadmin/edit'.$p->id) }}" method="POST">
                  @csrf

                <div class="form-group" hidden>
                    <label >Id</label>
                        <input type="text" class="form-control" name="id" value="{{$p->id}}" required="required" >
                </div>
                <div class="form-group" hidden>
                    <label >Nidn</label>
                        <input type="text" class="form-control" name="nidn" value="{{$p->nidn}}" required="required">
                </div>

                <div class="form-group" hidden>
                    <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{$p->name}}" required="required">
                </div>



 

                <div class="form-group" hidden>
                    <label >Jabatan</label>
                    <select class="custom-select" name="jabatan" id='jabatan' required>
                        <option Value="{{$p->jabatan}}">{{$p->jabatan}}</option>
                        <!-- <option value="1">admin</option> -->
                        <option value="Asisten Ahli">Asistem Ahli</option>
                        <option value="Lektor">Lektor</option>
                        <option value="Loktor Kepala">Loktor Kepala</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                 </div>

                <div class="form-group" hidden >
                    <label >Email</label>
                        <input type="text" class="form-control" name="email" value="{{$p->email}}" required="required" >
                 </div>


                <div class="form-group" >
                    <label >Password</label>
                        <input type="password" class="form-control form-control-user" name="password"  required="required" placeholder="password" >
                 </div>

                 <div class="form-group" hidden>
            <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{$p->alamat}}" required="required" >
            </div>

            <div class="form-group" hidden>
                <label >Np Hp</label>
                    <input type="number" class="form-control" name="no_hp" value="{{$p->no_hp}}" required="required" >
             </div>

    
            <div class="form-group" hidden>
                <label >Hak Akses</label>
                    <input type="number" class="form-control" name="roles_id" value="{{$p->roles_id}}" required="required" >
             </div>


           <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        </div>

            <!-- footer modal -->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button> -->
            </div>
        </div>
    </div>
</div>
@endforeach




<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(item_id){
Swal.fire({
  title: 'data akan di hapus!',
  text: "data yang diapus tidak dapat dikembalkan",
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



@endsection
