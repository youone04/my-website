<br><br><br><br>
<div class="container">
</div>
	<div class="row">
          <div class="card-body">
			<div class="form-group">
				<label>Nama :</label>
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama ...">
				<small id="pesan-nama"></small>
			</div>

			<div class="form-group">
				<label>Password : </label>
				<input type="Password" name="Password" id="password" class="form-control" placeholder="password...">
				<small id="pesan-password"></small>
			</div>

			<!-- <div class="form-group"> -->
				<button class="btn btn-primary" id="login">LOGIN</button>
				<span id="login-gagal"></span>
			<!-- </div> -->
		 </div>
	</div>

</div>
 <script type="text/javascript">
  
	  $('#login').click(function(){
	    let nama = $('#nama').val();
	    let password = $('#password').val();
	    let login = $('#login');
	    login = true;

	    if(nama==''){
	    	$('#pesan-nama').html('<div class="alert alert-warning"> Isi Form!</div>');

	    }else if(password == ''){
	    	$('#pesan-password').html('<div class="alert alert-warning"> Isi Form!</div>');
	    }else{	   
		   	$.ajax({
		   		url: 'ProsesLogin',
		   		method: 'POST',
		   		dataType: 'json',
		   		data:{nama:nama,password:password,login:login},
		   		beforeSend:function(a,b){
		   			console.log(a);
		   			$('#login').html(`
								<div class="spinner-border text-primary" role="status">
								  <span class="sr-only">Loading...</span>
								</div>`);
		   		},
		   		error:function(jqXHR,textStatus,errorThrown){
		   			$('#nama').val('');
		   			 $('#password').val('');
		   			$('#login').text('LOGIN');
		   			//alert(jqXHR.status);
		   			console.log(jqXHR.status);
		   			if(jqXHR.status==404){
		   				$('#login-gagal').html(jqXHR.statusText + ' ,Cek Koneksi Anda');
		   			}else if(jqXHR.status==500){
		   				$('#login-gagal').html(errorThrown);	
		   			}
		   		},
		   		success:function(response){
		   			//console.log(response);
		   			if(response.error){
		   				$('#login-gagal').html(response.pesan);
		   				$('#login').text('Login');
		   			}else{
		   				window.location.href = '<?= base_url("Controler_Portopolio/Ds_admin") ?>';
		   			}
		   		}
		   	});
		   }

	  });


</script>
