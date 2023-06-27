<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "akademik";

$conn = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal");
mysqli_select_db($conn, $name) or die('Database is not found!');



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$row = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
    return $rows;
}

function registrasi($data) {
	global $conn;

	$nim = strtolower(stripslashes($data["nim"]));
	$nama = strtolower(stripslashes($data["nama"]));
	$jurusan = strtolower(stripslashes($data["jurusan"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);


    $sql = "SELECT nim FROM mahasiswa WHERE nim = '$nim'";
    $result = $conn->query($sql);
    
      if ( mysqli_fetch_assoc($result) ) {
      	   echo "<script>
      	         alert('nim sudah ada')
      	         </script>";
      	    return false;     
      }

	// cek konfirmasi password
	if ($password !== $konfirmasi_password) {
		echo "<script>
		        alert('konfirmasi password tidak sesuai!')
		      </script>";
		return false;      
      }


      $password = password_hash($password, PASSWORD_DEFAULT);

      // tambah user bari ke database
      $sql = "INSERT INTO mahasiswa VALUES('$nim', '$nama', '$jurusan', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			    
			} 

      return mysqli_affected_rows($conn);
      mysql_close($conn);
}

function registrasi_dosen($data) {
	global $conn;

	$nid = strtolower(stripslashes($data["nid"]));
	$nama = strtolower(stripslashes($data["nama"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);


    // cek username sudah ada atau belum
    $sql = "SELECT nid FROM dosen WHERE nid = '$nid'";
    $result = $conn->query($sql);
    
      if ( mysqli_fetch_assoc($result) ) {
      	   echo "<script>
      	         alert('nid sudah ada')
      	         </script>";
      	    return false;     
      }

	// cek konfirmasi password
	if ($password !== $konfirmasi_password) {
		echo "<script>
		        alert('konfirmasi password tidak sesuai!')
		      </script>";
		return false;      
      }


      $password = password_hash($password, PASSWORD_DEFAULT);

      // tambah user bari ke database
      $sql = "INSERT INTO dosen VALUES('$nid', '$nama', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			    
			} 

      return mysqli_affected_rows($conn);
      mysql_close($conn);
}

?>