    <section class="ftco-section contact-section">
        <div class="container mt-5">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Kontak Informasi</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 col-sm-12 col-lg-12">
              <p><span>Alamat   :</span> <a href="#">Talangpadang,Lampung,Indonesia</a></p>
            </div>
            <div class="col-md-3 col-lg-12">
              <p><span>No       :</span> <a href="tel://085816790359">085816790359</a></p>
            </div>
            <div class="col-md-3 col-lg-12">
              <p><span>WA       :</span> <a href="tel://082269687374">082269687374</a></p>
            </div>
            <div class="col-md-3 col-lg-12">
              <p><span>Email    :</span> <a href="mailto:yudi.14117035@student.itera.ac.id">yudi.14117035@student.itera.ac.id</a></p>
            </div>
            <div class="col-md-3 col-lg-12">
              <p><span>Website  :</span> <a href="https://yudi-gunawan.com">bit.ly/profil-yoedi-goenawan</a></p>
            </div>
             <div class="col-md-3 col-lg-12">
              <p><span>github :</span> <a href="https://github.com/youone04">https://github.com/youone04</a></p>
            </div>
          </div>
          <div class="row block-9">
            <div class="col-md-6 pr-md-5">
              <form action="<?= base_url('Controler_Portopolio/pesanpengunjung') ?>" id="pengunjung" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name" id="nama">
                  <span id="peringatannama"></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email" id="email">
                  <span id="peringatanemail"></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Subject" id="Subject">
                  <span id="peringatansubject"></span>
                </div>
                <div class="form-group">
                  <textarea name="" id="pesan" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                  <span id="peringatanmessage"></span>
                </div>
                <div class="form-group">
                  <input type="submit" id="kirim" value="Send Message" class="btn btn-primary py-3 px-5">
                  <span id="loading"></span>
                </div>
              </form>
            
            </div>
            <div class="col-md-6" id="map"></div>
          </div>
        </div>
      </section>
      <script type="text/javascript">
        
        $('#pengunjung').on('submit',function(e){
          let nama = $('#nama').val();
          let email =$('#email').val();
          let Subject = $('#Subject').val();
          let pesan = $('#pesan').val();
          let kirim = $('#kirim');
          kirim = true;
          e.preventDefault();
          if(nama==''){
            $('#peringatannama').html('<div class="alert alert-warning">Form Harus diisi</div>');

          }else if(email==''){
            $('#peringatanemail').html('<div class="alert alert-warning">Form Harus diisi</div>');
          }else if(Subject==''){
            $('#peringatansubject').html('<div class="alert alert-warning">Form Harus diisi</div>')
          }else if(pesan==''){
            $('#peringatanmessage').html('<div class="alert alert-warning">Form Harus diisi</div>')
          }else{
            $.ajax({
                url: '<?= base_url("Controler_Portopolio/pesanpengunjung"); ?>',
                method: 'POST',
                data: {nama:nama,email:email,Subject:Subject,pesan:pesan,kirim:kirim},
                beforeSend:function(){
                  $('#loading').html('loading....');
                },
                success:function(data){
                  console.log(data);
                  $('#nama').val('');
                  $('#email').val('');
                  $('#Subject').val('');
                  $('#pesan').val('');
                  $('#loading').html('<div class="alert alert-success" width="30px" >Berhasil Dikirim</div>');
                  $('#peringatannama').hide();
                  $('#peringatanemail').hide();
                  $('#peringatansubject').hide();
                  $('#peringatanmessage').hide();

                }
            });

        }

        });

      </script>