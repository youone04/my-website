<style type="text/css">
	.image{
		width: 100%;
		height: 70%;
		object-fit: cover;
		padding-bottom: 50px;
	}
	.text{
		margin-top: -120px;
	}
	@media screen and (max-width: 480px){
		.text{
		margin-top: auto;
		}
		.gambar-portopolio{
			height: 200px;
		}
		.image{
		width: 100%;
		height: 70%;
		object-fit: cover;
		padding-bottom: 50px;
	}
	}
	
</style>
 <section class="ftco-section">
        <div class="container mt-5">
          <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Portfolio</span>
              <h2>Lihat Lebih Banyak Portofolio</h2>
            </div>
          </div>
          <div class="row no-gutters" id="sisip">
          	<?php foreach($gambar as $gmr) : ?>
				  <div class="block-3 d-md-flex ftco-animate col-lg-12 ubah-data-portopolio" ><br>
					<div class="gambar-portopolio">
						<a href="#" class="image d-flex justify-content-center align-items-center" style="background-image:url(<?php echo base_url('./gambar/'.$gmr->gambar) ?>);" data-scrollax=" properties: { translateY: -3%}">
					</div>

		              <div class="icon d-flex text-center justify-content-center align-items-center">
		             </div>
		            </a>
		            <div class="text">
		              <h4 class="subheading"><?= $gmr->judul1; ?></h4>
		              <form id="formportopolio">
		              <h2 class="heading"><a href="portfolio-single.html"><?= $gmr->judul2;  ?></a></h2>
		              <p><?= substr($gmr->keterangan,0,205);  ?></p>
		              <p><a href="<?= base_url('Controler_Portopolio/LihatGambar/').$gmr->id ?>">Lihat Detail</a> <?php if($this->session->userdata("nama")!=null){ ?>| <a href="<?= base_url('Controler_Portopolio2/UbahDataPortopolio/').encrypt_url($gmr->id )?>">Ubah</a>
		              	| <a href="<?= base_url('Controler_Portopolio3/HapusDataPortopolio/').encrypt_url($gmr->id ) ?>">Hapus</a>
		              <?php } ?> 
		         	 </p>

		              </form>
		            </div>
		            </div>
		     <?php endforeach; ?>
	            
	      </div>
	  </div>
	  </section>
