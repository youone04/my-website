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
		      <img src="<?php echo base_url('assets/images/').$bt['gambar'] ?>" class="card-img mt-2" alt="...">
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h5 class="card-title"><?= $bt['judul_berita']  ?></h5>
		        <p class="card-text text-white"><?= substr($bt['isi_berita'], 0,120) ?><a href="<?= base_url('Controler_Portopolio/BeritaSelanjutnya/').$bt['id'] ?> "  id="selanjutnya"> selanjutnya</a></p>
		        <p class="card-text"><small class="text-muted"><?= $bt['tanggal_berita'] ?>  <?php if($this->session->userdata('nama')!=null && $bt['status']== '0'){  ?>
		        	<a href="#" data="<?= $bt['id'] ?>" id="publish">Publish</a>
		        	<?php } ?>
		        </small></p>
		      </div>
		    </div>
		</div>
      	</div>
      	 <?php endforeach ?>
 </section> 
<script type="text/javascript">
	
	//mengaambil seluruh data berita
	$.ajax({

		url: "<?= base_url('Controler_Portopolio/berita') ?>",
		method: 'POST',
		success:function(result){

		}
	});

	//tombol publish
	$('.card').on('click','#publish',function(){
		$(this).hide();
		let id = $(this).attr('data');
		//console.log($(this).attr('data'));
		$.ajax({
			url: "<?= base_url('Controler_Portopolio2/Publishberita') ?>",
			data: {id:id},
			method: 'POST',
			success:function(hasil){
				
			}
		});
	});

</script>