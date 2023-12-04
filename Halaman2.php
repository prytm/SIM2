<?php
$conn = new mysqli("localhost", "root", "", "crud - sim");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}

session_start();

$username = $_SESSION["username"];

$sql = "SELECT * FROM sertifikat where username = '$username'";
$result = $conn->query($sql);

// Associative array
// while ($row = $result->fetch_assoc()) {
//   echo $row["nama_sertifikat"];
//   echo $row["asal_instansi"];
//   echo $row["tipe_sertifikat"];
//   echo $row["deskripsi"];
// }

#nama_sertifikat, asal_instansi, tipe_sertifikat, deskripsi

// Free result set
// $result->free_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="2.css">
  <title>Halaman 2</title>
</head>

<body>
    <div class="navigation-pane">
        <div class="logo">
            <h1>Cloud<span class="biru">Cert</span></h1>
        </div>
        <div class="actions">
            <a href="formulir.php"><button>Add Certificate</button></a>
        </div>
    </div>
    <a style="text-decoration: none;" href="tugas.php"><h2 style="text-align: center; font-size:36px; font-weight: bold; margin-top: 80px;">CloudCert</h2></a>
    <section class="about-us">
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
          <img src="http://localhost/SIM/Sertif/<?=$row["image"]?>">
          <!-- <img src="https://th.bing.com/th/id/OIP.dbYv6F46DJdYZXySZ2RE2QHaE8?rs=1&pid=ImgDetMain"> -->
          <h2 style="text-align : center;"><?=$row["nama_sertifikat"]?></h2>
          <h4 style = "text-align : center;"><?=$row["asal_instansi"]?></h4>
          <p>Tipe Sertifikat : <span style="font-weight: bold;"><?=$row["tipe_sertifikat"]?></span></p>
          <p style="text-align: justify; margin: 2px;"><?=$row["deskripsi"]?><p>
          <button style="font-weight:bold; width:150px; height:30px; background-color:red; color:white; text-decoration: none; border-radius: 20px; text-align: center; border:none;"> Hapus Sertifikat</button>
        </div>
      <?php } ?>
      <!-- <div class="card">
        <img src="" alt="Nama Kedua">
        <h3>Vikri Haikal</h3>
        <p>Solok selatan</p>
      </div>
      <div class="card">
        <img src="" alt="Nama Ketiga">
        <h3>Prayuganingtyas E.S</h3>
        <p>Solo</p>
      </div>
      <div class="card">
        <img src="" alt="Nama Keempat">
        <h3>Nyoman Dyah Primasari</h3>
        <p>Bali</p>
      </div>
      <div class="card">
        <img src="" alt="Nama Kelima">
        <h3>Luna Citra Alifa</h3>
        <p>Solo</p>
      </div> -->
    </section>
  </div>
</body>

</html>