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
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control"  name="pelaksanaan"  aria-label="Amount (to the nearest dollar)" min="0" max="1050000" required>
              <div class="input-group-append">
                
              </div>
            </div>
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1">Bahan Habis Pakai</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control"  name="bahan"  aria-label="Amount (to the nearest dollar)"  min="0" max="1000000" required>
              <div class="input-group-append">
                
              </div>
            </div>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Transport</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control"  name="Transport"  aria-label="Amount (to the nearest dollar)" min="0" max="1050000" required>
              <div class="input-group-append">
                
              </div>
            </div>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Sewa</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control"  name="sewa"  aria-label="Amount (to the nearest dollar)" min="0" max="1050000" required>
              <div class="input-group-append">
                
              </div>
            </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
</div>


@endsection