<?php
include 'kontrol.php';
include '../sistem/baglan.php';
session_start();
extract($_POST);
extract($_GET);

//admin panele giriş

if (isset($giris)) {

    $kadi = htmlspecialchars(trim($admin_kadi));
    $sifre = htmlspecialchars(trim($admin_sifre));

    if (!$kadi || !$sifre) {
        header("Location: login.php?giris=bos");
    }else{

        $query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
        $query->execute(array($kadi,$sifre));
        $admin_giris = $query->fetch(PDO::FETCH_ASSOC);

        if ($admin_giris) {
            
            $_SESSION["login"] = true;
            $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
            $_SESSION["admin_id"] = $admin_giris["admin_id"];

            header("Location: index.php");
        }else{
            header("Location: login.php?giris=no");
        }

    }

}

// genel ayarlar güncelleme işlemi
if (isset($genel_ayarlar)){
    

    if (!$site_title || !$site_url || !$site_desc || !$site_keyw) {
        header("Location: genel-ayarlar.php?update=bos");
    }else{
        $ayarlar = $db->prepare("UPDATE ayarlar SET site_title=?, site_url=?, site_desc=?, site_keyw=? WHERE 
            site_id=?");
        $update = $ayarlar->execute(array($site_title,$site_url,$site_desc,$site_keyw,1));
        
        if ($update) {
            header("Location: genel-ayarlar.php?update=yes");
        }else{
            header("Location: genel-ayarlar.php?update=no");
        }
    }
}






//kategori ekleme işlemi

if (isset($kategori_ekle)){
    

    if (!$kategori_title) {
        header("Location: kategoriler.php?sonuc=bos");
    }else{
        $kategoriler = $db->prepare("INSERT INTO kategoriler SET kategori_title=?");
        $insert = $kategoriler->execute(array($kategori_title));
        
        if ($insert) {
            header("Location: kategoriler.php?sonuc=yes");
        }else{
            header("Location: kategoriler.php?sonuc=no");
        }
    }
}




//kategori düzenleme işlemi

if (isset($kategori_duzenle)){
    
    $kategori_id = $_GET["kategori_id"];

    if (!$kategori_title) {
        header("Location: kategoriler.php?sonuc=bos");
    }else{
        $kategoriler = $db->prepare("UPDATE kategoriler SET kategori_title=? WHERE kategori_id=?");
        $update = $kategoriler->execute(array($kategori_title,$kategori_id));
        
        if ($update) {
            header("Location: kategoriler.php?sonuc=yes");
        }else{
            header("Location: kategoriler.php?sonuc=no");
        }
    }
}

//kategori silme işlemi
$kategorisil_id = $_GET["kategorisil_id"];
if (isset($kategorisil_id)){
    $kategoriler = $db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
    $delete = $kategoriler->execute(array($kategorisil_id));
        
    if ($delete) {
        header("Location: kategoriler.php?sonuc=yes");
    }else{
        header("Location: kategoriler.php?sonuc=no");
    }
    
}





// Duyuru ekle

$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");

if (isset($yazi_ekle)){ 

        $kaynak = $_FILES["yazi_foto"]["tmp_name"];
        $isim = $_FILES["yazi_foto"]["name"];
        $boyut = $_FILES["yazi_foto"]["size"];
        $turu = $_FILES["yazi_foto"]["type"];

        $uzanti = substr($isim, strpos($isim, ".")+1);
        $resimAd = rand()."_".$isim;
        $hedef = "../images/".$resimAd;


        if ($kaynak) {
            if (!in_array($uzanti, $DosyaUzanti) && !in_array($turu, $DosyaTuru)) {
                header("Location: duyurular.php?update=gecersizuzanti");
            }elseif($boyut > 1024 * 1024){
                header("Location: duyurular.php?update=buyuk");
            }else{

                if (move_uploaded_file($kaynak, $hedef)){
                    $yukle = $db->prepare("INSERT INTO  yazilar SET yazi_foto=?, yazi_title=?, yazi_kategori_id=?, yazi_icerik=?");
                    $insert = $yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik));
                    if ($insert){
                        header("Location: duyurular.php?update=yes");
                    }else{
                        header("Location: duyurular.php?update=no");
                    }
                }
            }

        }
}






// grup silme 
$yazisil_id = $_GET["yazisil_id"];
if(isset($yazisil_id)){
    // dosyadaki resmi siliyoruz 
    $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
    $sil->execute(array($yazisil_id));
    $eski_resim = $sil->fetch("PDO::FETCH_ASSOC");
    $eski_resim["yazi_foto"];

    unlink("../images/".$eski_resim["yazi_foto"]);

    $delete = $db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
    $siliyoruz = $delete->execute(array($yazisil_id));

    if ($siliyoruz){
        header("Location: duyurular.php?update=yes");
   }else{
      header("Location: duyurular.php?update=no");
   }

}
//duyuru güncelleme



$DosyaTuru = array("image/jpeg","image/jpg","image/png","image/x-png");
$DosyaUzanti = array("jpeg","jpg","png","x-png");

if (isset($yazi_duzenle)){
    if($_FILES["yazi_foto"]["size"] > 0){
// eğer fotoğraf değiştirse burası çalışacak
        $yazi_id = $_GET["yazi_id"];

        $kaynak = $_FILES["yazi_foto"]["tmp_name"];
        $isim = $_FILES["yazi_foto"]["name"];
        $boyut = $_FILES["yazi_foto"]["size"];
        $turu = $_FILES["yazi_foto"]["type"];

        $uzanti = substr($isim, strpos($isim, ".")+1);
        $resimAd = rand()."_".$isim;
        $hedef = "../images/".$resimAd;


        if ($kaynak) {
            if (!in_array($uzanti, $DosyaUzanti) && !in_array($turu, $DosyaTuru)) {
                header("Location: yazilar.php?update=gecersizuzanti");
            }elseif($boyut > 1024 * 1024){
                header("Location: yazilar.php?update=buyuk");
            }else{
                $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                $sil->execute(array($yazi_id));
                $eski_resim = $sil->fetch("PDO::FETCH_ASSOC");
                $eski_resim["yazi_foto"];

                unlink("../images/".$eski_resim["yazi_foto"]);

                if (move_uploaded_file($kaynak, $hedef)){
                    $yukle = $db->prepare("UPDATE yazilar SET yazi_foto=?, yazi_title=?, yazi_kategori_id=?, yazi_icerik=?, yazi_durum=? WHERE yazi_id=? ");
                    $update = $yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik,$yazi_durum,$yazi_id));
                    if ($update){
                        header("Location: duyurular.php?update=yes");
                    }else{
                        header("Location: duyurular.php?update=no");
                    }
                }
            }

        }
    }else {
        $yazi_id = $_GET["yazi_id"];
        if (!$yazi_title || !$yazi_icerik || !$yazi_kategori){
            header("Location: duyurular.php?update=bos");
        }else{
             $yukle = $db->prepare("UPDATE yazilar SET  yazi_title=?, yazi_kategori_id=?, yazi_icerik=?, yazi_durum=? WHERE yazi_id=?");
             $update = $yukle->execute(array($yazi_title,$yazi_kategori,$yazi_icerik,$yazi_durum,$yazi_id));
             if ($update){
                  header("Location: duyurular.php?update=yes");
             }else{
                header("Location: duyurular.php?update=no");
             }
        }
    }
}

//Anasayfa footer abone olma


if (isset($aboneol)){

    if(!$newslatter_email){
        header("Location: http://localhost/forumadu/index.php?sonuc=bos");
    }else{
        $subs = $db->prepare("INSERT INTO newslettersubs SET newslatter_email=? ");
        $insert = $subs->execute(array($newslatter_email));

        if($insert){
            header("Location: http://localhost/forumadu/index.php?sonuc=yes");
        }else{
            header("Location: http://localhost/forumadu/index.php?sonuc=no");
        }

    }
}







?>