const flashData = $('.flash-data').data('flashdata');

if(flashData){
	Swal.fire(
  		'Data E-Dentist',
  		'Berhasil '+ flashData + '!!',
  		'success'
);
}

const flashGagal = $('.flash-gagal').data('flashgagal');

if(flashGagal){
	Swal.fire({
  icon: 'error',
  title: 'Oops... Update Gagal',
  text: 'Coba lagi dengan ukuran Foto di perkecil !!',
  footer: '<a href>Hubungi Admin Jika Mengalami Kesulitan</a>'
});
}

//Tombol Hapus
$('.tombol-hapus').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');


	Swal.fire({
	  title: 'Apakah Anda Yakin ??',
	  text: "Data E-Dentist Akan Dihapus !!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it !'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
  }
})


});

//Tombol reset
$('.tombol-reset').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');


	Swal.fire({
	  title: 'Apakah Anda Yakin ??',
	  text: "Password User Akan di Reset ??",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, reset it !'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
  }
})


});


//Tombol update
$('.tombol-update').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');


	Swal.fire({
	  title: 'Apakah Anda Yakin ??',
	  text: "Data Akan Di Update ??",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, update it !'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
  }
})


});

