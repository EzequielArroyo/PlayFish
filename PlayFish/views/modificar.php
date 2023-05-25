<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "playfish_store");

// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
// a) generar la consulta a realizar
$consulta = "SELECT * FROM products WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$respuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($respuesta);
?>

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
    include_once("header.php")
    ?>
    <!--MAIN-->
    <main  class="mx-2">
        <?php
            // 6) asignamos a diferentes variables los respectivos valores del array $datos.
            $product_name=$datos["product_name"];
            $product_price=$datos["product_price"];
            $product_type=$datos["product_type"];
            $imagen=$datos['product_image'];?>
         
            <div class=".container-fluid justify-content-center border border-primary my-4">
                <h2>Modificar</h2>
                <p>Ingrese los nuevos datos de la prenda.</p>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row justify-content-start m-3">
                        <div class="col-1"></div>
                        <div class="col-2"><input type="text" class="form-control" name="nombre" value="<?php echo "$product_name"; ?>"></div>
                        <div class="col-2"><input type="text" class="form-control" name="categoria" value="<?php echo "$product_type"; ?>"></div>
                        <div class="col-1"><input type="text" class="form-control" name="precio" value="<?php echo "$product_price"; ?>"></div>
                        <div class="col-3"><input type="file" class="form-control" name="imagen" placeholder="imagen"></div>
                        <div class="col-1 offset-1"><input class=" btn btn-success" type="submit" name="guardar_cambios" value="Guardar Cambios"></div>
                    </div>   
                            
                </form>
            </div>

        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){

            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $product_name = $_POST ['nombre'];
            $product_type = $_POST['categoria'];
            $product_price = $_POST['precio'];  
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
            $consulta = " UPDATE products SET product_name='$product_name', product_price='$product_price', product_type='$product_type', product_sold=0, product_image='$imagen' WHERE id =$id ";

             // 4') Ejecutar la orden y actualizamos los datos
             // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);

            // a) rederigir a index
            header('location: my_stock.php');

        }?>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!--FOOTER-->
    <?php
    include_once("footer.html")
    ?>
</body>
</html>