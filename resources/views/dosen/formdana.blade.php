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
              <input type="text"  onkeyup="convertToRupiah(this);"  class="form-control"  aria-describedby="emailHelp" name="pelaksanaan" placeholder="" required="requaired">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Bahan Habis Pakai</label>
              <input type="text"  class="form-control"  onkeyup="convertToRupiah(this);" name="bahan" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Transport</label>
              <input type="text"  class="form-control" onkeyup="convertToRupiah(this);" name="Transport" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Sewa Peralatan</label>
              <input type="number"  class="form-control"  onkeyup="convertToRupiah(this);" name="sewa" required="requaired">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
</div>
<script type="text/javascript">
		
		function convertToRupiah(objek) {
	  separator = ".";
	  a = objek.value;
	  b = a.replace(/[^\d]/g,"");
	  c = "";
	  panjang = b.length; 
	  j = 0; 
	  for (i = panjang; i > 0; i--) {
	    j = j + 1;
	    if (((j % 3) == 1) && (j != 1)) {
	      c = b.substr(i-1,1) + separator + c;
	    } else {
	      c = b.substr(i-1,1) + c;
	    }
	  }
	  objek.value = c;

	}       

	function convertToAngka()
	{	var nominal= document.getElementById("nominal").value;
		var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka").innerHTML= angka;
	}       

	function convertToAngka()
	{	var nominal1= document.getElementById("nominal1").value;
		var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka1").innerHTML= angka;
	}
	</script>

@endsection