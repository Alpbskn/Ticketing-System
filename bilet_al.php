<?php
require 'baglanti.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$oturumm = $_SESSION["user"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $biletAl = $_POST['sefer_id'];

    // Sefer silme sorgusu
    $query = "INSERT INTO biletler (sefer_id , kisi_id ) VALUES (:sefer_id , $oturumm)";
    $statement = $db->prepare($query);
    $statement->bindParam(':sefer_id', $biletAl);
    // Sorguyu çalıştırma
    $result = $statement->execute();

    if ($result) {
        echo "Sefer başarıyla silindi!";
    } else {
        echo "Sefer silme işlemi başarısız!";
    }
}
?>
