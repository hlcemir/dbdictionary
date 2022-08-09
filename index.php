<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Online Sözlük</title>
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="ico.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Online Sözlük
        </a>
    </nav>
        <div style="padding-left: 50px" class="row">
            <div class="col">
                <h6 class="display-1 text-center">Online Sözlük</h6>
            </div>
        </div>
    </div>
</header>
<main style="margin-bottom: 100px">
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <form action="" methot="GET">
                    <div class="card text-center">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Kelimeyi Giriniz</h5>
                            <input type="text" name="kelime" class="form-control" placeholder="Aramak istediğiniz Kelimeyi Giriniz.." >
                            <input class="btn btn-primary mt-2" type="submit" value="Sözlükte Ara">
                        </div>
                        <div class="card-footer text-muted">
                        </div>
                    </div>
                <form>
                    <?php
                    require_once 'baglan.php';
                    global $baglan;
                    if ($_GET){
                        $kelime = $_GET['kelime'];
                        $kelime = mb_strtoupper($kelime,"UTF-8");

                        if (!$kelime){
                            echo"Arama yapabilmek için kelime giriniz !";
                        }else{
                            $sorgu = $baglan->prepare("SELECT * FROM dictionary WHERE name = ?");
                            $sorgu->execute(array($kelime));

                            if ($sorgu->rowCount()){
                                foreach($sorgu as $row){

                                    echo "<h3 class='mt-5'> <p>Kelimeniz:</p>".$kelime."</h3>";
                                    echo "<br>";
                                    echo $row['description']."<br>";

                                }

                            }else{
                                echo"Aranan kelimeye ait değer bulunamadı";
                            }

                        }

                    }
                    ?>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; Copyright -<?php date_default_timezone_set('Europe/Istanbul'); echo date("Y");?> </span>
    </div>
</footer>
</body>
</html>
