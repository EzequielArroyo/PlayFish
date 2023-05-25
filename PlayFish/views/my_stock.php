
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Mi Stock</title>
</head>
<body class="d-flex flex-column h-100">
    <!--HEADER-->
    <?php
        include_once("header.php");
    ?>
    <!--MAIN-->
    <main  class="mx-2">
        <div class=".container-fluid justify-content-center border border-primary my-4">
            <h3 class="text-center">Agregar Producto</h3>
            <form method="POST" action="agregar.php" enctype="multipart/form-data">
                <div class="row justify-content-start m-3">
                    <div class="col-1"></div>
                    <div class="col-2"><input type="text" class="form-control" name="nombre" placeholder="Nombre" required></div>
                    <div class="col-2"><input type="text" class="form-control" name="categoria" placeholder="Categoria" required></div>
                    <div class="col-1"><input type="text" class="form-control" name="precio" placeholder="Precio" required></div>
                    <div class="col-3"><input type="file" class="form-control" name="imagen"></div>
                    <div class="col-1 offset-2"><button type="submit" class="btn btn-success">Agregar</button></div>
                </div>   
                        
            </form>
        </div>
        
        <div class=".container-lg">
            <h3 class="text-center">Mi Stock</h3>
            <div class="row justify-content-start m-3 border-bottom bg-secondary">
                <div class="col-1">ID </div>
                <div class="col-2">Nombre</div>
                <div class="col-2">Categoria</div>
                <div class="col-1">Precio</div>
                <div class="col-3">Imagen</div>
                <div class="col-1">Editar</div>
                <div class="col-1">Eliminar</div>
            </div>
            
            
                    
            
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
                $consulta='SELECT * FROM products';

                // 3) Ejecutar la orden y obtenemos los registros
                $datos= mysqli_query($conexion, $consulta);

                // 4) Mostrar los datos del registro
                while ($reg=mysqli_fetch_array($datos)) { ?>
                    <div class="row justify-content-start my-3 border-bottom mx-3">
                        <div class="col-1"><?php echo $reg['id']; ?></div>
                        <div class="col-2"><?php echo $reg['product_name']; ?></div>
                        <div class="col-2"><?php echo $reg['product_type']; ?></div>
                        <div class="col-1"><?php echo $reg['product_price']; ?></div>  
                        <div class="col-3"><img src="data:image/png;base64, <?php echo base64_encode($reg['product_image'])?>" alt="" class="w-25"></div>
                        <div class="col-1"><a href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a></div>
                        <div class="col-1"><a href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a></div>
                    </div>
                
                <?php } ?>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!--FOOTER-->
    <?php
    include_once("footer.html")
    ?>
</body>
</html>