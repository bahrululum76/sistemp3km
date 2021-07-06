@extends('layout.layoutadmin')

@section('container-fluid')
<div class="card shadow ">
      <div class="card-body">  
          <div class>
            <h3>Edit Profil</h1>
          </div>  
            <br> 
        
        @foreach ($user as $p)
        <form action="{{url ('dosen/editprofil/edit'.$p->id)}}" method="POST">
        @csrf
        <div class="form-group" hidden>
              <label for="exampleInputPassword1">Id</label> 
              <input type="text" class="form-control" id="exampleInputPassword1"value="{{$p->id}}" name="id" required="requaired" readonly>
            </div>

        <div class="form-group">
              <label for="exampleInputPassword1">Nidn</label>
              <input type="number" class="form-control" id="exampleInputPassword1"  value="{{$p->nidn}}" required="requaired" readonly>
        </div>
        <div class="form-group">
              <label for="exampleInputPassword1">Nama</label> 
              <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$p->name}}" required="requaired" >
        </div>
        
        <div class="form-group">
                <label >Prodi</label>
                    <select class="custom-select" name="prodi" id='roles_id' value="{{$p->prodi}}">
                        <option value="{{$p->prodi}}">{{$p->prodi}}</option>
                        <option value="informatika" >Informatika</option>
                        <option value="industri" >Industri</option>
                        <option value="sipil" >Sipil</option>
                    </select>
            </div>        
            

        <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" id="exampleInputPassword1" value="{{$p->email}}" name="email" required="requaired">
        </div>

        <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" class="form-control" id="exampleInputPassword1" value="{{$p->alamat}}" name="alamat" required="requaired">
        </div>
        <div class="form-group">
              <label for="exampleInputPassword1">No hp</label>
              <input type="number" class="form-control" id="exampleInputPassword1" value="{{$p->no_hp}}" name="no_hp" required="requaired">
        </div>
    
        <div class="col text-center">       
             <button type="submit" class="btn btn-primary btn-sm ">Simpan</button> </div>
            </form>
          @endforeach
          
          <button class="btn btn-sm btn-secondary " id="createNewItem" data-toggle="modal" data-target="#EditModalPassword-{{ $p->id }}"  >Ubah Password</button>
          
      </div>


<!-- <div class="card">
                    <form action="" method="post" id="">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Kata Sandi
                            Baru</label>
                        <div class="col-sm-7">
                            <input type="password" name="sandi_baru" class="form-control" required
                                placeholder="Kata Sandi Baru" id="pass" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Verifikasi
                            Sandi</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="confirm_sandi"
                                placeholder="Verifikasi Kata Sandi Baru" id="confirm" required maxlength="100">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary" id="btn_ubah_pw"><i class="fa fa-edit"></i>
                        Ubah</button>
                </div>

</div> -->

<!-- edit modal Password -->
@foreach ($user as $p)
<div id="EditModalPassword-{{$p->id }}" class="modal fade" role="dialog">
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
            <form action="{{ url('dosen/editprofil/ubahpw'.$p->id) }}" method="POST">
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
                    <label >Prodi</label>
                    <select class="custom-select" name="prodi" id='prodi' required>
                        <option value="{{$p->prodi}}">{{$p->prodi}}</option>
                        <!-- <option value="1">admin</option> -->
                        <option value="Informatika">Informatika</option>
                        <option value="Industri">Industri</option>
                        <option value="Sipil">Sipil</option>
                    </select>
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
                    <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$p->email}}" required="required">
                 </div>

                 

                 <div class="form-group row">
                        <label >Kata Sandi Baru</label>
                        
                            <input type="password" name="sandi_baru" class="form-control" required
                                 id="pass" maxlength="100">
                        
                    </div>
                    <div class="form-group row">
                        <label>Verifikasi Sandi</label>
                        
                            <input type="password" class="form-control" name="confirm_sandi"
                                id="confirm" required maxlength="100">
                        
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


             <button type="submit" class="btn btn-secondary" id="btn_ubah_pw"><i class="fa fa-edit"></i>
                        Ubah</button>
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


<script>
$('#pass, #confirm').on('keyup', function() {
    if (($('#pass').val() == '') && ($('#confirm').val() == '')) {
        $('#confirm').removeClass('is-invalid');
        $('#confirm').removeClass('is-valid');
        $('#btn_ubah_pw').removeClass('btn-success');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
        console.log("test");
    } else if ($('#pass').val() == $('#confirm').val()) {
        $('#confirm').addClass('is-valid');
        $('#confirm').removeClass('is-invalid');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
        $('#btn_ubah_pw').addClass('btn-success');
        console.log("test1");
    } else {
        $('#confirm').addClass('is-invalid');
        $('#btn_ubah_pw').addClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', true);
        console.log("test2");
    }
});

</script>

@endsection
