@extends('layout.layoutdosen')

@section('container-fluid')



<div class="container-fluid">
<main role="main">
          
 

<div class="card shadow">
      <div class="card-body">

        <div>
          <h2>Informasi</h2>
        </div>

        @foreach($informasi as $p)
        <div class="list-group" >
          <ul class="list-group-item list-group-item-action" aria-current="true">							
            
            <li class="media">
            <a href="#" class="list-group-item list-group"> 
            <div class="">
                    <h3 class="media-heading"><a href=""></a></h4>
                  </div>
              <div class="media-left ml-10" style="margin:10px 10px;">
                <div class="media-object" style="margin:0px; padding:10px; width:100px;">
                
                  <span> <?php
                            $str = $p->created_at;
                              (explode(" ",$str)[0]);
                              $date = $str;
                              echo date( 'jS ', strtotime($date)); //June, 2017
                                  

                          ?>
                            
                    </span>
                    <span>
                      @php
                       $date = $str;
                            echo date( ' F, Y', strtotime($date)); //June, 2017
                            
                      @endphp
                    </span>
                    
                </div>
                  
              </div>
              <div class="body">
                <h3 class="heading"><a href="">{{$p->judul}}</a></h4>
                <p>
                <!-- @php
                $ket = $p->keterangan;
                echo(explode(" ",$ket)[0]);
                @endphp -->
               
               {!!$p->keterangan!!}
                </p>
              </div>
              </a>
            </li>
          
          </ul>
        </div>

        



        @endforeach


      </div>

    </div>



</div>

<div class="row" style="margin:auto;">
@foreach ($informasi as $p)

  <div class="col-md-4 ">
          <div class="card  card-columns-fluid mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"  role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="background-image: url({{asset('assets/img/bg2.jpg')}}); background-repeat: repeat-y;"></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
               </div>
                
              </div>
            </div>
          </div>
  </div> 


        @endforeach
</div>
      
@endsection
