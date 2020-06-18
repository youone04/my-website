<!--  <section class="ftco-section">
	      <div class="container mt-5">
	      	<div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Berita</span>
              <h2>Detail Berita</h2>
            </div>
          </div>
             <div class="carousel-item active">
		      <center>
		      <img src="<?= base_url('./gambar_berita/').$detailberita['gambar'] ?>" class="d-block w-50 h-50" >
		      </center>
		    </div>
		 </div>
		 <br><br>
		 <center>
		 	<div class="berita"style="margin-top: 900px">
		 		<p><?= $detailberita['judul_berita'] ?></p>
		 		<p><?= $detailberita['isi_berita'] ?></p>
		 		<p><span><?= $detailberita['tanggal_berita'] ?></span></p>
		 	</div>
		 </center>
</section> -->
 <section class="ftco-section">
        <div class="container mt-5">
          <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Berita</span>
              <h2>Detail Berita</h2>
            </div>
          </div>
          <div class="row no-gutters" id="sisip">
	          	<div class="block-3 d-md-flex ftco-animate col-lg-12 ubah-data-portopolio" ><br>
		  			<a href="portfolio-single.html" class="image d-flex justify-content-center align-items-center" style="background-image:url(<?php echo base_url('./gambar_berita/').$detailberita['gambar'] ?>);" data-scrollax=" properties: { translateY: -3%}">
		              <div class="icon d-flex text-center justify-content-center align-items-center">
		             </div>
		            </a>
		            <div class="text">
		              <h4 class="subheading"><?= $detailberita['judul_berita'] ?></h4>
		              <h2 class="heading"><a href="portfolio-single.html"><?= $detailberita['judul_berita'] ?></a></h2>
		              <p><?= $detailberita['isi_berita'] ?></p>
		              <p><span><?= $detailberita['tanggal_berita'] ?></span></p>
		            </div>
		            </div>	            
	      </div>
	  </div>
	  </section>
