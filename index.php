<!--Anasayfa Ekranı-->
<?php require 'baglanti.php'; ?>
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
                           <a href="index.php">BiBilet</a>
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
                              <a class="nav-link" href="seferler.php">Seferler</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="bilet.php">Bilet Al</a>
                           </li>
                           
                           <li class="nav-item">
                              <a class="nav-link" href="hesap.php"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Giriş Yap / Kayıt Ol</a>
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
         <p style="text-align: center;color: #ffffff;font-size:45px;font-weight: 600; padding-bottom: 50px">ANASAYFA</p>
   <div class="row">
            <div class="col-md-4">
               
               <div class="titlepage">
                  <a class="nav-link" href="seferler.php">SEFERLER</a>
               </div>
            
            </div>
            <div class="col-md-4">
               <div class="titlepage">
                  <a class="nav-link" href="bilet.php">BİLET AL</a>               
               </div>
            </div>
            <div class="col-md-4">
               <div class="titlepage">
                  <a class="nav-link" href="hesap.php">HESABIM</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<section class="banner_main">
      <div id="banner1"></div>
   </section>
   three_box -->
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

</body>
</html>


