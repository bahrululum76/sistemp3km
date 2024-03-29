@extends('layout.layoutdosen')

@section('container-fluid')



<div class="container-fluid">

          
 

<div class="card shadow">
      <div class="card-body">

       

    <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h2 class="page-title"> Informasi </h2> 
            </div>
                
        </div>

      <div class="panel-group accordion" id="accordion">

      @foreach($informasi as $p)
	    <div class="panel panel-primary">
      <div class="panel-heading">
                     <h3 class="panel-title">
                                <span class="pull-right text-muted disabled" style="margin-right: 10px">
                                        <i class="fa fa-chevron-circle-down"></i>
                                        <i> <?php
                                            $str = $p->created_at;
                                              (explode(" ",$str)[0]);
                                              $date = $str;
                                              echo date( 'jS ', strtotime($date)); //June, 2017                                                
                                              $date = $str;
                                              echo date( ' F, Y', strtotime($date)); //June, 2017
                                              ?>  </i>
                      
                                 </span>
                          <a href="{{url('dosen/informasi'.$p->id)}}">
                            <i class="fa fa-file-text-o text-muted"></i> {{$p->judul}} </a>
                     </h3>
      </div>
      </div>
        @endforeach     
            </div>
 </div>
        

      </div>

    </div>



</div>

<div class="row" style="margin:auto;">
@foreach ($kegiatan as $p)

  <div class="col-md-4 ">
  <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" > </svg> -->
          <div class="card  card-columns-fluid mb-4 shadow-sm">
            <img src="{{ asset('storage/kegiatan/'.$p->foto) }}" repeat style="width:300 px; height:300px; ">

            <div class="card-body">
              <p class="card-text" style="">
                <h4>{!!$p->nama!!}</h4>
               <!-- @php
              $detail= strip_tags($p->detail);
              @endphp  
              {{ Str::limit($detail, 100, '') }}
              @if (strlen($detail) > 100)
                <span id="dots">...</span>
                <span id="more">{{ substr($detail, 100) }}</span>
            @endif -->
              <!-- @php
              $detail= strip_tags($p->detail);
              @endphp   -->
              <!-- {{ Str::limit($detail,50 ) }}  -->
                
              <!-- {{$detail}} -->
              </p>
              <!-- <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <button class="btn btn-sm btn-outline-secondary" onclick="myFunction()" id="myBtn">Read more</button>
                
               </div> -->
                
              <!-- </div> -->
            </div>
          </div>
  </div> 


        @endforeach
</div>
   
<script>
  function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
</script>
@endsection
