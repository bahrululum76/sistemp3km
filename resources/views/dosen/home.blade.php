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
          <ul class="media-list events">							
            
            <li class="media">
            <a href="www.facebook.com">
              <div class="media-left" style="margin:10px 10px;">
                <div class="card bg-primary mt-4 " style="margin:0px; padding:10px; width:100px;">
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
                {{$p->keterangan}}
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

<div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
@endsection
