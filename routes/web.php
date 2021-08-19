<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/formdana', function () {
    return view('dosen/formdana');
});

Auth::routes();




Route::middleware(['is_admin'])->prefix('/admin')->group(function () {
    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_home');

    //kegiatan
    Route::get('kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('kegiatan');
    Route::post('kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan/store');
    Route::post('kegiatan/edit{id}', [App\Http\Controllers\KegiatanController::class, 'edit'])->name('kegiatan/edit');
    Route::delete('kegiatan/delete{id}', [App\Http\Controllers\KegiatanController::class, 'delete'])->name('kegiatan/delete');
    

    //user
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users/store');
    Route::post('users/edit{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users/edit');
    Route::delete('users/delete{id}', [App\Http\Controllers\UserController::class, 'delete']);

    //informasi
    Route::get('kelolainformasi', [App\Http\Controllers\KelolaInformasiController::class, 'index'])->name('kelolainformasi');
    Route::post('kelolainformasi/store', [App\Http\Controllers\KelolaInformasiController::class, 'store'])->name('kelolainformasi/store');
    Route::post('kelolainformasi/edit{id}', [App\Http\Controllers\KelolaInformasiController::class, 'edit'])->name('kelolainformasi/edit');
    Route::delete('kelolainformasi/delete{id}', [App\Http\Controllers\KelolaInformasiController::class, 'delete']);


    Route::get('proposalpengabdian', [App\Http\Controllers\ProposalPengabdianController::class, 'index_adm'])->name('proposalpengabdian');
    

    //kelola penelitian dan pengabdian
    Route::get('kelolapenelitian', [App\Http\Controllers\PenelitianController::class, 'index_adm'])->name('kelolapenelitian');
    Route::post('kelolapenelitian/edit{id}', [App\Http\Controllers\PenelitianController::class, 'edit'])->name('kelolapenelitian/edit');
    Route::delete('kelolapenelitian/delete{id}', [App\Http\Controllers\PenelitianController::class, 'delete']);

    Route::get('kelolapengabdian', [App\Http\Controllers\PengabdianController::class, 'index_adm'])->name('kelolapengabdian');
    Route::post('kelolapengabdian/edit{id}', [App\Http\Controllers\PengabdianController::class, 'edit'])->name('kelolapengabdian/edit');
    Route::delete('kelolapengabdian/delete{id}', [App\Http\Controllers\PengabdianController::class, 'delete']);

    //editprofil
    Route::get('editprofil', [App\Http\Controllers\EditProfilController::class, 'index_admin'])->name('editprofil');
    Route::post('editprofil/edit{id}', [App\Http\Controllers\EditProfilController::class, 'edit1'])->name('editprofil/edit');


});

Route::middleware(['is_lppm'])->prefix('/lppm')->group(function () {
    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'HomeLppm'])->name('lppm_home');

    //pilih_review
    Route::get('/pilihprodi', function () {
        return view('lppm/pil_prodi_pen');
    });
    Route::get('pilih_review', [App\Http\Controllers\PilihReviewController::class, 'index'])->name('pilih_review');

    Route::post('pilih_review/tolak{id}', [App\Http\Controllers\PilihReviewController::class, 'tolak'])->name('pilih_review/tolak');
    Route::post('pilih{id}', [App\Http\Controllers\PilihReviewController::class, 'pilih'])->name('pilih');

    //proposal_penelitian
    Route::get('proposalpenelitian', function(){
        return view('lppm.proposalpenelitian');
    });

    Route::get('proposalpengabdian', function(){
        return view('lppm.proposalpengabdian');
    });

    //pilihreviewpengabdian
    Route::get('pilih_review_pengabdian', [App\Http\Controllers\PilihReviewPengabdianController::class, 'index'])->name('pilih_review_pengabdian');
    Route::post('pilih_review_pengabdian/tolak{id}', [App\Http\Controllers\PilihReviewPengabdianController::class, 'tolak'])->name('pilih_review/tolak');
    Route::post('pilih_review_pengabdian/pilih_{id}', [App\Http\Controllers\PilihReviewPengabdianController::class, 'pilih1'])->name('pilih_review_pengabdian/pilih_');


    //lapKemajuanPenlitian
    Route::get('laporankemajuanpenelitian', [App\Http\Controllers\LapKemajuanController::class, 'index_penelitian'])->name('laporankemajuanpenelitian');

    //lapKemajuanPengabdian
    Route::get('laporankemajuanpengabdian', [App\Http\Controllers\LapKemajuanController::class, 'index_pengabdian'])->name('laporankemajuanpengabdian');
    
    //lapakhirPenelitian
    Route::get('laporanakhirpenelitian', [App\Http\Controllers\PenelitianController::class, 'index_lap'])->name('laporanakhirpenelitian');
    Route::get('get{filename}', [App\Http\Controllers\PenelitianController::class, 'getfile'])->name('getfile');
     //lapakhirPengabdian
     Route::get('laporanakhirpengabdian', [App\Http\Controllers\PengabdianController::class, 'index_lap'])->name('laporanakhirpengabdian');
    
    Route::get('detailpilihreview/{id}', [App\Http\Controllers\PilihReviewController::class, 'detailpilihreview'])->name('detailpilihreview');
    Route::get('detailpilihreview_/{id}', [App\Http\Controllers\PilihReviewPengabdianController::class, 'detailpilihreview_'])->name('detailpilihreview_');
    
     
    Route::get('kelolaadmin', [App\Http\Controllers\UserController::class, 'index_adm'])->name('kelolaadmin');
    Route::post('kelolaadmin/store', [App\Http\Controllers\UserController::class, 'store2'])->name('kelolaadmin/store');
    Route::post('kelolaadmin/edit{id}', [App\Http\Controllers\UserController::class, 'edit2'])->name('kelolaadmin/edit');
    Route::delete('kelolaadmin/delete{id}', [App\Http\Controllers\UserController::class, 'delete2']);
  
    Route::get('kelolareviewer', [App\Http\Controllers\UserController::class, 'index_rev'])->name('kelolareviewer');
    Route::post('kelolareviewer/edit{id}', [App\Http\Controllers\UserController::class, 'edit3'])->name('kelolareviewer/edit');
    Route::post('kelolareviewer/rev', [App\Http\Controllers\UserController::class, 'rev'])->name('kelolareviewer/rev');

    Route::get('dana', [App\Http\Controllers\DanaController::class, 'index1'])->name('dana');
    Route::get('dana_', [App\Http\Controllers\DanaController::class, 'index2'])->name('dana_');
    
});

Route::middleware(['is_dosen'])->prefix('/dosen')->group(function () {
    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'HomeDosen'])->name('dosen_home');

    //proposal_penelitian
    Route::get('proposal', [App\Http\Controllers\ProposalController::class, 'index'])->name('proposal');
    Route::post('proposal/store', [App\Http\Controllers\ProposalController::class, 'store'])->name('proposal/store');
    Route::post('proposal/ajukan/{id}', [App\Http\Controllers\ProposalController::class, 'ajukan'])->name('proposal/ajukan'); 
    Route::post('proposal/revisi/{id}', [App\Http\Controllers\ProposalController::class, 'revisi'])->name('proposal/revisi');
    
    //proposal_pengabdian
    Route::get('proposal_pengabdian', [App\Http\Controllers\ProposalPengabdianController::class, 'index'])->name('proposal_pengabdian');
    // Route::post('proposal_pengabdian/store', [App\Http\Controllers\ProposalPengabdianController::class, 'store1'])->name('proposal_pengabdian/store');
    Route::post('proposal_pengabdian/store', [App\Http\Controllers\ProposalPengabdianController::class, 'store'])->name('proposal_pengabdian/store');
    Route::post('proposal_pengabdian/store2', [App\Http\Controllers\ProposalPengabdianController::class, 'store2'])->name('proposal_pengabdian/store2');

    // kemajuanpeneitian
    Route::get('unggahkemajuanpenelitian', [App\Http\Controllers\UnggahKemajuanPenelitianController::class, 'index'])->name('unggahkemajuanpenelitian');
    Route::post('unggahkemajuanpenelitian/store', [App\Http\Controllers\UnggahKemajuanPenelitianController::class, 'store'])->name('unggahkemajuanpenelitian/store');

    // kemajuanpengabdian
    Route::get('unggahkemajuanpengabdian', [App\Http\Controllers\UnggahKemajuanPengabdianController::class, 'index'])->name('unggahkemajuanpengabdian');
    Route::post('store', [App\Http\Controllers\UnggahKemajuanPengabdianController::class, 'store'])->name('unggahkemajuanpengabdian/store');

    //unggahlapakhirpenelitian
    Route::get('penelitian', [App\Http\Controllers\PenelitianController::class, 'index'])->name('penelitian');
    Route::post('penelitian/store', [App\Http\Controllers\PenelitianController::class, 'store'])->name('penelitian/store');
    
        //unggahlapakhirpenelitian
    Route::get('penelitian', [App\Http\Controllers\PenelitianController::class, 'index'])->name('penelitian');
    Route::post('penelitian/store', [App\Http\Controllers\PenelitianController::class, 'store'])->name('penelitian/store');
    
    //unggahlapakhirpenelitian
    Route::get('pengabdian', [App\Http\Controllers\PengabdianController::class, 'index'])->name('pengabdian');
    Route::post('pengabdian/store', [App\Http\Controllers\PengabdianController::class, 'store'])->name('pengabdian/store');
    

    Route::get('/formdana', [App\Http\Controllers\ProposalController::class, 'dana_index'])->name('formdana');
    Route::post('formdana/store', [App\Http\Controllers\ProposalController::class, 'dana_store'])->name('formdana/store');
    
    Route::get('/formdanapengabdian', [App\Http\Controllers\ProposalPengabdianController::class, 'dana_index'])->name('formdanapengabdian');
    Route::post('formdanapengabdian/store', [App\Http\Controllers\ProposalPengabdianController::class, 'dana_store'])->name('formdanapengabdian/store');
    
    
    //unduhpenelitian
    Route::get('informasi{id}', [App\Http\Controllers\InformasiController::class, 'index'])->name('informasi');
    
    Route::get('editprofil', [App\Http\Controllers\EditProfilController::class, 'index_dosen'])->name('editprofil');
    Route::post('editprofil/edit{id}', [App\Http\Controllers\EditProfilController::class, 'edit2'])->name('editprofil/edit');

    // ubahpassword
    // Route::post('editprofil/password{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editprofil/password');


});

Route::middleware(['is_reviewer'])->prefix('/reviewer')->group(function () {
    Route::get('/Home', [App\Http\Controllers\HomeController::class, 'HomeReviewer'])->name('reviewer_home');
    Route::get('verifikasi_proposal', [App\Http\Controllers\VerifikasiController::class, 'index'])->name('verifikasi_proposal');
    Route::post('verifikasi_proposal/terima{id}', [App\Http\Controllers\VerifikasiController::class, 'terima'])->name('verifikasi_proposal/terima');
    Route::post('verifikasi_proposal/revisi', [App\Http\Controllers\VerifikasiController::class, 'revisi'])->name('verifikasi_proposal/revisi');
    

    //verifikasi proposal pengabdian
    Route::get('verifikasi_proposal_pengabdian', [App\Http\Controllers\VerifikasiProposalPengabdianController::class, 'index'])->name('verifikasi_proposal_pengabdian');
    Route::post('verifikasi_proposal_pengabdian/terima{id}', [App\Http\Controllers\VerifikasiProposalPengabdianController::class, 'terima'])->name('verifikasi_proposal_pengabdian/terima');
    Route::post('verifikasi_proposal_pengabdian/revisi{id}', [App\Http\Controllers\VerifikasiProposalPengabdianController::class, 'revisi'])->name('verifikasi_proposal_pengabdian/revisi');
    
    //detailreview
    Route::get('reviewproposal/{id}', [App\Http\Controllers\VerifikasiController::class, 'detail'])->name('reviewproposal');
    Route::get('reviewproposalpengabdian/{id}', [App\Http\Controllers\VerifikasiProposalPengabdianController::class, 'detail'])->name('reviewproposalpengabdian');
    
});

Route::get('/exp', [App\Http\Controllers\HomeController::class, 'getexp']);
