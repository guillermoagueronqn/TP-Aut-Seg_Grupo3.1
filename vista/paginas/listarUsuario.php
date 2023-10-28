<?php
    $tituloPagina = "Autenticación y Seguridad";
    include_once("../estructura/encabezado.php");
    include_once("../../configuracion.php");

    $objAbmUsuario = new AbmUsuario();
    $listaUsuarios = $objAbmUsuario -> buscar(null);
?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start" href="inicio.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="mb-5 fw-bold">Usuarios registrados</h1>
<?php
    if (count($listaUsuarios) > 0) {
        echo "<table class='table table-striped table-dark'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Mail</th>";
        echo "<th scope='col'>Estado</th>";
        echo "<th scope='col'>Actualizar</th>";
        echo "<th scope='col'>Borrar</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        if (count($listaUsuarios) > 0) {
            foreach ($listaUsuarios as $objUsuario) {
                echo "<tr>";
                echo "<th scope='row'>" . $objUsuario -> getIdusuario() . "</th>";
                echo "<td>" . $objUsuario -> getUsnombre() . "</td>";
                echo "<td>" . $objUsuario -> getUsmail() . "</td>";
                if ($objUsuario -> getUsdeshabilitado() == '0000-00-00 00:00:00') {
                    echo "<td>Habilitado</td>";
                    echo "<td><a class='bi bi-pencil-square link-light' href='../accion/actualizarLogin.php?accion=editar&idusuario=" . $objUsuario->getIdusuario() ."'></a></td>";
                    echo "<td><a class='bi bi-x-circle link-light' href='../accion/eliminarLogin.php?accion=borrar&idusuario=" . $objUsuario->getIdusuario() ."'></a></td>";
                } else {
                    echo "<td>Deshabilitado (" . $objUsuario -> getUsdeshabilitado() . ")</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                }
                echo "<tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<h3>No hay usuarios cargados en la base de datos!</h3>";
    }
?>

<?php
    include_once("../estructura/pie.php");
?>