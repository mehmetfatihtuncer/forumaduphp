
<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

try {
    $db = new PDO("mysql:host=localhost; dbname=forumadu; charset=utf8;","root","12345678");
}   catch (PDOException $error){
    echo "<center><b>Veritabanına bağlanılamadı</b></center>"; $error->getMessage();
}


?>