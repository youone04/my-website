#instalasi framework dan koneksi database

1.langkah langkah intsalasi framework, kami disini menggunakan framework codeigniter 

Step 1: Download file Codeigniter
Silahkan klik link https://codeigniter.com/ lalu download framework codeigniter.

Step 2: Ekstrak dan Install Codeigniter Framework
Setelah file di download maka anda akan mendapatkan sebuah file  CodeIgniter dalam bentuk ZIP, silahkan ekstrak file tersebut ,setelah itu akan muncul folder  CodeIgniter. kemudian letakan folder tersebut ke folder root anda, yaitu di htdocs untuk sistem operasi windows, sedangkan linux di folder www/htm.

Step 3: Konfigurasi Base URL Codeigniter
Setelah  selesai melakukan instalasi codeigniter maka selanjutkan melakukan konfigurasi base url yang terdapat di folder application/config/config.php silahkan anda buka dengan teks editor yang anda sukai. Lalu pada bagian kode dibawah ini:

$config['base_url'] = '';
Ubahlah menjadi dibawah ini:
$config['base_url'] = 'http://localhost/' (sesuaikan dengan nama folder);

Step 4: Selesai
Setelah semua sudah dilakukan sesuai dengan instruksi diatas silahkan buka browser dan ketikan url http://localhost/, (menyesuaikan dengan nama) jika berhasil akan keluar tampilan wecome codeigniter


#koneksi basis data
step 1 : untuk melakukan koneksi basis data, silahkan buka folder application dan buka file database.php
step 2: setelah itu akan tampil kode seperti dibawah ini :


$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'tubes_web',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
step 3: kemudian isi 'hostname','username','database' ( database disini sesuaikan dengan nama databse anda) selesai, silahkan jalankan database anda

#cara kerja ajx

1.Permintaan (request) HTTP dikirimkan dari web browser ke server.
2.server menerima, dan kemudian, mengambil data.
3.Server mengirimkan data yang diminta ke web browser.
4.Web browser menerima data dan mereload halaman untuk menampilkan data.
5.Selama proses ini berlangsung, user tidak punya pilihan selain menunggu sampai keseluruhan proses berakhir. Tak hanya membuang-buang waktu, konsep konvensional juga memberikan loading yang tidak perlu ke server.
