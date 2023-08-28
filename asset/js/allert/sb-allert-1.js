//=================================================
// Allert validation, error & success
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================



const notifikasi = $('.allert').data('infodata');
if(notifikasi == "berhasilkaryawan"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Data Karyawan Berhasil Di Simpan',
	})
}else if (notifikasi == "erorpasswd"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal',
	  text: 'Password & Konfirmasi Password Tidak Sama',
	})
} else if (notifikasi == "doubledata"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal',
	  text: 'NIP Telah terdaftar, Karyawan Telah terdaftar',
	})
} else if (notifikasi == "karyawansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Tambah Data Karyawan Berhasil',
	})
} else if (notifikasi == "resetkaryawansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Reset Sukses',
	  text: 'Data Telah Di Kosongkan, Silahkan Isi Kembali',
	})
} else if (notifikasi == "resetkaryawangagal"){
	Swal.fire({
	  icon: 'error',
	  title: 'Reset Gagal',
	  text: 'Data Telah Kosong, isi data kembali',
	})
} else if (notifikasi == "deletesukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Delete Sukses',
	  text: 'Data Karyawan Telah Terhapus',
	})
} else if (notifikasi == "updatekaryawansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Update Sukses',
	  text: 'Update Data Telah Berhasil',
	})
} else if (notifikasi == "aktif"){
	Swal.fire({
	  icon: 'success',
	  title: 'Karyawan Di Aktifkan',
	  text: 'Karyawan Berhasil Di Aktifkan, Karyawan Dapat Mengakses Sistem',
	})
} else if (notifikasi == "nonaktif"){
	Swal.fire({
	  icon: 'success',
	  title: 'Karyawan Di Nonaktifkan',
	  text: 'Karyawan Tidak Dapat Mengakses Sistem',
	})
} else if (notifikasi == "updatekaryawanpasswordsukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Update Sukses',
	  text: 'Data Utama Telah Di Update, Password Telah Di Update',
	})
} else if (notifikasi == "datakaryawankosong"){
	Swal.fire({
	  icon: 'error',
	  title: 'Tambah Gagal',
	  text: 'Data Karyawan Kosong, Pilih Karyawan Terlebih Dahulu',
	})
} else if (notifikasi == "datagajisukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Data Gaji Berhasil Di Tambahkan',
	})
} else if (notifikasi == "statusnonaktif"){
	Swal.fire({
	  icon: 'error',
	  title: 'Maaf',
	  text: 'Status Karyawan Non Aktif, Tidak Dapat Melihat Data Gaji',
	})
} else if (notifikasi == "updateadminsukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Update Data Admin Sukses',
	})
} else if (notifikasi == "updateadminsuksesdanpassword"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Update Data Admin & Password Sukses',
	})
} else if (notifikasi == "updategajisukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Update Data Admin Gaji Sukses',
	})
} else if (notifikasi == "pengumumansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Pengumuman Berhasil Di Tambah',
	})
} else if (notifikasi == "deletepengumumansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Pengumuman Berhasil Di Delete',
	})
} else if (notifikasi == "pengumumangagal"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal Di Tambahkan',
	  text: 'Tidak Dapat Menggunakan Simbol Petik',
	})
} else if (notifikasi == "resetpengumumangagal"){
	Swal.fire({
	  icon: 'error',
	  title: 'Reset Gagal',
	  text: 'Data Telah Kosong, isi data kembali',
	})
} else if (notifikasi == "resetpengumumansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Reset Sukses',
	  text: 'Data Telah Di Kosongkan, Silahkan Isi Kembali',
	})
} else if (notifikasi == "updatepengumumansukses"){
	Swal.fire({
	  icon: 'success',
	  title: 'Update Sukses',
	  text: 'Data Pengumuman Telah Berhasil Di Update',
	})
} else if (notifikasi == "updatepengumumangagal"){
	Swal.fire({
	  icon: 'error',
	  title: 'Update Gagal',
	  text: 'Data Pengumuman Gagal Di Update',
	})
} else if (notifikasi == "extensionnotsame"){
	Swal.fire({
	  icon: 'error',
	  title: 'Dokumen Keliru',
	  text: 'Dokumen yang anda upload harus ekstensi .xlsx atau .xls',
	})
} else if (notifikasi == "uploadkaryawanberhasil"){
	Swal.fire({
	  icon: 'success',
	  title: 'Proses Upload Berhasil',
	  text: 'Cek Status Upload Data Di Header Upload Data',
	})
} else if (notifikasi == "deletekaryawangagal"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal Delete',
	  text: 'Data Karyawan Terhubung Dengan Data Gaji, Hapus Data Gaji Atas nama Karyawan Terlebih Dahulu',
	})
} else if (notifikasi == "uploadgajiberhasil"){
	Swal.fire({
	  icon: 'success',
	  title: 'Proses Upload Berhasil',
	  text: 'Cek Status Upload Data Di Header Upload Data ',
	})
} else if (notifikasi == "dataandakosong"){
	Swal.fire({
	  icon: 'error',
	  title: 'Data Anda Kosong',
	  text: 'Cek Kembali File Excel Anda',
	})
} else if (notifikasi == "namafilebeda"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal Upload',
	  text: 'Pastikan anda menggunakan file Templat yang benar',
	})
} else if (notifikasi == "versitidaktersedia"){
	Swal.fire({
	  icon: 'error',
	  title: 'Gagal Validasi Versi',
	  text: 'Pastikan Menggunakan Versi Templat yang Sesuai',
	})
} else if (notifikasi == "selectdata"){
	Swal.fire({
	  icon: 'error',
	  title: 'Tidak Ada Data',
	  text: 'Pilih beberapa data karyawan terlebih dahulu, pastikan beberapa data telah tercentang',
	})
}

else if (notifikasi == "selectdatagaji"){
	Swal.fire({
	  icon: 'error',
	  title: 'Tidak Ada Data',
	  text: 'Pilih beberapa data gaji terlebih dahulu, pastikan beberapa data telah tercentang',
	})
}




// delete data
$('.delete-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Hapus Data',
	  text: "Data akan dihapus permanen",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data!'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});



// Logout Data
$('.logout-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'keluar',
	  text: "Apakah Anda Ingin Mengakhiri Seasson Ini ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Keluar'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});

// status nonaktif data
$('.status-nonaktif-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Nonaktifkan Karyawan',
	  text: "Apakah Anda Ingin Menonaktifkan Karyawan Ini ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Nonaktifkan'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});

// status aktif data
$('.status-aktif-data').on('click', function(e){
	e.preventDefault();
	var getLink = $(this).attr('href');

	Swal.fire({
	  title: 'Aktifkan Karyawan',
	  text: "Apakah Anda Ingin Mengaktifkan Karyawan Ini ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Aktifkan'
	}).then((result) => {
	  if (result.value) {
	    window.location.href = getLink;
	  }
	})
});