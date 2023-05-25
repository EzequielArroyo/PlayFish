
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="..\public\css\bootstylesheet.css">
    <title>Todos los productos</title>
</head>
<body class="d-flex flex-column h-100">
    <!--HEADER-->
    <?php
        include_once("header.php")
    ?>
    <!--MAIN-->
    <main>
        <div class="container">
            <div class="row justify-content-start">


                <?php
                // 1) Conexion
                $conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "playfish_store");

                // 2) Preparar la orden SQL
                // Sintaxis SQL SELECT
                // SELECT * FROM nombre_tabla
                // => Selecciona todos los campos de la siguiente tabla
                // SELECT campos_tabla FROM nombre_tabla
                // => Selecciona los siguientes campos de la siguiente tabla
                $consulta='SELECT * FROM products WHERE product_type="pez"';

                // 3) Ejecutar la orden y obtenemos los registros
                $datos= mysqli_query($conexion, $consulta);

                // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
                while ($reg = mysqli_fetch_array($datos)) {?>
                <div class="card col-sm-12 col-md-3 col-lg-2 m-2 p-2">
                    <img class="card-img-top h-50" src="data:image/jpg;base64, <?php echo base64_encode($reg['product_image'])?>" alt="")>
                    <a href="productos.php?id=<?php echo $reg['id'];?>" class="card-body">
                    <h3 class="card-title w-100" style="font-size:25px"><?php echo ucwords($reg['product_name']) ?></h3>
                    <span>$ <?php echo $reg['product_price']; ?></span>
                    </a>
                </div>

                <?php } ?>

            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!--FOOTER-->
    <?php
    include_once("footer.html")
    ?>
</body>
</html>