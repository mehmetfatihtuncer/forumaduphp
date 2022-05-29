<?php
include 'header.php';
?>


<div class="duyurular">
  
<main class="container">


<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Son Duyurular </h6>


<?php  
    $yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY yazi_id DESC");
    $yazilar->execute();
    $yazi_cek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
    $yazi_say = $yazilar->rowCount();

    if ($yazi_say) {
        foreach($yazi_cek as $row){
?>    

    <div class="d-flex text-muted pt-3">
    <img width="320" Height="180" src="images/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_title"]; ?>">

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark"><?php echo $row["yazi_title"]; ?>
        </strong>
        <?php echo $row["yazi_icerik"]; ?>
      </p>
      <br></br>
    </div>
   

  <?php
                                            
                                        }
                                    }

                                    ?>

</main>
</div>