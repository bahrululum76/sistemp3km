@extends('layout.layoutlppm')

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
                                <i class="material-icons">books</i>
                              </div>
                              <p class="card-category">Proposal Penelitian & Pengabdian</p>
                              <h3 class="card-title"><?php echo $proposal1->count() ?>
                                <small></small>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <!-- <i class="material-icons text-danger">warning</i>
                                <a href="javascript:;">Get More Space...</a> -->
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
                              <p class="card-category">Laporan Kemajuan</p>
                              <h3 class="card-title"><?php echo $kemajuan->count() ?></h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <!-- <i class="material-icons">date_range</i> Last 24 Hours -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">library_books</i>
                              </div>
                              <p class="card-category">Laporan Akhir Penelitian</p>
                              <h3 class="card-title"><?php echo $penelitian->count() ?></h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <!-- <i class="material-icons">local_offer</i> Tracked from Github -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                              <i class="material-icons">library_books</i>
                              </div>
                              <p class="card-category">Laporan Akhir Pengabdian</p>
                              <h3 class="card-title"><?php echo $pengabdian->count() ?></h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <!-- <i class="material-icons">update</i> Just Updated -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->
@endsection
