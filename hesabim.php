<!-- Giriş yapıldıktan sonra hesap bilgilerinni gösteren ekran -->
<?php require 'baglanti.php'; 
 session_start();?>
<html lang="tr">
    <head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>BiBilet</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif">
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        color: black;
        font-weight: 600;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-last-of-type(even){background-color: #ffffff;}
      
      #customers tr:nth-child(even) {background-color: #ffffff;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #656565;
        color: white;
      }
        
        #button-group {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            height: 20px;
        }
    </style>
</head>
<!-- body -->
<body class="main-layout">
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a>BiBilet</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
               
                           <li class="nav-item">
                              <a class="nav-link" href="biletalma.php">Bilet Al</a>
                           </li>
                           
                           <li class="nav-item">
                              <a class="nav-link" href="index.php"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Çıkış Yap</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <!-- three_box -->
   <div class="banner-main">
      <div class="container" style="padding-top: 150px">
         <p style="text-align: center;color: #ffffff;font-size:45px;font-weight: 600; padding-bottom: 50px">HESABIM</p>
      </div>

    
   <div class="container" style="padding-top: 35px;">
     <p style="text-align: center;color: #ffffff;font-size:25px;font-weight: 600; padding-bottom:5px;">Bilgilerim</p>
       </div>
    <table id="customers">
        <tr>
            <th>Kisi ID</th>
            <th>Kullanıcı Adı</th>
            <th>Ad-Soyad</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Şifre Değiştir</th>
        </tr>
        <?php 
        $oturum = $_SESSION["user"];
        
        foreach ($db->query("SELECT * FROM kullanicilar 
          INNER JOIN kisiler ON kullanicilar.kisi_id = kisiler.kisi_id 
          WHERE kullanicilar.kullanici_adi = '$oturum'")->fetchAll(PDO::FETCH_ASSOC) as $row)
            ?><tr>
                <td><?php echo $row['kisi_id']; ?></td>
                <td><?php echo $row['kullanici_adi']; ?></td>
                <td><?php echo $row['ad'] . ' ' . $row['soyad'];?></td>
                <td><?php echo $row['telefon']; ?></td>
                <td><?php echo $row['email']; ?></td>
                 <td>
                <div id="editSection_<?php echo $row['kisi_id']; ?>">
                    <button onclick="editRow(<?php echo $row['kisi_id']; ?>, '<?php echo $row['sifre']; ?>')">Düzenle</button>
                </div>
            </td>
        </tr>
            
    </table>
    <div class="container" style="padding-top: 35px;">
         <p style="text-align: center;color: #ffffff;font-size:25px;font-weight: 600; padding-bottom:5px;">Biletlerim</p>
      </div>
       <table id="customers">
        <tr>
            <th>Bilet No</th>
            <th>Kişi ID</th>
            <th>Sefer Numarası</th>
            <th>Rezervasyon Tarihi</th>
            <th>Koltuk No</th>

        </tr>
        <?php               
               // Şehir seçimlerine göre sorgulama yap
               $query = "SELECT b.* FROM biletler b JOIN kullanicilar k ON b.kisi_id = k.kisi_id WHERE k.kullanici_adi = '$oturum'";
               $statement = $db->prepare($query);
               $statement->execute();
               $biletler = $statement->fetchAll(PDO::FETCH_ASSOC);
               if(count($biletler)>0){
               foreach ($biletler as $bilet)
                   ?>
                        <tr>
                           <td><?php echo $bilet['bilet_no']; ?></td>
                           <td><?php echo $bilet['kisi_id']; ?></td>
                           <td><?php echo $bilet['sefer_id']; ?></td>
                           <td><?php echo $bilet['rezervasyon_tarihi']; ?></td>
                           <td><?php echo $bilet['koltuk_no']; ?></td>
                        </tr>
           
                <?php            
               }
                else {
                    echo '<p style="margin-right: 50px;">Satın Alınan Bilet Bulunamadı.</p>';
                }
            
            ?>    
     </table>
 </div>
   
   <!--  footer -->
   <footer id="contact">
      <div class="footer"> 
         <div class="copyright">
            <div class="container">
                                   <div class="col-md-12" style="font-style: italic;">
                      <p>BiBilet Hayırlı Yolculuklar Diler.</p>
                   </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->

    
<script>
    function editRow(kisiId, currentPassword) {
        var editSection = document.getElementById(`editSection_${kisiId}`);
        editSection.innerHTML = `
            <form action="hesabim.php" method="POST">
                <input type="hidden" name="kisi_id" value="${kisiId}">
                <input type="password" name="new_password" placeholder="Yeni şifre">
                <input type="submit" value="Kaydet">
            </form>
        `;
    }
</script>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kisi_id = $_POST['kisi_id'];
    $new_password = $_POST['new_password'];

    // Güncelleme sorgusu
    $query = "UPDATE kullanicilar SET sifre = :new_password WHERE kisi_id = :kisi_id";
    $statement = $db->prepare($query);
    $statement->bindParam(':new_password', $new_password);
    $statement->bindParam(':kisi_id', $kisi_id);

    // Sorguyu çalıştırma
    $result = $statement->execute();

    if ($result) {
        echo " Şifre başarıyla güncellendi!";
    } else {
        echo "<p> Şifre güncelleme işlemi başarısız!</p>";
    }
}
?>

 
</body>
</html>


