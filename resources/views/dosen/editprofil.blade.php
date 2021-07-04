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
    
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
          @endforeach
      </div>

</div>


@endsection