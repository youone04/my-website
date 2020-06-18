 <section class="ftco-section">
	      <div class="container mt-5">
	      	<div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Berita</span>
              <h2>Input Berita </h2>
            </div>
          </div>
           <div class="row block-9">
            <div class="col-md-12 pr-md-5 col-sm-12 m-2">
              <form id="dataform" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="judul" placeholder="Judul Berita" id="judul" value="<?= $berita['judul_berita']; ?>">
                  <span id="judulberita"></span>
                </div>
               
                <div class="form-group">
                  <textarea name="isiberita" id="isiberita" cols="30" rows="7" class="form-control" placeholder="Isi Berita">
                   <?= $berita['isi_berita'] ?>
                  </textarea>
                  <span id="isi"></span>
                </div>

                <div class="gambar col-md-3">
                     <img src="<?php echo base_url('./gambar_berita/').$berita['gambar'] ?>" >
                </div>
                <br>
                <div class="form-group">
                	<input type="file" name="gambarnya" id="gambar">
                  <span id="gambar1"></span>
                </div>
                <div class="form-group">
                  <input type="hidden" name="id" id="idnya" value="<?= $berita['id'] ?>">
                  <input type="hidden" name="gambar" id="gambarlama" value="<?= $berita['gambar'] ?>">
                  <input type="submit" id="kirim" value="Simpan Berita" class="btn btn-primary py-3 px-5">
                  <span id="loading"></span>
                </div>
              </form>
            
            </div>
            <div class="col-md-6" id="map"></div>
          </div>

      </div>
 </section>
 <script type="text/javascript">
   $('#dataform').on('submit',function(e){
        e.preventDefault();
        let formdata = new FormData();
        let uploadfile = $('#gambar').prop('files')[0];
        let ubahberita = true;

        formdata.append('filegambar',uploadfile)
        formdata.append('judul',$('#judul').val());
        formdata.append('isiberita',$('#isiberita').val());
        formdata.append('gambarlama',$('#gambarlama').val());
        formdata.append('id',$('#idnya').val());
        formdata.append('ubahberita',ubahberita);

        if($('#judul').val()==''){
            $('#judulberita').html('<div class="alert alert-warning">Form Wajib diisi</div>');
        }else if($('#isiberita').val() == ''){
            $('#isi').html('<div class="alert alert-warning">Form Wajib diisi</div>');
        }else{
          $.ajax({
              url: "<?= base_url('Controler_Portopolio2/ProsesUbahBerita') ?>",
              method: "POST",
              data: formdata,
              contentType: false,
              processData: false,
              cache: false,
              success:function(hasil){
                $('#loading').html('<div class="alert alert-success">Berhasil disimpan</div>');
                $('#judulberita').hide();
                $('#isi').hide();
                $('#gambar1').hide();
                $('#judul').val('');
                $('#isiberita').val('');
                $('#gambar').val('');

              } 

            });
      }
   });
 </script>