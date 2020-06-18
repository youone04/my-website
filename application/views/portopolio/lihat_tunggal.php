 <style type="text/css">
   #gambar img{
      width: 50%;
      height: 350px;
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

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <center>
      <img src="<?= base_url('./gambar/'.$datatunggal['gambar']); ?>" class="d-block w-50 h-50" >
      </center>
      <div class="carousel-caption d-none d-md-block">
       <!--  <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <center>
      <img src="<?= base_url('./gambar/'.$datatunggal['gambar1']); ?>" class="d-block w-50 h-50"  alt="...">
      </center>
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
      </div>
    </div>
    <div class="carousel-item">
      <center>
      <img src="<?= base_url('./gambar/'.$datatunggal['gambar2']); ?>" class="d-block w-50 h-50" alt="...">
      </center>
      <div class="carousel-caption d-none d-md-block">
        <!-- <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       
         <center>
            <br>
            <p> <?= $datatunggal['judul1']; ?></p><br>
            <p> <?= $datatunggal['judul2'] ?></p>
            <p><?= $datatunggal['keterangan']; ?></p>
        </center>   
	  </section>


        