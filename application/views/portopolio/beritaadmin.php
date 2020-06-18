 <section class="ftco-section">
	      <div class="container mt-5">
	      	<div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Berita</span>
              <h2>Berita Anda</h2>
            </div>
          </div>         
          <?php foreach($berita as $bt): ?>
	         <div class="card mb-3 bg-dark m-2" >
			  <div class="row no-gutters col-md-12 col-sm-12">
			    <div class="col-md-2">
			      <img src="<?php echo base_url('./gambar_berita/').$bt['gambar'] ?>" class="card-img mt-2" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?= $bt['judul_berita']  ?></h5>
			        <p class="card-text text-white"><?= substr($bt['isi_berita'], 0,120) ?><a href="<?= base_url('Controler_Portopolio/BeritaSelanjutnya/').$bt['id'] ?> "  id="selanjutnya"> selanjutnya</a></p>
			        <p class="card-text"><small class="text-muted"><?= $bt['tanggal_berita'] ?>  <?php if($this->session->userdata('nama')!=null && $bt['status']== '0'){  ?>
			        	<a href="javascript:void();" data="<?= $bt['id'] ?>" id="publish">Publish</a>
			        	<?php }else{ ?>
			        	<a href="javascript:void();" data="<?= $bt['id'] ?>" id="unpublish">Unpublish</a>
			        	<?php } ?>
			        	| <a href="javascript:void();" data="<?= $bt['id'] ?>" id="hapusberita">Hapus Berita</a>
			        	| <a href="<?= base_url('Controler_portopolio2/UbahBerita/').$bt['id'] ?>">Ubah Berita</a>
			        </small></p>
			      </div>
			    </div>
			</div>
	      	</div>
      	 <?php endforeach ?>
 </section> 
<script type="text/javascript">
	function refresh(){
		window.location.href = "<?= base_url('Controler_Portopolio2/BeritaAdmin') ?>"
	}
	//tombol publish
	$('.card').on('click','#publish',function(){
		let id = $(this).attr('data');
		let publish = $('#publish');
		$(this).html(`<div class="spinner-border text-primary" role="status">
				  <span class="sr-only">Loading...</span>
				</div>`);
		publish= true;
		//console.log($(this).attr('data'));
		$.ajax({
			url: "<?= base_url('Controler_Portopolio2/PublishBerita') ?>",
			data: {id:id,publish:publish},
			method: 'POST',
			beforeSend:function(argument) {
				// $('#publish').html(`<div class="spinner-border text-primary" role="status">
				//   <span class="sr-only">Loading...</span>
				// </div>`);

			},
			success:function(hasil){
				refresh();
				$(this).hide();
				
			}
		});
	});
	//tombol unpublish
	$('.card').on('click','#unpublish',function(){
		let id = $(this).attr('data');
		let unpublish = $('#unpublish');
		$(this).html(`<div class="spinner-border text-primary" role="status">
				  <span class="sr-only">Loading...</span>
				</div>`);
		unpublish = true;
		$.ajax({
			url: "<?= base_url('Controler_Portopolio2/UnPublishBerita') ?>",
			data: {id:id,unpublish:unpublish},
			method: 'POST',
			beforeSend:function(argument) {
				// $('#unpublish').html(`<div class="spinner-border text-primary" role="status">
				//   <span class="sr-only">Loading...</span>
				// </div>`);				
			},
			success:function(hasil){
				refresh();
				$(this).hide();
			}
		});
	});
	//tombol hapus berita
	$('.card').on('click','#hapusberita',function(){
		let id = $(this).attr('data');
		$(this).html(`<div class="spinner-border text-primary" role="status">
				  <span class="sr-only">Loading...</span>
				</div>`);
		//console.log(id);
		$.ajax({
			url: "<?= base_url('Controler_Portopolio2/HapusBerita') ?>",
			data: {id:id},
			method: 'POST',
			success:function(hasil){
				refresh();
			}
		});

	});

	
</script>