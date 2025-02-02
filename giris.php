<!-- Yönetici için kullanıcı bilgilerini gösteren erkan-->


<?php require 'baglanti.php'; ?>
<!DOCTYPE html>
<html>
<head>
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
<body>

<h1>Yönetici Paneli</h1>
<h2>Kullanıcı Bilgileri</h2>
<form action="index.php" method="post">
<button id="button-group"  onclick="çikis" ></b>ÇIKIŞ</button>
</form>

<table id="customers">
    <tr>
        <th>Kişi ID</th>
        <th>Kullanıcı Adı</th>
        <th>Şifre</th>
        <th>Ad-Soyad</th>
        <th>Telefon</th>
        <th>Email</th>
        
        
    </tr>
    <?php foreach ($db->query("SELECT * FROM kullanicilar, kisiler WHERE kullanicilar.kisi_id = kisiler.kisi_id ORDER BY kullanicilar.kisi_id ")->fetchAll(PDO::FETCH_ASSOC) as $row) { ?>
        <tr>
            <td><?php echo $row['kisi_id']; ?></td>
            
            <td><?php echo $row['kullanici_adi']; ?></td>
            
            <td><?php echo $row['sifre']; ?></td>
            
            <td><?php echo $row['ad'] . ' ' . $row['soyad']; ?></td>
            
            <td><?php echo $row['telefon']; ?></td>
            
            <td><?php echo $row['email']; ?></td>
        </tr>
    <?php } ?>
</table>


<h2> Sefer Bilgileri</h2>
<table id="customers">
    <tr>
        <th>Sefer ID</th>
        <th>Nereden</th>
        <th>Nereye</th>
        <th>Kalkış Saati</th>
        <th>Fiyat</th>
        <th>Boş Koltuk Sayısı</th>
        <th>Sefer Sil</th>
    </tr>
    <?php foreach ($db->query("SELECT * FROM seferler ORDER BY sefer_id")->fetchAll(PDO::FETCH_ASSOC) as $sefer) { ?>
        <tr>
            <td><?php echo $sefer['sefer_id']; ?></td>
            
            <td><?php echo $sefer['kalkis_noktasi']; ?><button onclick="editSefer('Kalkış Noktası', <?php echo $sefer['sefer_id'];?>, '<?php echo $sefer['kalkis_noktasi'];?>')">Düzenle</button></td>
            
            <td><?php echo $sefer['varis_noktasi']; ?><button onclick="editSefer('Varış Noktası', <?php echo $sefer['sefer_id'];?>, '<?php echo $sefer['varis_noktasi'];?>')">Düzenle</button></td>
            
            <td><?php echo $sefer['kalkis_saati']; ?><button onclick="editSefer('Kalkış Saati', <?php echo $sefer['sefer_id'];?>, '<?php echo $sefer['kalkis_saati'];?>')">Düzenle</button></td>
            
            <td><?php echo $sefer['fiyat']; ?><button onclick="editSefer('Fiyat', <?php echo $sefer['sefer_id'];?>, '<?php echo $sefer['fiyat'];?>')">Düzenle</button></td>
            
            <td><?php echo $sefer['bos_koltuk_sayisi']; ?></td>
            <td><div onclick="deleteSefer(<?php echo $sefer['sefer_id'];?>)">Sil</div></td>
            
        </tr>
    <?php } ?>
</table>
    
<script>
    // JavaScript fonksiyonları buraya gelecek

    function editRow(field, kisiId, currentValue) {
        var newValue = prompt(`Yeni ${field}:`, currentValue);
    }
    
    function editSefer(field, seferID, currentValue) {
        var newValue = prompt(`Yeni ${field}:`, currentValue);
    }
    
    
    function deleteSefer(seferID) {
    var confirmation = confirm(seferID + " no'lu seferi silmek istediğinizden emin misiniz?");
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        var url = 'delete_sefer.php';

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Silme işlemi başarılı olduğunda yapılacaklar
                    location.reload(); // Sayfayı yenile
                } else {
                    // Hata durumunda kullanıcıya bildirim gösterilebilir
                    alert('Sefer silinemedi.');
                }
            }
        };

        xhr.send("sefer_id=" + seferID); // Veriyi sefer_id üzerinden gönder
    }
}


</script>
    
</body>
</html>
