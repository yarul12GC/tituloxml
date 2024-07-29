<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo '
        <script>
            alert("por favos inicie sesión")
            window. location = "../login/login/login.php";
        </script>

        ';
    session_destroy();
    die();
}
?>

<?php
require 'consultasAsignatuas.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="media/ual.png" />
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="estilos/plantilla3.css">


    <title>Cat&#225;logo de Asignaturas</title>
</head>

<body>
<header>
        <div>

            <nav class="navegacion">
                <ul class="menu">
                    }

                    <li><a href=""> <img src="media/lista.png" alt="" width="15px"> Catálogo </a>
                        <ul class="submenu">
                            <li><a href="..\institucion/datos-institucion.php"> <img src="media/banco.png" width="15px"> Datos de la Institución</a></li>
                            <li><a href="..\expedicion/datos-expedicion.php"> <img src="media/mapa.png" width="15px"> Datos de Expedición</a></li>
                            <li><a href="..\carreras/catalogocarreras.php"> <img src="media/menu.png" width="15px"> Carreras</a></li>
                            <li><a href="..\asignaturas/catalogoAsignatuas.php"> <img src="media/libro.png" width="15px"> Asignaturas</a></li>
                            <li><a href="..\alumnos/cataloogoalumnos.php"> <img src="media/grupo.png" width="15px"> Alumnos</a></li>
                        </ul>
                    </li>


                    <li><a href=""> <img src="media/docs.png" alt="" width="15px"> Certificación</a>
                        <ul class="submenu">
                            <li><a href="..\certificado/emitircertificado.php"> <img src="media/anadir.png" width="15px"> Emitir Certificado 3.0</a></li>
                            <li><a href="..\portalCertificados/portalCertificados.php"> <img src="media/calen.png" width="15px"> Portal de Certificados</a></li>
                        </ul>
                    </li>


                    <li><a href=""> <img src="media/docs.png" alt="" width="15px"> Titulación</a>
                        <ul class="submenu">
                            <li><a href="..\titulo/emitirtitulo.php"> <img src="media/anadir.png" width="15px"> Emitir Título</a></li>
                            <li><a href="..\portalTitulos/portalTitulos.php"> <img src="media/calen.png" width="15px"> Portal de Titulos</a></li>


                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="navegacion">
            <ul>

                <li><a href="..\inicio/inicio.php"> <img src="media/icoMenu.png" width="45px"></a></li>
            </ul>
        </nav>
        </div>

        <nav class="navegacion">

            <div>
                <ul class="menu2">
                    <li><a href="..\perfil/editarperfil.php"> <img src="media/usuario.png" alt="" width="15px"> Mi perfil</a></li>
                    <li><a href="..\ayuda/ayuda.php"> <img src="media/nube.png" alt="" width="15px"> Ayuda</a></li>
                    <li><a href="..\login/login/salir.php"> <img src="media/cerrar.png" alt="" width="15px"> Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </header>



    <section class="zona1">
        <div class="container body-content">
            <div id="dvCapturar"><br>

                <div class="contenedorCatalogo">
                    <h2 class="botons">Cat&#225;logo de Asignaturas</h2>

                    <div class="barra__buscador">
                        <!--buscar y crear un nuevo registro-->
                        <form class="formulario">

                            <a href="catalogoNuevaAsignatuas.php" class="btn"><img class=imgButton src="media/add.png">Registar Nueva</a>
                        </form>

                    </div>
                </div>

                <br>


                <fieldset>
                    <legend>Datos</legend>
                    <br>
                    <br>
                    <div class="dataTables_length">
                        <form action="catalogoAsignatuas.php" class="formulario" method="POST">



                            <!--////////////////////////////////////////////BUCADOR///////////////////////////////////////////////////////-->
                            <a style="width : 30%; heigth : 20px"></a>
                            <a style="width : 39%; heigth : 20px" class="btn__busc"></a>


                            <input type="text" name="buscar" placeholder="Buscar" class="input__text">

                            <input type="submit" class="btn" value="buscar">


                        </form>

                        <table>
                            <!--encabesado de la tabla-->
                            <thead>
                                <tr class="head">
                                    <th>Id</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'buscarAsignatuas.php';

                                while ($row = mysqli_fetch_array($sql_query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['IdAsignatura']; ?></td>
                                        <td><?php echo $row['ClaveAsignatura']; ?></td>
                                        <td><?php echo $row['Nombre']; ?></td>
                                        <td><?php echo $row['TipoAsignatura']; ?></td>


                                        <td><a href="actualizarAsignatuas.php?IdAsignatura=<?php echo $row['IdAsignatura']; ?>" class="btn__update"><img class=imgButton src="media/edit.png"> Editar</a>
                                            <!--boton de eliminar si se requiere el uso solo se quitan las equiquetas de comenrario-->
                                            <!-- <a href="eliminarCarreras.php?IdAsignatura=// echo $row['IdAsignatura'];" class="btn__delete"><img  class=imgButton src="media/delete.png"> Eliminar</a>                          -->
                                    </tr>
                            </tbody>
                        <?php
                                }
                        ?>

                        </table>

                </fieldset>
                <br>
                <hr>
                <br>
                <footer class="pie-pagina">
                    <div class="grupo-1">
                        <div class="box">
                            <figure>
                                <img src="media/ual.png">
                                <small>&copy; 2022 - Software de Certificados y Titulos Profesionales Electrónicos. V1.0</small>

                            </figure>
                        </div>
                        <div class="tex2">

                            <p><small>Teléfonos:01 557 294 64 77 / 01 735 120 52 25
                                    <br>
                                    Lunes a Viernes de 9am a 5pm
                                </small></p>

                        </div>
                    </div>
                </footer>


    </section>



    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("abajo", window.scrollY > 0);
        })
    </script>
</body>

</html>