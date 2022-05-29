<?php
include'../sistem/baglan.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Admin Panele Hoşgeldiniz</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    

  
<main class="form-signin w-100 m-auto">
  <form role="form" action="islem.php" method="POST">
    <img class="mb-4" src="Forum_Adu.png" alt="" width="175" height="145">
    <h1 class="h3 mb-3 fw-normal">Lütfen Giriş Yapın</h1>

    <div class="form-floating">
      <input class="form-control" id="floatingInput" placeholder="name@example.com" name="admin_kadi" type="text">
      <label for="floatingInput">Kullanıcı Adı</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="admin_sifre">
      <label for="floatingPassword">Şifre</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Beni Hatırla</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="giris">Giriş Yap</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>

  </body>
</html>