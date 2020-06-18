 
  <section class="ftco-section">
          <div class="container mt-5">
            <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span>Deskripsi</span>
              <h2>Deskripsi </h2>
            </div>
          </div>
          Hasil Deskripsi : <br>
    <p id="contoh"></p>
    <br>
    <div class="form-group">
        <textarea name="teks" id="teks" cols="30" rows="7" class="form-control" placeholder="isi ... ">
        </textarea>
          <span id="isi"></span>
    </div>
   <!--  <input type="text" name="teks" id="teks" autofocus> -->

   <div class="form-group">
        <button id="deskripsi">Deskripsi</button>
   </div>
  </div>
  </section>    
<script>
    $('#deskripsi').click(function(){
        var huruf = $('#teks').val().toLowerCase();
        $('#teks').val('');        
        var hurufs = [];
        var space = ' ';
    // string jadi array
        var convert = huruf.split("");  
       //$('#contoh').html(convert[0]);
       for(var i=0; i<huruf.length; i++){
            if(convert[i] == 'b'){
                hurufs[i]= 'a';
            }else if(convert[i] == 'c'){
                hurufs[i]= 'b';
            }else if(convert[i] == 'd'){
                hurufs[i]= 'c';
            }else if(convert[i] == 'e'){
                hurufs[i]= 'd';
            }else if(convert[i] == 'f'){
                hurufs[i]= 'e';
            }else if(convert[i] == 'g'){
                hurufs[i]= 'f';
            }else if(convert[i] == 'h'){
                hurufs[i]= 'g';
            }else if(convert[i] == 'i'){
                hurufs[i]= 'h';
            }else if(convert[i] == 'j'){
                hurufs[i]= 'i';
            }else if(convert[i] == 'k'){
                hurufs[i]= 'j';
            }else if(convert[i] == 'l'){
                hurufs[i]= 'k';
            }else if(convert[i] == 'm'){
                hurufs[i]= 'l';
            }else if(convert[i] == 'n'){
                hurufs[i]= 'm';
            }else if(convert[i] == 'o'){
                hurufs[i]= 'n';
            }else if(convert[i] == 'p'){
                hurufs[i]= 'o';
            }else if(convert[i] == 'q'){
                hurufs[i]= 'p';
            }else if(convert[i] == 'r'){
                hurufs[i]= 'q';
            }else if(convert[i] == 's'){
                hurufs[i]= 'r';
            }else if(convert[i] == 't'){
                hurufs[i]= 's';
            }else if(convert[i] == 'u'){
                hurufs[i]= 't';
            }else if(convert[i] == 'v'){
                hurufs[i]= 'u';
            }else if(convert[i] == 'w'){
                hurufs[i]= 'v';
            }else if(convert[i] == 'x'){
                hurufs[i]= 'w';
            }else if(convert[i] == 'y'){
                hurufs[i]= 'x';
            }else if(convert[i] == 'z'){
                hurufs[i]= 'Y';
            }else if(convert[i] == 'a'){
                hurufs[i]= 'z';
            }else if(convert[i] == space){
                hurufs[i]= space;
            }else{
                hurufs= 'tidak valid!';
            }

            $('#contoh').html(hurufs);
       }

    });
    
</script>


    