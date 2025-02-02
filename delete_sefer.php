<?php
require 'baglanti.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteSeferID = $_POST['sefer_id'];

    // Sefer silme sorgusu
    $query = "DELETE FROM seferler WHERE sefer_id = :sefer_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':sefer_id', $deleteSeferID);
    // Sorguyu çalıştırma
    $result = $statement->execute();

    if ($result) {
        echo "Sefer başarıyla silindi!";
    } else {
        echo "Sefer silme işlemi başarısız!";
    }
}
?>
