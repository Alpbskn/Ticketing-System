<!-- Giriş yapılmış Sefer listeleme ekranı-->
<?php
require 'baglanti.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
        $statement = $db->prepare($query);
        // Sorguyu çalıştırma
        $result = $statement->execute();*/
}
?>

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
                            <a class="nav-link" href="hesabim.php"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Hesabım</a>
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
    
     <!-- wedo  section -->
    <div class="banner-main">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <div class="titlepage">
                   <h2>Seferler</h2>
                </div>   
             </div>
          </div>
       </div>
       <table id="customers">
        <tr>
            <th>Sefer No</th>
            <th>Nereden?</th>
            <th>Nereye?</th>
            <th>Kalkış Saati</th>
            <th>Ücret</th>
            <th>Boş Koltuk</th>
            <th>Satın Al</th>
        </tr>
           <!--<?php 
            foreach($db->query("SELECT * FROM seferler")->fetchAll(PDO::FETCH_ASSOC) as $seferler)
            {
                echo "
                    <tr>
                        <td>$seferler[sefer_id]</td>
                        <td>$seferler[kalkis_noktasi]</td>
                        <td>$seferler[varis_noktasi]</td>
                        <td>$seferler[kalkis_saati]</td>
                        <td>$seferler[fiyat]</td>
                        <td>$seferler[bos_koltuk_sayisi]</td>
                    </tr>
                    ";
            }
           ?> -->
           <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $nereden = $_POST['nereden'];
               $nereye = $_POST['nereye'];

               // Şehir seçimlerine göre sorgulama yap
               $query = "SELECT * FROM seferler WHERE kalkis_noktasi = :nereden AND varis_noktasi = :nereye";
               $statement = $db->prepare($query);
               $statement->bindParam(':nereden', $nereden);
               $statement->bindParam(':nereye', $nereye);
               $statement->execute();
               $seferler = $statement->fetchAll(PDO::FETCH_ASSOC);
               if(count($seferler)>0){
               foreach ($seferler as $sefer)
                  echo "
                        <tr>
                           <td>$sefer[sefer_id]</td>
                           <td>$sefer[kalkis_noktasi]</td>
                           <td>$sefer[varis_noktasi]</td>
                           <td>$sefer[kalkis_saati]</td>
                           <td>$sefer[fiyat]</td>
                           <td>$sefer[bos_koltuk_sayisi]</td>
                           <td><button>Satın Al </button></td>
                        </tr>
                  ";            
               }
                else {
                    echo '<p style="margin-right: 50px;">Sefer Bulunamadı</p>';
                }
            }
            ?>
       
        </table>   
    </div>
     
     
    
    <!-- end wedo  section -->
   
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
 </body></html>