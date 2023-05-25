<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="..\public\css\bootstylesheet.css">
    <title>header</title>
</head>
<body>
<div class=".container-fluid justify-content-center">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 ms-2" href="..\index.html">
            <img  src="..\public\img\icons\mp_icons\pescado.png" class="img-fluid" alt="foto_logo" width=50px>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="all_products.php" class="nav-link px-2 link-dark text-light">Todos los productos</a></li>
            <li><a href="fish_products.php" class="nav-link px-2 link-dark text-light">Peces</a></li>
            <li><a href="fishbowl_products.php" class="nav-link px-2 link-dark text-light">Peceras</a></li>
            <?php
            if ($_SESSION!= null and $_SESSION['usuario']=='admin') {
                echo'<li><a href="my_stock.php" class="nav-link px-2 link-dark text-light">MiStock</a></li>';
            }?>           
        </ul>
        <?php
        $sesion = $_SESSION;
        if($sesion==null || $sesion=''){
            echo '
            <div class="col-md-3 text-end">
            <a role="button" class="btn btn-outline-light me-2 text-light" href="login.html">Login</a>
            <a role="button" class="btn btn-outline-light me-2 text-light" href="sign_in.html">Sign in</a>
        </div>';
        }else{
            echo '
            <div class="col-md-3 text-end">
            <a role="button" class="me-2 text-light"> ' .$_SESSION['usuario'] . '</a>
            <a role="button" class="btn btn-outline-light me-2 text-light" href="cerrar.php">Log out</a>
        ';}
        
        ?>
    </header>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
