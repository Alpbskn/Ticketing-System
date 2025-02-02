<?php
                       require 'baglanti.php'; 
                        session_start();
                        $mesaj1 = "";
                        $mesaj2 = "";
                       if (!empty($_POST['usernamee']) && !empty($_POST['passwordd'])){
                            $username = $_POST['usernamee'];
                            $password = $_POST['passwordd'];

                            // Kullanıcı adını ve şifreyi veritabanından kontrol et
                            $checkUserQuery = "SELECT COUNT(*) FROM kullanicilar WHERE kullanici_adi = :usernamee";
                            $userStatement = $db->prepare($checkUserQuery);
                            $userStatement->bindParam(':usernamee', $username);
                            $userStatement->execute();
                            $userExists = $userStatement->fetchColumn();
                            
                            if ($userExists) 
                            {
                            // Kullanıcı adı var, şifreyi kontrol et
                            $checkPasswordQuery = "SELECT COUNT(*) FROM kullanicilar WHERE kullanici_adi = :usernamee AND sifre = :passwordd";
                            $passwordStatement = $db->prepare($checkPasswordQuery);
                            $passwordStatement->bindParam(':usernamee', $username);
                            $passwordStatement->bindParam(':passwordd', $password);
                            $passwordStatement->execute();
                            $passwordMatch = $passwordStatement->fetchColumn();

                            if (!$passwordMatch) 
                              {
                                $mesaj1 = "Hatalı kullanıcı adı veya şifre.";// Şifre yanlış, hata mesajı göster
                                
                              }
                            else
                              {
                                // Giriş işlemi başarılı olduğunda
                                // Kullanıcı adını ve/veya kisi_id gibi bilgileri oturumda saklayabilirsiniz
                                $_SESSION["user"] = $username;
                                header("location: hesabim.php");
                              }
                            }
                           else
                           {
                            $mesaj2 = "Lütfen önce kayıt olunuz.";
                           }
                        }
                        ?>
<!-- Giriş yapma Ve kayıt olma ekranı-->
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
                              <a class="nav-link" href="panelgirisi.php"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Yönetici Girişi</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header -->
  
   <div class="footer">
      <div class="banner-footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>Giriş Yap</h2>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="titlepage">
                     <h2>Kayıt Ol</h2>
                  </div>
               </div>
               <div class="col-md-6">
                  <form id="request" method="post" class="main_form" >
                     <div class="row">
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Kullanıcı adı" type="type" name="usernamee"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Şifre" type="password" name="passwordd"> 
                        </div>
                        
                        
                        <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <button class="send_btn">Giriş</button>
                        </div>
                         <p><?php echo $mesaj1 ?></p>
                         <p><?php echo $mesaj2 ?></p>
                     </div>
                    
                       
                        
                
                   </form>
               </div>
               <div class="col-md-6">
                  <form id="request" method="post" class="main_form" >
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Kullanıcı adı" type="type" name="username"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Şifre" type="password" name="password">
                        </div>
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Ad" type="type" name="name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Soyad" type="type" name="surname"> 
                        </div>
                         <div class="col-md-12 ">
                           <input class="contactus" placeholder="Telefon no" type="type" name="phone"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="E-Mail" type="type" name="email"> 
                        </div>
                        </div>
                        <div class="col-sm-col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <button class="send_btn">Kayıt Ol</button>
                        </div>
                        
                     </div>
                        <?php
                        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $name = $_POST['name'];
                            $surname = $_POST['surname'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            

                            // Kullanıcı adının varlığını kontrol et
                            $checkUsernameQuery = "SELECT COUNT(*) FROM kullanicilar WHERE kullanici_adi = :username";
                            $checkStatement = $db->prepare($checkUsernameQuery);
                            $checkStatement->bindParam(':username', $username);
                            $checkStatement->execute();
                            $result = $checkStatement->fetchColumn();

                            if ($result > 0) {
                                echo "Bu kullanıcı adı zaten kullanımda, lütfen başka bir kullanıcı adı seçin.";
                            } else {
                                // Kullanıcılar tablosuna ekleme işlemi
                                $insertUserQuery = "INSERT INTO kullanicilar (kullanici_adi, sifre) VALUES (:username, :password)";
                                $userStatement = $db->prepare($insertUserQuery);
                                $userStatement->bindParam(':username', $username);
                                $userStatement->bindParam(':password', $password);
                                $userStatement->execute();
                                $query = "INSERT INTO kisiler (ad, soyad, telefon, email) VALUES(:name, :surname, :phone, :email)";
                                $personStatement = $db->prepare($query);
                                $personStatement->bindParam(':name', $name);
                                $personStatement->bindParam(':surname', $surname);
                                $personStatement->bindParam(':phone', $phone);
                                $personStatement->bindParam(':email', $email);
                                $personStatement->execute();
                                echo "Kayıt başarıyla oluşturuldu.";
                                // web sayfası %80 boyutunda çalışırsa gözüküyo. 
                            }
                            }
                        ?>
                  </form>
               </div>
            </div>
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