<?php
global $baglan;

try{
    ## Veritabanı Bağlantısı
    $baglan = new PDO("mysql:host=localhost;dbname=sozluk",'root','root');

    ob_start();
    session_start();

    ## Karakter Sorunu Çözümü
    $baglan->exec("set names utf8");
}

catch(PDOException $e){
    echo $e->getMessage();
}


?>
