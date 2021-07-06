$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

function menu_koor(menu) {
    if (menu == 'menu_beranda') {
        $('#menu_beranda').addClass('active');
    } else if (menu == 'menu_pengajuan_prop') {
        $('#menu_pengajuan_prop').addClass('active');
    } else if (menu == 'menu_profile') {
        $('#menu_profile').addClass('active');
    } else if (menu == 'menu_status_dosen') {
        $('#menu_status_dosen').addClass('active');
    } else if (menu == 'menu_ubah_judul') {
        $('#menu_ubah_judul').addClass('active');
    } else if (menu == 'menu_jadwal') {
        $('#menu_jadwal').addClass('active');
    } else if (menu == 'menu_rekomendasi_judul') {
        $('#menu_rekomendasi').addClass('active');
    }
};

function menu_dosen(menu) {
    if (menu == 'menu_beranda') {
        $('#menu_beranda').addClass('active');
    } else if (menu == 'menu_profile') {
        $('#menu_profile').addClass('active');
    } else if (menu == 'menu_bimbingan') {
        $('#menu_bimbingan').addClass('active');
    } else if (menu == 'menu_rek_judul') {
        $('#menu_rek_judul').addClass('active');
    } else if (menu == 'menu_jadwal_menguji') {
        $('#menu_jadwal_menguji').addClass('active');
    }
};

function menu_staff(menu) {
    if (menu == 'menu_beranda') {
        $('#menu_beranda').addClass('active');
    } else if (menu == 'menu_kelola_mhs') {
        $('#menu_mhs').addClass('active');
    } else if (menu == 'menu_profile') {
        $('#menu_profile').addClass('active');
    } else if (menu == 'menu_kelola_dosen') {
        $('#menu_dosen').addClass('active');
    } else if (menu == 'menu_daftar_sidang') {
        $('#menu_daftar_sidang').addClass('active');
    }
};

function menu_mahasiswa(menu) {
    if (menu == 'menu_beranda') {
        $('#menu_beranda').addClass('active');
    } else if (menu == 'menu_profile') {
        $('#menu_profile').addClass('active');
    } else if (menu == 'menu_pengajuan_prop') {
        $('#menu_pengajuan_prop').addClass('active');
    } else if (menu == 'menu_dosen_pem') {
        $('#menu_dosen_pem').addClass('active');
    } else if (menu == 'menu_rek_judul') {
        $('#menu_rek_judul').addClass('active');
    } else if (menu == 'menu_bimbingan') {
        $('#menu_dosen_pem').addClass('active');
    } else if (menu == 'menu_info_judul') {
        $('#menu_rek_judul').addClass('active');
    }
};

function pengajuan_prop(prop) {
    if (prop == 'true') {
        var message = "Proposal Berhasil di Unggah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (prop == 'false') {
        var message = "Terjadi kesalahan saat mengunggah Proposal";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function buat_jadwal(buat_jadwal) {
    if (buat_jadwal == 'true') {
        var message = "Jadwal Mahasiswa berhasil dibuat";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (buat_jadwal == 'false') {
        var buat_jadwal = "Terjadi kesalahan saat membuat jadwal";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function status_sidang(sidang) {
    if (sidang == 'true') {
        $('#menu_pengajuan_prop').remove();
        $('#menu_rek_judul').remove();
        $("#bimbingan").remove();
    };
};

function status_bimbingan(bimbingan, location) {
    if (bimbingan == 'true') {
        $("#bimbingan").attr("href", location);
        $('#menu_dosen_pem').removeAttr("hidden");
        $("#text_bimbingan").text("Bimbingan");
        $('#menu_pengajuan_prop').remove();
        $('#menu_rek_judul').remove();
    };
};

function status_recjudul(rec_judul, location1) {
    if (rec_judul == 'true') {
        $("#info_judul").attr("href", location1);
        $("#text_info_judul").text("Info Judul");
    };
};

function status_proposal(status_prop) {
    if (status_prop == 'true') {
        $('#ajukan_prop').prop('disabled', true);
        $('#menu_rek_judul').attr("hidden", true);
    } else if (status_prop == 'true_terima') {
        $('#menu_dosen_pem').removeAttr("hidden");
        $('#menu_pengajuan_prop').attr("hidden", true);
        $('#menu_rek_judul').attr("hidden", true);
    } else if (status_prop == 'false') {
        $('#ajukan_prop').prop('disabled', false);
        $('#menu_rek_judul').removeAttr("hidden", false);
    }
};

function notif_bimbingan_dosen(bimbingan_dosen) {
    if (bimbingan_dosen == 'true') {
        var message = "Sesi bimbingan telah dilakukan";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (bimbingan_dosen == 'false') {
        var message = "Terjadi kesalahan saat upload data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (bimbingan_dosen == 'finish') {
        var message = "Bimbingan mahasiswa telah selesai";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (bimbingan_dosen == 'not_finish') {
        var message = "Mahasiswa tersebut belum memenuhi syarat untuk seminar";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function bimbingan_mhs(bimbingan_mhs) {
    if (bimbingan_mhs == 'true') {
        var message = "Bimbingan selesai dilaksanakan";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (bimbingan_mhs == 'false') {
        var message = "Terjadi kesalahan saat mengunggah file";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_rek_judul(status) {
    if (status == 'tambah') {
        var message = "Rekomendasi judul berhasil ditambahkan";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'ubah') {
        var message = "Rekomendasi judul berhasil diubah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'hapus') {
        var message = "Rekomendasi judul berhasil dihapus";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'tambah_gagal') {
        var message = "Terjadi kesalahan saat menambah data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (status == 'ubah_gagal') {
        var message = "Terjadi kesalahan saat mengubah data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (status == 'hapus_gagal') {
        var message = "Terjadi kesalahan saat menghapus data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (status == 'tambah_gagal_penuh') {
        var message = "Anda sudah mencapai batas rekomendasi";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    }
};

function login_null(error) {
    message = error;
    nowuiDashboard.showNotification('top', 'right', message, 'danger');
};

$('.save').hover(function() {
    $(this).append("<i class='save-icon now-ui-icons ui-1_check'></i>");
}, function() {
    $('.save-icon').remove();
});

$('.cancel').hover(function() {
    $(this).append("<i class='cancel-icon now-ui-icons ui-1_simple-remove'></i>");
}, function() {
    $('.cancel-icon').remove();
});


$("#upload_foto").hover(function() {
    $(this).css('opacity', '0.5');
    $('#btn_upload').removeAttr('hidden', true);
}, function() {
    $('#btn_upload').attr('hidden', true);
    $(this).css('opacity', '1');
});

$('#btn_upload').hover(function() {
    $('#upload_foto').css('opacity', '0.5');
    $('#btn_upload').removeAttr('hidden', true);
}, function() {
    $('#upload_foto').css('opacity', '1');
});

$("#upload_sampul").hover(function() {
    $(this).css('opacity', '0.5');
    $('#btn_sampul').removeAttr('hidden', true);
}, function() {
    $('#btn_sampul').attr('hidden', true);
    $(this).css('opacity', '1');
});

$('#btn_sampul').hover(function() {
    $('#upload_sampul').css('opacity', '0.5');
    $('#btn_sampul').removeAttr('hidden', true);
}, function() {
    $('#upload_sampul').css('opacity', '1');
});

function notif_selesai_sidang(selesai_sidang) {
    if (selesai_sidang == 'true') {
        var message = "Data berhasil disimpan";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (selesai_sidang == 'false') {
        var message = "Terjadi Kesalahan saat menyimpan data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_kelola(status) {
    if (status == 'tambah') {
        var message = "Data berhasil ditambahkan";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'ubah') {
        var message = "Data berhasil diubah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'hapus') {
        var message = "Data berhasil hapus";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (status == 'tambah_gagal') {
        var message = "NPM yang ditambahkan telah terdaftar";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    } else if (status == 'tambah_dos_gagal') {
        var message = "NIDN yang ditambahkan telah terdaftar";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    } else if (status == 'ubah_gagal') {
        var message = "Terjadi error saat mengubah data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (status == 'hapus_gagal') {
        var message = "Terjadi error saat menghapus data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (status == 'null') {
        var message = "Data tidak boleh kosong";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    }
};

function notif_kalkulasi(kalkulasi) {
    if (kalkulasi == 'batas_true') {
        var message = "Data berhasil dikalkulasi";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (kalkulasi == 'batas_false') {
        var message = "Tidak ada data dosen yang aktif";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    }
};

function notif_ubah_judul(judul) {
    if (judul == 'judul_true') {
        var message = "Judul berhasil diubah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (judul == 'judul_false') {
        var message = "Terjadi kesalahan saat mengubah judul";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_hapus_file(hapus_file) {
    if (hapus_file == 'true') {
        var message = "File berhasil dihapus";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (hapus_file == 'false') {
        var message = "Terjadi Kesalahan Saat Menghapus File";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
}

function notif_prop(prop) {
    if (prop == 'true_diterima') {
        var message = "Proposal diterima";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (prop == 'true_ditolak') {
        var message = "Proposal ditolak";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (prop == 'false_ditolak') {
        var message = "Terjadi kesalahan saat upload data";
        nowuiDashboard.showNotification('top', 'right', message, 'warning');
    } else if (prop == 'false_diterima') {
        var message = "Terjadi kesalahan saat menyimpan data";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_buat_jadwal(notif_buat_jadwal) {
    var buat_jadwal = notif_buat_jadwal;
    if (buat_jadwal == 'true') {
        var message = "Jadwal sidang berhasil diubah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (buat_jadwal == 'false') {
        var message = "Terjadi kesalahan saat membuat jadwal";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_ubah_sandi(notif_kata_sandi) {
    var sandi = notif_kata_sandi;
    if (sandi == 'true') {
        var message = "Kata sandi berhasil diubah";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (sandi == 'false') {
        var message = "Terjadi kesalahan saat mengubah sandi";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    } else if (sandi == 'null') {
        var message = "Kata sandi tidak boleh kosong";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_upload_foto(foto_upload) {
    var foto = foto_upload;
    if (foto == 'true') {
        var message = "Foto profil berhasil diupload";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (foto == 'false') {
        var message = "Terjadi kesalahan saat upload";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};

function notif_upload_sampul(sampul_upload) {
    var sampul = sampul_upload;
    if (sampul == 'true') {
        var message = "Sampul berhasil diupload";
        nowuiDashboard.showNotification('top', 'right', message, 'success');
    } else if (sampul == 'false') {
        var message = "Terjadi kesalahan saat upload";
        nowuiDashboard.showNotification('top', 'right', message, 'danger');
    }
};


$('#pass, #confirm').on('keyup', function() {
    if (($('#pass').val() == '') && ($('#confirm').val() == '')) {
        $('#confirm').removeClass('is-invalid');
        $('#confirm').removeClass('is-valid');
        $('#btn_ubah_pw').removeClass('btn-success');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
    } else if ($('#pass').val() == $('#confirm').val()) {
        $('#confirm').addClass('is-valid');
        $('#confirm').removeClass('is-invalid');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
        $('#btn_ubah_pw').addClass('btn-success');
    } else {
        $('#confirm').addClass('is-invalid');
        $('#btn_ubah_pw').addClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', true);
    }
});

document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("validatedCustomFile").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
});

document.querySelector('.custom-file-input1').addEventListener('change', function(e) {
    var fileName = document.getElementById("validatedCustomFile1").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
});