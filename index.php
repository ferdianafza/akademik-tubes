<?php 
// $koneksi =mysqli_connect("localhost","root", "", "akademik") or die("Gagal koneksi ke Database");
$host = "us-cdbr-east-06.cleardb.net";
$user = "b7976c5d537010";
$pass = "e9865089";
$name = "heroku_8aaa86990959389";
// $host = "localhost";
// $user = "root";
// $pass = "";
// $name = "akademik";

$koneksi = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal");
mysqli_select_db($conn, $name) or die('Database is not found!');
  
session_start();
    function isUserLoggedIn() {
    return isset($_SESSION['nim']);
}

if (isUserLoggedIn()) {
      
    } else {
      header("Location: login.php");
      exit;
    }
$nama = $_SESSION["nama"];
$email = $_SESSION["email"];
$nim = $_SESSION["nim"];

$sql = "SELECT * FROM matakuliah";
$result = $koneksi->query($sql);

// Prepare matakuliah options array
$matakuliahOptions = array();
while ($row = $result->fetch_assoc()) {
  $matakuliahOptions[$row['kode_matakuliah']] = $row['nama_matakuliah'];
}

// Handle form submission
// if (isset($_POST["submit"])) {
//   // Get the selected matakuliah options
//   $selectedMatakuliah = $_POST["matakuliah"];
//   $nim = $_POST["nim"];
//   $nid = $_POST["nid"];

//   // Prepare the INSERT statement
//   $sql = "INSERT INTO matakuliahdiambil (kode_matakuliah, nim, nid) VALUES (?, ?, ?)";
//   $stmt = $koneksi->prepare($sql);

//   // Bind parameters and execute the statement for each selected matakuliah
//   foreach ($selectedMatakuliah as $kode_matakuliah) {
//     $stmt->bind_param("sss", $kode_matakuliah, $nim, $nid);
//     if ($stmt->execute()) {
      
//     } else {
      
//     }
//   }

//   // Close the statement
//   $stmt->close();
// }

// $koneksi->close();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Akademik Unjani</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #f4511e; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #f4511e;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><img src="image/logonav.png" style="width: 30px; height: 30px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#matakuliahsaya">KRS</a></li>
        <li><a href="#pilihmatakuliah">Pilih Matakuliah</a></li>
        <li><a href="#tagihanpembayaran">Tagihan</a></li>
        <li><a href=""><?php echo $nim."-";?><?php echo $nama;?></a></li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- <div class="jumbotron text-center">
  <h1>Company</h1> 
  <p>We specialize in blablabla</p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div> -->

<!-- Container (About Section) -->
<div id="matakuliahsaya" class="container-fluid">
  <div class="row">
   <table class="table" border="2" >
   	<center><h2>MATAKULIAH YANG DIAMBIL</h2></center>
   	<th scope="col" style="background-color: yellow;" >Kode Matakuliah</th>
   	<th scope="col" style="background-color: yellow;" >Nama Matakuliah</th>
   	<th scope="col" style="background-color: yellow;">SKS</th>
   	<th scope="col"style="background-color: yellow;">Dosen Pengampu</th>
   	<th scope="col"style="background-color: yellow;">Aksi</th>
   	<?php 
	            $query = "SELECT id_matakuliahdiambil, m.kode_matakuliah, m.nama_matakuliah, m.sks, d.nama AS dosen_pengampu
					        FROM matakuliahdiambil md
					        JOIN matakuliah m ON md.kode_matakuliah = m.kode_matakuliah
					        JOIN dosen d ON m.dosen_pengampu = d.nid
					        WHERE md.nim = '$nim'";
	            $listMatakuliah = mysqli_query($koneksi,$query) or die("Gagal query:".$query);
	          	?>
	          	<?php foreach ($listMatakuliah as $matakuliah): ?>
	          		<tr>
	          			<td><?php echo $matakuliah['kode_matakuliah']; ?></td>	
	          			<td><?php echo $matakuliah['nama_matakuliah']; ?></td>	
			            <td><?php echo $matakuliah['sks']." sks"; ?></td>
			            <td><?php echo $matakuliah['dosen_pengampu']; ?></td>
			            <td><a href="hapusmatkulpilihan.php?id_matakuliahdiambil=<?php echo $matakuliah['id_matakuliahdiambil'];?>" class="btn btn-danger">Hapus</a></td>
			            <br />
	          		</tr>
          	<?php endforeach; ?>
          	<br>
   	
   </table>
  </div>
</div>

<?php
// if (isset($_POST['submit'])) {
//     $selectedMatakuliah = $_POST['matakuliah'];
//     $selectedNid = $_POST['nid'];
//     $nim = $_POST['nim'];

//     for($i = 0; $i < sizeof($selectedMatakuliah); $i++){
//         echo "Kode Matakuliah: " . $selectedMatakuliah[$i]. "<br>";
//         echo "NID Dosen: " . $selectedNid[$i] . "<br>";
//         echo "nim: " . $nim[$i] . "<br>";
//     }
// }
?>
<div id="pilihmatakuliah" class="container-fluid">
  <div class="row">
       <form method="post" action="tambahmatakuliahpilih.php" >
       		<table class="table" border="2">
       			<center><h2>PILIH MATAKULIAH</h2></center>
       			<th scope="col" style="background-color: yellow;">Pilih</th>
       			<th scope="col" style="background-color: yellow;">Kode Matakuliah</th>
       			<th scope="col" style="background-color: yellow;">Nama Matakuliah</th>
       			<th scope="col" style="background-color: yellow;">SKS</th>
       			<th scope="col" style="background-color: yellow;">Dosen Pengampu</th>
		    	<?php 
	            $query = "SELECT m.kode_matakuliah, m.nama_matakuliah, m.sks, d.nid, d.nama AS dosen_pengampu
				        FROM matakuliah m
				        JOIN dosen d ON m.dosen_pengampu = d.nid
				        WHERE m.kode_matakuliah NOT IN (
				          SELECT kode_matakuliah FROM matakuliahdiambil WHERE nim = '$nim'
				        )";
	            $listMatakuliah = mysqli_query($koneksi,$query) or die("Gagal query:".$query);
	          	?>
	          	<?php foreach ($listMatakuliah as $matakuliah): ?>
	          		<tr>
	          			<td>
			            	<input type="checkbox" name="matakuliah[]" value="<?php echo $matakuliah['kode_matakuliah']; ?>">
			            	<input type="text" name="nim[]" value="<?php echo $nim; ?>" hidden >
			            	<input type="text" name="nid[]" value="<?php echo $matakuliah['nid']; ?>" hidden >
	          			</td>
	          			<td><?php echo $matakuliah['kode_matakuliah']; ?></td>	
	          			<td><?php echo $matakuliah['nama_matakuliah']; ?></td>	
			            <td><?php echo $matakuliah['sks']." sks"; ?></td>
			            <td><?php echo $matakuliah['dosen_pengampu']; ?></td>
			            <br />
	          		</tr>
          	<?php endforeach; ?>
          	<br>
       		</table>
       		<?php if (mysqli_num_rows($listMatakuliah) != 0): ?>
	    		<input class="btn btn-primary" type="submit" name="submit" value="Simpan">
	    	<?php endif; ?>
	  	</form>
  </div>
</div>

<div id="tagihanpembayaran" class="container-fluid">
  <div class="row">
       <table class="table" border="2">
  <center><h2>Tagihan Biaya</h2></center>
  <tr>
    <th scope="col" style="background-color: yellow;">Kode Matakuliah</th>
    <th scope="col" style="background-color: yellow;">Nama Matakuliah</th>
    <th scope="col" style="background-color: yellow;">SKS</th>
    <th scope="col" style="background-color: yellow;">Biaya</th>
  </tr>
  <?php 
  $query = "SELECT m.kode_matakuliah, m.nama_matakuliah, m.sks, d.nid, d.nama AS dosen_pengampu
            FROM matakuliahdiambil md
            JOIN matakuliah m ON md.kode_matakuliah = m.kode_matakuliah
            JOIN dosen d ON m.dosen_pengampu = d.nid
            WHERE md.nim = '$nim'";
  $listMatakuliah = mysqli_query($koneksi, $query) or die("Gagal query:" . $query);
  $totalBiaya = 0; // Initialize total cost variable
  $totalSKS = 0; // Initialize total SKS variable
  $totalMatakuliah = mysqli_num_rows($listMatakuliah); // Get the total number of courses taken
  ?>
  <?php foreach ($listMatakuliah as $matakuliah): ?>
    <tr>
      <td><?php echo $matakuliah['kode_matakuliah']; ?></td>
      <td><?php echo $matakuliah['nama_matakuliah']; ?></td>
      <td><?php echo $matakuliah['sks']; ?></td>
      <?php
      $biaya = $matakuliah['sks'] * 60000; // Calculate the cost for the current course
      $totalBiaya += $biaya; // Add the current course's cost to the total cost
      $totalSKS += $matakuliah['sks']; // Add the current course's SKS to the total SKS
      ?>
      <td><?php echo 'Rp ' . number_format($biaya, 0, ',', '.'); ?></td>
    </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="2"><strong>Total SKS:</strong></td>
    <td><?php echo $totalSKS; ?></td>
    <td rowspan="2" style="text-align: left; vertical-align: bottom;"><strong>Total Biaya:</strong> <?php echo 'Rp ' . number_format($totalBiaya, 0, ',', '.'); ?></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Total Matakuliah Diambil:</strong></td>
    <td colspan="2"><?php echo $totalMatakuliah; ?></td>
  </tr>
</table>

  </div>
</div>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
