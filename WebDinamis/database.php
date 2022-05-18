 <?php

$validForm = true;

$checker = array(0,0,0,0,0,0,0,0);

if(isset($_POST['kirim'])) {

	if(empty($_POST['nama'])) {
		echo 'Name is required' . '<br/>';
	} else{
		$nama = $_POST['nama'];
		$checker[0] = 1;
	}

	if(empty($_POST['tempat_lahir'])) {
		echo 'tempat_lahir is required' . '<br/>';
	} else{
		$tampat_lahir = $_POST['tempat_lahir'];
		$checker[1] = 1;
	}

	if(empty($_POST['tanggal_lahir'])) {
		echo 'tanggal_lahir is required' . '<br/>';
	} else{
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$checker[2] = 1;
	}

	if(empty($_POST['gender'])) {
		echo 'gender is required' . '<br/>';
	} else{
		$jenis_kelamin = $_POST['gender'];
		$checker[3] = 1;
	}

	if(empty($_POST['alamat'])) {
		echo 'alamat is required' . '<br/>';
	} else{
		$alamat = $_POST['alamat'];
		$checker[4] = 1;
	}

	if(empty($_POST['agama'])) {
		echo 'agama is required' . '<br/>';
	} else{
		$agama = $_POST['agama'];
		$checker[5] = 1;
	}

	if(empty($_POST['asal_sekolah'])) {
		echo 'asal_sekolah is required' . '<br/>';
	} else{
		$asal_sekolah = $_POST['asal_sekolah'];
		$checker[6] = 1;
	}

	if(empty($_POST['alamat_asal_sekolah'])) {
		echo 'alamat_asal_sekolah is required' . '<br/>';
	} else{
		$alamat_asal_sekolah = $_POST['alamat_asal_sekolah'];
		$checker[7] = 1;
	}


}


for ($i=0; $i < 8; $i++) { 
	if ($checker[$i] == 0) {
		$validForm = false;
		break;
	}
}

if($validForm == true) {
	new_pendaftaran($nama,$tampat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$agama,$asal_sekolah,$alamat_asal_sekolah);
}


function new_pendaftaran($nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$agama,$asal_sekolah,$alamat_asal_sekolah) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pwpb_webdinamis";

	$connect = new mysqli($servername, $username, $password, $dbname);

	if ($connect->connect_error) {
 		die("Connection failed: " . $connect->connect_error);
	}

	$sql = "INSERT INTO pendaftaran (id,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,agama,asal_sekolah, alamat_asal_sekolah) VALUES (NULL, '{$nama}', '{$tempat_lahir}', '{$tanggal_lahir}', '{$jenis_kelamin}', '{$alamat}', '{$agama}', '{$asal_sekolah}', '{$alamat_asal_sekolah}')";

	if ($connect->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $connect->error;
	}

	$connect->close();
}


?> 