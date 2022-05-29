<!-- header -->
<?php include 'header.php'; ?>
<!-- end header -->

<!-- sidebar -->
<?php include 'sidebar.php'; ?>

<?php 


$admin = $db->prepare("SELECT * FROM admin");
$admin->execute();
$admincek = $admin->fetch(PDO::FETCH_ASSOC);





?>
       

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin panele hoşgeldin <?php echo $admincek["admin_kadi"]; ?></h1>
                </div>
            


<!-- footer -->
<?php include 'footer.php'; ?>