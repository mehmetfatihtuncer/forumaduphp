<!-- header -->
<?php include 'header.php'; ?>
<!-- end header -->

<!-- sidebar -->
<?php include 'sidebar.php'; ?>


<?php 

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);

?>


       
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <?php
                        
$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);


                        extract($_GET);
                        $update = "";


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
                            <i class="fa fa-cog fa-fw"></i> Genel Ayarlar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="islem.php" method="POST">
                        <div class="form-group">
                                            <label>Site Title</label>
                                            <input class="form-control" name="site_title" value="<?php echo $ayarcek["site_title"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Site Url</label>
                                            <input class="form-control" name="site_url" value="<?php echo $ayarcek["site_url"]; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label>Site Description</label>
                                            <input class="form-control" name="site_desc" value="<?php echo $ayarcek["site_desc"]; ?>">
                                        </div>     
                                        <div class="form-group">
                                            <label>Site Keywords</label>
                                            <input class="form-control" name="site_keyw" value="<?php echo $ayarcek["site_keyw"]; ?>">
                                        </div>         
                            <button type="submit" name="genel_ayarlar" class="btn btn-primary btn-block">Güncelle</button>
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