<?php
session_start();

if (isset($_SESSION['email'])) {
  header("location: login.php");
}

?>
<?php

include('conexion.php');

//evaluamos los campos si estan vacios 

if (isset($_POST['register'])) {
  if (
    strlen($_POST['apellidoP']) >= 1 && strlen($_POST['apellidoM']) >= 1
    && strlen($_POST['nombres']) >= 1 && strlen($_POST['curp']) >= 1
    && strlen($_POST['ine']) >= 1 && strlen($_POST['email']) >= 1
    && strlen($_POST['clave']) >= 1
  ) {

    $apellidoPa = $_POST['apellidoP'];
    $apellidoMa = $_POST['apellidoM'];
    $nombreS = $_POST['nombres'];
    $Curp = $_POST['curp'];
    $Ine = $_POST['ine'];
    $Email = $_POST['email'];
    $contrasena = $_POST['clave'];
    $Img = $_POST['img'];


    //password_hash (encriptacion)

    $contrasena = hash('sha512', $contrasena);
    //conexxion 
    $consulta = "INSERT INTO administradoresual(apellidoP, apellidoM, nombres, curp, ine, email, contrasena, img) 

                 VALUES ('$apellidoPa','$apellidoMa','$nombreS','$Curp','$Ine','$Email','$contrasena','$Img')";

    //verificamos datos repetidos

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM administradoresual WHERE email = '$Email' ");

    if (mysqli_num_rows($verificar_correo) > 0) {
      echo '
          <script> 
              alert("EL correo ya esta registrado, intente de nuevo con otro distinto");
              window. location = "registro.php"
          </script>

      ';
      exit();
    }

    //verificacion de ine

    $verificar_ine = mysqli_query($conexion, "SELECT * FROM administradoresual WHERE ine = '$Ine' ");

    if (mysqli_num_rows($verificar_correo) > 0) {
      echo '
          <script> 
              alert("EL CI del INE ya esta registarda intente de nuevo");
              window. location = "registro.php"
          </script>

      ';
      exit();
    }

    //verificacion de CURP


    $verificar_ine = mysqli_query($conexion, "SELECT * FROM administradoresual WHERE curp = '$Curp' ");

    if (mysqli_num_rows($verificar_correo) > 0) {
      echo '
          <script> 
              alert("La CURP ya esta registarda intente de nuevo");
              window. location = "registro.php"
          </script>

      ';
      exit();
    }


    $resultado = mysqli_query($conexion, $consulta);

    //mandamos una notificacion al usuario 
    if ($resultado) {
?>
      <h3 class="ok">¡Te has inscripto correctamente!</h3>
    <?php
    } else {
    ?>
      <h3 class="bad">¡Ups ha ocurrido un error!</h3>
    <?php
    }
  } else {
    ?>
    <h3 class="bad">¡Por favor complete los campos!</h3>
<?php
  }
}

?>