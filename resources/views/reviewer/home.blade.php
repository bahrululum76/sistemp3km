@extends('layout.layoutreviewer')

@section('container-fluid')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                              </div>
                              <p class="card-category">Proposal penelitian</p>
                              <h3 class="card-title"><?php echo $proposal->count() ?>
                                
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons text-danger"></i>
                                <a href="javascript:;"></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">library_books</i>
                              </div>
                              <p class="card-category">Proposal Pengabdian</p>
                              <h3 class="card-title"><?php echo $proposal2->count() ?></h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons"></i> 
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->
@endsection
