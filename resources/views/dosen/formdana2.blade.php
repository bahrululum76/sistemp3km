@extends('layout.layoutdosen')

@section('container-fluid')
<div class="card shadow ">
      <div class="card-body">  
        <div class>
        <h3>Pengajuan Dana</h1>
        </div>  
        <br>
        @foreach ($proposal as $p)
        <form action="{{route('formdanapengabdian/store')}}" method="post">
        
        @csrf
        <div class="form-group" >
              <label for="exampleInputPassword1">Id</label> 
              <input type="text" class="form-control" id="exampleInputPassword1"value="{{$p->id}}" name="id" required="requaired" readonly>
            </div>
        <div class="form-group">
              <label for="exampleInputPassword1">judul</label>
              <input type="text" class="form-control" id="exampleInputPassword1" value="{{$p->judul}}" required="requaired" readonly>
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
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pelaksanaan" placeholder="" required="requaired">
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Bahan Habis Pakai</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="bahan" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Transport</label>
              <input type="text"  class="form-control" id="exampleInputPassword1" name="Transport" required="requaired">
            </div>
            <div class="form-group">
              <label for="exampleInputText">Sewa Peralatan</label>
              <input type="text"  class="form-control" id="exampleInputPassword1" name="sewa" required="requaired">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
</div>
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>

@endsection