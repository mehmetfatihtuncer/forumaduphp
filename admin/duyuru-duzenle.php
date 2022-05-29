<!-- header -->
<?php include 'header.php'; ?>
<!-- end header -->

<!-- sidebar -->
<?php include 'sidebar.php'; ?>


<?php 

$yazi_id = $_GET["yazi_id"];

$yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazicek = $yazilar->fetch(PDO::FETCH_ASSOC);





?>


       
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <?php 
                        $update = 5;
                        extract($_GET);
                        if ($update =="bos"){ ?>
  <div class="alert alert-warning">
                            <b>Dikkat !</b> Lütfen boş alan bırakmayınız... 
                            </div>
                        <?php }elseif($update =="no"){ ?>
                            <div class="alert alert-danger">
                            <b>Hata !</b> Güncelleme yapılırken bir hata oluştu...
                            </div>
                        <?php  }elseif($update =="yes"){ ?>
                            <div class="alert alert-succes">
                            <b>Tebrikler</b> Güncelleme işlemi başarıyla yapıldı...
                            </div>
                        <?php  }  ?>
                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Yazı Düzenle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="islem.php?yazi_id=<?php echo $yazi_id; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Yazı Fotoğraf</label><br>
                                            <img height="100" width="20%" src="../images/<?php echo $yazicek["yazi_foto"]; ?>" alt="<?php echo $yazicek["yazi_foto"]; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Fotoğraf Yükle</label>
                                            <input type="file" class="form-control" name="yazi_foto" >
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Yazı Başlık</label>
                                            <input class="form-control" name="yazi_title" value="<?php echo $yazicek["yazi_title"]; ?>">
                                        </div>

                                        

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="yazi_kategori" class="form-control">
                                            <?php 
                                            $kategoriler = $db->prepare("SELECT * FROM kategoriler");
                                            $kategoriler->execute();
                                            $kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($kategori_cek as $row) {  ?>
                                                <option value="<?php echo $row["kategori_id"]; ?>" <?php echo $yazicek["yazi_kategori_id"]==$row["kategori_id"] ? "selected" : null; ?> >
                                                <?php echo $row["kategori_title"]; ?></option>
                                            <?php     }    ?>

                                         </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Tarih</label>
                                            <input class="form-control"  value="<?php echo $yazicek["yazi_tarih"]; ?>" disabled>
                                        </div>     
                                       
                                        
                                        <div class="form-group">
                                            <label>İçerik</label>
                                            <textarea name="yazi_icerik" ><?php echo $yazicek["yazi_icerik"]; ?></textarea>
                                        </div> 
                                        
                                        

                            <button type="submit" name="yazi_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->     
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


<!-- footer -->
<?php include 'footer.php'; ?>
