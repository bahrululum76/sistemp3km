@extends('layout.layoutdosen')

{{-- <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
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
                                    <p>
                                        <i class="fa fa-file-text-o text-muted"></i> {{$p->judul}} </p>
                                </h3>

                                <h4>
                                    <p>{!!$p->keterangan!!} </p>
                                </h4>
                                <h5>
                                    <a href="{{Storage::url('public/informasi/'.$p->file)}}"">
                                    <p>Download File...</p></a>
                                </h5>
                            </div>
                        </div>
                    @endforeach     
            </div>
         </div>       
      </div>
    </div>
</div>
</div>


@endsection


