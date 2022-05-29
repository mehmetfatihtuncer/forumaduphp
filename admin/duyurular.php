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
                        <i class="fa fa-list"> Duyurular</i>
                        <a href="duyuru-ekle.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus">Duyuru Ekle</i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="80">Fotoğraf</th>
                                        <th>Başlık</th>
                                        <th>Kategori</th>
                                        
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $yazilar = $db->prepare("SELECT * FROM yazilar
                                    INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
                                     ORDER BY yazi_id DESC");
                                    $yazilar->execute();
                                    $yazi_cek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                    $yazi_say = $yazilar->rowCount();

                                    if ($yazi_say) {
                                        foreach($yazi_cek as $row){
                                          ?>        
                                         <tr class="odd gradeX">
                                        <td><?php echo $row["yazi_id"]; ?></td>
                                        <td><img width="100" height="50" src="../images/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_title"]; ?>"></td>
                                        <td><?php echo $row["yazi_title"]; ?></td>
                                        <td class="center"><?php echo $row["kategori_title"]; ?></td>
                                        
                                        <td class="center"><?php echo $row["yazi_tarih"]; ?></td>
                                        <td class="center">
                                            <a href="duyuru-duzenle.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Düzenle</button></a>
                                            <a href="islem.php?yazisil_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Sil</button></a>
                                        </td>
                                    </tr>
                                          <?php
                                            
                                        }
                                    }

                                    ?>
                                
                          
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
