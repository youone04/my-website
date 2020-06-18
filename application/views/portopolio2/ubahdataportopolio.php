<br><br><br><br>
<div class="container">
		<form id="dataform">
          <div class="card-body">
       		<div class="form-group">
				<label>Judul 1 </label>
				<input type="hidden" name="id" value="<?= $portopolio['id'] ?>">
				<input type="text" name="judul1" id="judul1" class="form-control" value="<?= $portopolio['judul1'] ?>">
				<small id="pesan-judul1"></small>
			</div>

			<div class="form-group">
				<label>Judul 2  </label>
				<input type="text" name="judul2" id="judul2" class="form-control" value="<?= $portopolio['judul2'] ?>" >
				<small id="pesan-judul2"></small>
			</div>

			<div class="form-group">
				<label>Keterangan  </label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $portopolio['keterangan'] ?>" >
				<small id="pesan-keterangan"></small>
			</div>
			<div class="form-group">
				<div class="gambar col col-md-4">
						gambar 1 
						<img src="<?= base_url('./gambar/').$portopolio['gambar'] ?>">
						gambar 2 
						<img src="<?= base_url('./gambar/').$portopolio['gambar1'] ?>">
						gambar 3
						<img src="<?= base_url('./gambar/').$portopolio['gambar2'] ?>">
				</div>
				<label>File Gambar  </label><br>
				<input type="hidden" name="gambarlama[]" value="<?= $portopolio['gambar'] ?> ">
				<input type="file" name="gambardata[]" id="gambar">
				<br>
				<input type="hidden" name="gambarlama[]" value="<?= $portopolio['gambar1'] ?>" >
				<input type="file" name="gambardata[]" id="gambar" >
				<br>
				<input type="hidden" name="gambarlama[]" value="<?= $portopolio['gambar2'] ?>">
				<input type="file" name="gambardata[]" id="gambar" >
				<small id="pesan-gambar"></small>
			</div>

			<!-- <div class="form-group"> -->
				<button class="btn btn-primary" value="submit" type="submit" id="ubah">SIMPAN</button>
				<span id="peringatan"></span>
			<!-- </div> -->
		 </div>
		</form>
</div>
<script type="text/javascript">
	$(document).ready(function(e){

		$('#dataform').on('submit',function(e){
			e.preventDefault();
			let formdata =  new FormData(this);
			let ubah = $('#ubah');
			ubah = true;
			formdata.append('ubah',ubah);
			if($('#judul1').val()==''){
				$('#pesan-judul1').html('<div class="alert alert-warning">Form Harus Dis!</div>');
			}else if($('#judul2').val()==''){
				$('#pesan-judul2').html('<div class="alert alert-warning">Form Harus Dis!</div>');
			}else if($('#keterangan').val()==''){
				$('#pesan-keterangan').html('<div class="alert alert-warning">Form Harus Dis!</div>');
			}
			else{
				$.ajax({
					url:"<?= base_url('Controler_Portopolio2/ProsesUbahPortopolio') ?>",
					data: formdata,
					contentType: false,
				    cache: false,
				    processData: false,
					type: 'POST',
					success:function(hasil){
						$('#peringatan').html('<div class="alert alert-success">Data Berhasi Dirubah</div>');
					}
				});
			}
		});


	});
</script>