<?php
require 'baglanti.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteUser = $_POST['kullanici_adi'];

    // Sefer silme sorgusu
    $query = "DELETE FROM kullanicilar WHERE kullanici_adi = :kullanici";
    $statement = $db->prepare($query);
    $statement->bindParam(':kullanici', $deleteUser);
    // Sorguyu çalıştırma
    $result = $statement->execute();

    if ($result) {
        echo "Sefer başarıyla silindi!";
    } else {
        echo "Sefer silme işlemi başarısız!";
    }
}
?>
