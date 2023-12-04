<?php
session_start();
$username = $_SESSION["username"];
$foto = $_FILES["foto"];
$nama = $_POST["nama"];
$asal = $_POST["asal"];
$tipe = $_POST["tipe"];
$deskripsi = $_POST["deskripsi"];


$conn = new mysqli("localhost", "root", "", "crud - sim");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}

$uploadDir = "Sertif/";
// var_dump($foto);
if (isset($foto)) {
  // var_dump($_FILES["file"]["name"]);
  // Tangkap informasi file
  $fileName = basename($foto["name"]);
  $targetFilePath = $uploadDir . $fileName;
  $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

  // Periksa apakah file gambar
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (in_array($fileType, $allowTypes)) {
    // Pindahkan file ke direktori uploads
    if (move_uploaded_file($foto["tmp_name"], $targetFilePath)) {
      // Simpan informasi file ke database
      // $insertQuery = "INSERT INTO photos (filename) VALUES ('$fileName')";
      $query = "INSERT INTO sertifikat VALUES ('$username','$fileName','$nama', '$asal', '$tipe', '$deskripsi')";
      if ($conn->query($query) === TRUE) {
        header("location: Halaman2.php");
        
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
    } else {
      echo "Gagal mengunggah file.";
    }
  }
  // var_dump($fileType);
}

// $query = "INSERT INTO sertifikat(nama_sertifikat, asal_instansi, tipe_sertifikat, deskripsi) VALUES ('$nama', '$asal', '$tipe', '$deskripsi')";

// $conn -> query($query);

// $conn -> close();
// header('Location: Halaman2.php');
// exit();