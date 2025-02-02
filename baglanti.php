<?php 
    $dsn = 'pgsql:host=localhost;dbname=proje';
    $username = 'postgres';
    $password = '1023';

    try {
        $db = new PDO($dsn, $username, $password);
        
    } catch (PDOException $e) {
        echo 'Bağlantı hatası: ' . $e->getMessage();
    }
    ?>

