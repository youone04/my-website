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
                  <input type="text" class="form-control" name="judul" placeholder="Judul Berita" id="judul">
                  <span id="judulberita"></span>
                </div>
               
                <div class="form-group">
                  <textarea name="isiberita" id="isiberita" cols="30" rows="7" class="form-control" placeholder="Isi Berita"></textarea>
                  <span id="isi"></span>
                </div>
                <div class="form-group">
                	<input type="file" name="gambarnya" id="gambar">
                  <span id="gambar1"></span>
                </div>
                <div class="progress">
                 <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <div class="form-group">
                 <button type="submit" id="kirim" value="Simpan Berita" class="btn btn-primary py-3 px-5">Simpan Berita</button>
                  <span id="loading"></span>
                </div>
              </form>
            
            </div>
            <div class="col-md-6" id="map"></div>
          </div>

      </div>
 </section>
 <script type="text/javascript">
  $('.progress').hide();
   $('#dataform').on('submit',function(e){
        e.preventDefault();
         $('.progress').show();
        let formdata = new FormData();
        let uploadfile = $('#gambar').prop('files')[0];
        let berita = true;
        let filegambar = $('#gambar').val();
        ext = filegambar.split('.').pop().toLowerCase();
        formdata.append('filegambar',uploadfile)
        formdata.append('judul',$('#judul').val());
        formdata.append('isiberita',$('#isiberita').val());
        formdata.append('berita',berita);
        if($('#judul').val()==''){
            $('#judulberita').html('<div class="alert alert-warning">Form Wajib diisi</div>');
        }else if($('#isiberita').val() == ''){
            $('#isi').html('<div class="alert alert-warning">Form Wajib diisi</div>');
        }else if($('#gambar').val()==''){
             $('#gambar1').html('<div class="alert alert-warning">Form Wajib diisi</div>');
        }else if(jQuery.inArray(ext,['png','jpg','jpeg']) == -1){ //jika bukan jpeg jpg png maka keluarkan ,-1 sebagai bukan
          $('#gambar1').html('<div class="alert alert-danger">Masukan Ekstensi Format Gambar</div>');
        }else if(uploadfile.size > 2000000 || uploadfile.fileSize > 2000000 ){
           $('#gambar1').html('<div class="alert alert-danger">Ukuran Gambar maksimal 2Mb</div>');
        }else{
          $.ajax({
              url: "<?= base_url('Controler_Portopolio2/ProsesInputBerita') ?>",
              method: "POST",
              data: formdata,
              contentType: false,
              processData: false,
              cache: false,
              beforeSend:function(){
               $('.progress-bar').width('100%');
               $('#kirim').html(`<div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>`);
              },
              uploadProgress: function(event, position, total, percentageComplete){
                $('#persen').html(percentageComplete+'%');
               // console.log(percentageComplete);
               $('.progress-bar').animate({
                width: percentageComplete + '%'
               }, {
                duration: 1000
               });
              },
              success:function(hasil){
                $('#loading').html('<div class="alert alert-success">Berhasil disimpan</div>');
                $('#judulberita').hide();
                $('#isi').hide();
                $('#gambar1').hide();
                $('#judul').val('');
                $('#isiberita').val('');
                $('#gambar').val('');
                $('.progress').hide();
                $('#kirim').text('Simpan Berita');

              } 

            });
      }
   });
 </script>