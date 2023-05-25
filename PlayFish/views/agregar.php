<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "playfish_store");

  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  // Si se desea almacenar una imagen en la base de datos usar lo siguiente: addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
  $product_name = $_POST ['nombre'];
  $product_type = $_POST['categoria'];
  $product_price = $_POST['precio'];
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
  $consulta = "INSERT INTO products (id,product_name,product_price,product_type,product_sold,product_image) VALUES ('','$product_name','$product_price','$product_type','0','$imagen')";

  // 4) Ejecutar la orden y ingresamos datos
  // a) ejecutar la consulta
  mysqli_query($conexion,$consulta);

   // a) rederigir a index
   header('location: my_stock.php');

?>
