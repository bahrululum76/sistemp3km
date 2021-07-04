@extends('layout.layoutdosen')

@section('container-fluid')
<div class="card shadow ">
      <div class="card-body">  
        <div class>
        <h3>Pengajuan Dana</h1>
        </div>  
        <br>
        @foreach ($proposal as $p)
        <form action="{{route ('formdana/store')}}" method="POST">
        @csrf
        <div class="form-group" >
              <label for="exampleInputPassword1">Id</label> 
              <input type="text" class="form-control" id="exampleInputPassword1"value="{{$p->id}}" name="id" required="requaired" readonly>
            </div>

        <div class="form-group">
              <label for="exampleInputPassword1">judul</label>
              <input type="text" class="form-control" id="exampleInputPassword1"  value="{{$p->judul}}" required="requaired" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pengaju</label> 
              <input type="text" class="form-control" id="exampleInputPassword1"value="{{$p->user->name}}" required="requaired" readonly>
            </div>
        
        
        <br>
        <br>
        @endforeach
        
            
            <div class="form-group">
              <label for="exampleInputEmail1">Pelaksanaan</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pelaksanaan" placeholder="" required="requaired">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Bahan Habis Pakai</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="bahan" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Transport</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="Transport" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Sewa Peralatan</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="sewa" required="requaired">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
</div>


@endsection