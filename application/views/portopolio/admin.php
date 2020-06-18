<section class="ftco-section">
        <div class="container mt-5">
          <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Komentar Pengunjung</span>
              <h2 id="semua-pengunjung"><a href="#" type="button" >Lihat Semua Pesan Pengunjung</a></h2>
               <h2 id="semua-pengunjung-hariini"><a href="#" type="button" >Lihat Pesan Pengunjung Hari ini</a></h2>
            </div>
          </div>
          <center> 
            <div class="s-pengunjung">
               <h5> <a href="">Pesan Semua Pengunjung</a></h5><br> 
               <?php foreach($komentar as $km): ?>
                  <?php if($km['status']=='1'){ ?>
                 		<p><a href="#">Pengirim : </a><?=$km['nama'] ?></p>
                 		<p><?= $km['pesan'] ?></p>
                 		<small><?= $km['tanggal'] ?></small>
                 		<br><br><br>
                  <?php } ?>
               <?php endforeach; ?>
           </div>
        </center>

        <center>
            <div class="s-pengunjung-harini-ini">
                <h5> <a href="">Pesan Pengunjung Hari ini</a></h5><br>
               <?php foreach($komentar_hariini as $km): ?>
                  <?php if($km['status']=='1'){ ?>
                    <p><a href="#">Pengirim : </a><?=$km['nama'] ?></p>
                    <p><?= $km['pesan'] ?></p>
                    <small><?= $km['tanggal'] ?></small>
                    <br><br><br>
                  <?php } ?>

               <?php endforeach; ?>
           </div>
        </center>

<script type="text/javascript">
  $('#semua-pengunjung').hide();
  $('.s-pengunjung-harini-ini').hide();

  $('#semua-pengunjung-hariini').click(function(){
      $('.s-pengunjung').hide();
      $('.s-pengunjung-harini-ini').show();
      $('#semua-pengunjung-hariini').hide();
      $('#semua-pengunjung').show();


  });

   $('#semua-pengunjung').click(function(){
      $('.s-pengunjung').show();
      $('.s-pengunjung-harini-ini').hide();
      $('#semua-pengunjung').hide();
      $('#semua-pengunjung-hariini').show();

   });

	$.ajax({
		url: '<?= base_url("Controler_Portopolio/Admin"); ?>',
		method: 'POST',
		beforeSend:function(){
			$('#loading').html('loading....');
		},
		success:function(){
			$('#loading').hide();
		}
	});

</script>