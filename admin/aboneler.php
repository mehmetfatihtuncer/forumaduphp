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
                        $sonuc = 5;
                        extract($_GET);
                        if ($sonuc =="bos"){ ?>
  <div class="alert alert-warning">
                            <b>Dikkat !</b> Lütfen boş alan bırakmayınız... 
                            </div>
                        <?php }elseif($sonuc =="no"){ ?>
                            <div class="alert alert-danger">
                            <b>Hata !</b> Güncelleme yapılırken bir hata oluştu...
                            </div>
                        <?php  }elseif($sonuc =="yes"){ ?>
                            <div class="alert alert-succes">
                            <b>Tebrikler</b> Güncelleme işlemi başarıyla yapıldı...
                            </div>
                        <?php  }  ?>
                        
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <i class="fa fa-tags"> Aboneler</i>
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Abone Mail</th>
                                        <th >Tarih </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $subs = $db->prepare("SELECT * FROM newslettersubs ORDER BY newsletter_email_id DESC");
                                    $subs->execute();
                                    $sub_cek = $subs->fetchALL(PDO::FETCH_ASSOC);
                                    $sub_say = $subs->rowCount();

                                    if ($sub_say) {
                                        foreach($sub_cek as $row){

          
                                          ?>        
                                         <tr class="odd gradeX">
                                        <td><?php echo $row["newsletter_email_id"]; ?></td>
                                        <td><?php echo $row["newslatter_email"]; ?></td>
                                        <td><?php echo $row["newslatter_date"]; ?></td>
                                        
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
