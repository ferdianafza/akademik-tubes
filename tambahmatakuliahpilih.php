<?php 
  $koneksi = mysqli_connect("localhost", "root", "", "akademik") or die("Gagal Koneksi Database");

    $selectedMatakuliah = $_POST['matakuliah'];
    $selectedNid = $_POST['nid'];
    $nim = $_POST['nim'];

    // for($i = 0; $i < count($selectedMatakuliah); $i++){
    //   echo "Kode matkul".$selectedMatakuliah[$i];
    //   echo "<br/>";
    //   echo "nid: ".$selectedNid[$i];
    //   echo "<br/>";
    //   echo "nim: ".$nim[$i];
    //   echo "<br/>";
    //   // $selectnid = $selectedNid[$i];
    //   //   $insert = mysqli_query($koneksi,"INSERT INTO matakuliahdiambil (`kode_matakuliah`, `nim`, `nid`)
    //   //                                   VALUES ('$selectedMatakuliah[$i]', '$nim[$i]', '$selectnid')");

    // }
    // foreach ($selectedNid as $index => $nid) {
    // $kodenid = $selectedNid[$index];
    
    // echo "NID: " . $nid;
    // echo "<br/>";
    
    // $insert = mysqli_query($koneksi, "INSERT INTO matakuliahdiambil (`kode_matakuliah`, `nim`, `nid`)
    //                                   VALUES ('$kode_matakuliah', '$nim[$index]', '$kodenid')");
  // }

    foreach ($selectedMatakuliah as $index => $kode_matakuliah) {
    // $kodenid = $selectedNid[$index];
    
       $query = "SELECT * FROM matakuliah WHERE kode_matakuliah = $kode_matakuliah";
      $data = mysqli_query($koneksi,$query) or die("Gagal query:".$query);
      while ($v=mysqli_fetch_array($data)):;
        $dosen = $v["dosen_pengampu"];
        $insert = mysqli_query($koneksi, "INSERT INTO matakuliahdiambil (`kode_matakuliah`, `nim`, `nid`)
                                      VALUES ('$kode_matakuliah', '$nim[$index]', '$dosen')");
      endwhile;

    // echo "nid: " . $kodenid;
    // echo "<br/>";
    // echo "nim: " . $nim[$index];
    // echo "<br/>";
    
  }



    if($insert){
        header("location:index.php");
    }


  header("location:index.php");
?>

