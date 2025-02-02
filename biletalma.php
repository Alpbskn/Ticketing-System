<!-- Giriş yapıldıktan sonraki Bilet Alma ekranı-->
<?php require 'baglanti.php'; 
?>
<html lang="tr"><head>
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
                  <h2>Bilet Alma Ekranı</h2>
               </div>   
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
         <form class="form-container" action="girisliseferlist.php" method="post">
            <div style="display : block;">
               <label style="font-size: 22px;" for="nereden">Nereden?</label>
               <select style="width: 150px; height: 45px; margin-left: 8px; font-size: 20px; font-weight: 400; " name="nereden" id="nereden">
                     <?php
                     $query = "SELECT DISTINCT kalkis_noktasi FROM seferler ORDER BY kalkis_noktasi " ; 
                     $result = $db->query($query);

                     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['kalkis_noktasi'] . "'>" . $row['kalkis_noktasi'] . "</option>";
                     }
                     ?>
               </select>
            </div>
            <div style="display : block;">
               <label style="font-size: 22px;" for="nereye">Nereye?</label>
               <select style="width: 150px; height: 45px; margin-left: 8px; font-size: 20px; font-weight: 400; " name="nereye" id="nereye">
                     <?php
                     $query = "SELECT DISTINCT varis_noktasi FROM seferler ORDER BY varis_noktasi "; 
                     $result = $db->query($query);

                     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row['varis_noktasi'] . "'>" . $row['varis_noktasi'] . "</option>";
                     }
                     ?>
               </select>
            </div>
             <input style=" width: 90px; height: 45px;" type="submit" value="Sefer Ara">
                   
         </form>

         </div> 
      </div>     
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

</body></html>