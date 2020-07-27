<br><br><br><br>
<div class="container">
	<div class="row">
		<form id="dataform" method="POST">
          <div class="card-body">
       		<div class="form-group">
				<label>Judul 1 </label>
				<input type="text" name="judul1" id="judul1" class="form-control">
				<small id="pesan-judul1"></small>
			</div>

			<div class="form-group">
				<label>Judul 2  </label>
				<input type="text" name="judul2" id="judul2" class="form-control" >
				<small id="pesan-judul2"></small>
			</div>

			<div class="form-group">
				<label>Keterangan  </label>
				<!-- <input type="text" name="keterangan" id="keterangan" class="form-control" > -->
				<textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
				<small id="pesan-keterangan"></small>
			</div>

			<div class="form-group">
				<label>File Gambar  </label><br>
				<input type="file" name="gambardata[]" id="gambar" >
				<br>
				<input type="file" name="gambardata[]" id="gambar1" >
				<br>
				<input type="file" name="gambardata[]" id="gambar2" >
				<small id="pesan-gambar"></small> <br>
				<small id="pesan-gambar1"></small> <br>
				<small id="pesan-gambar2"></small> <br>
				
			</div>
				<div class="progress">
                 <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span id="persen"></span><span id="total"></span> <br>
			<!-- <div class="form-group"> -->
				<!-- <button class="btn btn-primary" value="submit" type="submit" id="tambah">TAMBAH</button> -->
				<button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary py-3 px-5">Simpan</button>
				<span id="peringatan"></span>
			<!-- </div> -->
		 </div>
		</form>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function (e) {
	$('.progress').hide();
	$('#dataform').on('submit',function(e){
		e.preventDefault();
		$('.progress').show();
		let data = new FormData(this);
		//ukuran gambar
		let file1 = $('#gambar').prop('files')[0]; 
		let file2 = $('#gambar1').prop('files')[0]; 
		let file3 = $('#gambar2').prop('files')[0];
		//nama gambar
		let ext1 =  $('#gambar').val().split('.').pop().toLowerCase();
		let ext2 =  $('#gambar').val().split('.').pop().toLowerCase();
		let ext3 =  $('#gambar').val().split('.').pop().toLowerCase();
		//tombol submit harus di tekan
		let cek = $('#submit');
		cek = true;
		data.append('submit',cek)
		if($('#judul1').val()==''){
			$('#pesan-judul1').html('<div class="alert alert-warning">Form Wajib Disi</div>');
		}else if($('#judul2').val()==''){
			$('#pesan-judul2').html('<div class="alert alert-warning">Form Harus Disi</div>');
		}else if($('#keterangan').val()==''){
			$('#pesan-keterangan').html('<div class="alert alert-warning">Form Harus Diisi</div>');
		}else if($('#gambar').val()=='' || $('#gambar1').val()=='' || $('#gambar2').val()==''){
			$('#pesan-gambar').html('<div class="alert alert-warning">Form Harus Diisi</div>');
		}else if(file1.file > 1500000 || file2.file > 1500000 || file3.size > 1500000 ){
			$('#pesan-gambar1').html('<div class="alert alert-danger">Ukuran gambar maskimal 1.5mb</div>')
		}else if(jQuery.inArray(ext1,['jpg','jpeg','png']) == -1 || jQuery.inArray(ext2,['jpg','jpeg','png']) == -1 || jQuery.inArray(ext3,['jpg','jpeg','png']) == -1) {
			$('#pesan-gambar2').html('<div class="alert alert-danger">Masukan Eksistensi Gmabar!</div>');
		}else{	
		return;		
			$.ajax({
				url: '<?= base_url("Controler_Portopolio/prosestambahdata"); ?>',
				data: data,
				contentType: false,
			    cache: false,
			    processData: false,
				type: 'POST',
				beforeSend:function(){
					  $('.progress-bar').width('100%');
					  $('#submit').html(`<div class="spinner-border text-primary" role="status">
					  <span class="sr-only">Loading...</span>
					</div>`);
				},
				uploadProgress:function(event, position, total, percentageComplete){
					$('#persen').html(percentageComplete+'%');
	               // console.log(percentageComplete);
	               $('.progress-bar').animate({
	                width: percentageComplete + '%'
	               }, {
	                duration: 1000
	               });

				},
				success:function(data){
					console.log(data);
					$('#peringatan').html('<div class="alert alert-success">Berhasil di Simpan</div>');
					$('.progress').hide();
					 $('#submit').text('Simpan');
					
				}

			});
		}

	});
	});


</script>