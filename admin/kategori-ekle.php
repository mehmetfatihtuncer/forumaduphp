<!-- header -->
<?php include 'header.php'; ?>
<!-- end header -->

<!-- sidebar -->
<?php include 'sidebar.php'; ?>

      
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus fa-fw"></i> Kategori Ekle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="islem.php" method="POST">
                                      
                                        <div class="form-group">
                                            <label>Kategori Adı</label>
                                            <input class="form-control" name="kategori_title" placeholder="Kategorinizin adını giriniz">
                                        </div>
                                     
                            <button type="submit" name="kategori_ekle" class="btn btn-primary btn-block">Ekle</button>
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
