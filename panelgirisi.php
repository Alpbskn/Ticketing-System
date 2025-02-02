<!-- Yönetici için giriş ekranı-->

<?php require 'baglanti.php'; ?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>   
    
    
    
</head>
<body>

<form style="max-width:500px;margin:auto" method="post">
  <h2>Yönetici Paneli</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" id="usn" placeholder="Kullanıcı Adı" name="usn">
    </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" id="pwd" placeholder="Şifre" name="pwd">
  </div>

  <button type="submit" class="btn">Giriş Yap</button>
    
     <?php
        if (isset($_POST['usn']) && isset($_POST['pwd'])) {
            $usn = $_POST['usn'];
            $pwd = $_POST['pwd'];
            
            $checkPasswordQuery = "SELECT COUNT(*) FROM yonetici WHERE yonetici_adi = :usn AND sifre = :pwd";
            $passwordStatement = $db->prepare($checkPasswordQuery);
            $passwordStatement->bindParam(':usn', $usn);
            $passwordStatement->bindParam(':pwd', $pwd);
            $passwordStatement->execute();
            $passwordMatch = $passwordStatement->fetchColumn();

            if (!$passwordMatch) {
                // Şifre yanlış, hata mesajı göster
                echo "Hatalı kullanıcı adı veya şifre.";
            } else {
                // Kullanıcı adı ve şifre eşleşiyor, giriş yap
                header("Location: giris.php");
                exit;
            }
        }
        ?>
    </form> 

</body>
</html>

