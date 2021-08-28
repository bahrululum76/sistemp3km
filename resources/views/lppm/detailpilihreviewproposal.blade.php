@extends('layout.layoutlppm')

@section('container-fluid')
<div class="card shadow ">
      <div class="card-body">  
        <div class>
        <h3>Pilih Reviewer</h1>
        </div>  
        <br>
        @foreach ($proposal as $p)
        <form action="{{ url('lppm/pilih'.$p->id) }}" method="post">
        @csrf
        <div class="form-group">
              <label for="exampleInputPassword1">judul</label>
              <input type="text" class="form-control" id="exampleInputPassword1"  value="{{$p->judul}}" required="requaired" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pengaju</label> 
              <input type="text" class="form-control" id="exampleInputPassword1"value="{{$p->user->name}}" required="requaired" readonly>
            </div>
           
            <div class="form-group">
              <label for="exampleInputEmail1">Prodi</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="prodi" value="{{$p->user->prodi}}" placeholder="" required="requaired" readonly>
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jabatan</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="jabatan" value="{{$p->user->jabatan}}" required="requaired" readonly>
            </div>
            <div class="form-group">
                    <label for="exampleFormControlTextarea1">Abstrak</label>
                    <textarea class="ckeditor" id="ckeditor" name="abstrak" value="{{$p->abstrak}}" required="required" readonly>{{$p->abstrak}}</textarea>
                  </div>
            <div class="form-group">
              <label for="exampleInputText">File</label>
              <br>
              <a href="{{Storage::url('public/proposal/'.$p->file)}}">{{$p->file}}</a>
            
              <!-- <input type="text" class="form-control" id="exampleInputPassword1" name="file" value="{{$p->file}}" required="requaired"> -->
            </div>
            <div class="form-group">
                    <label >Pengajuan dana</label>
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                     <thead class="thead">
                        <th>Pelaksanaan</th>
                        <th>Bahan</th>
                        <th>Transport</th>
                        <th>Sewa</th>
                        <th>Total</th>
                      </thead>
                      @foreach($dana as $p)
                      <tbody>
                        <td>@currency($p->pelaksanaan)</td>
                        <td>@currency($p->bahan)</td>
                        <td>@currency($p->Transport)</td>
                        <td>@currency($p->sewa)</td>
                        <td>@currency($p->total)</td>
                      </tbody>
                      @endforeach
                    </table>
                        
                       
            </div>

            <div class="form-group">
                    <label >Reviewer</label>
                    
                        <select class="custom-select" name="reviewer_id"  value="{{$p->name}}" requaired>
                            <option Value="">Pilih Reviewer</option>
                            
                             
                            
                            @foreach($user as $user)

                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach 
                            
                        </select>
                        
            </div>

            
            <button type="submit" class="btn btn-primary btn-sm">Pilih Reviewer</button>

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#TolakProposal" >Tolak</button> 

          </form>
          @endforeach
        </div>
</div>


@endsection

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
                    <label >Detail Revisi</label>
                    <textarea name="detail_revisi" class="ckeditor" id="ckeditor" required="required" ></textarea>
                        
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

<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

