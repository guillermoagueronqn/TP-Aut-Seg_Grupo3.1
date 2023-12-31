<?php

    $tituloPagina = "Auto (Resultado Borrar)";
    include_once("../estructura/encabezado.php");

    include_once '../../configuracion.php';
    $datos = data_submitted();
    $resp = false;
    $objTrans = new AbmUsuario();
    if (isset($datos['accion'])) {
        if ($datos['accion'] == 'borrar') {
            if ($objTrans -> baja($datos)) {
                $resp = true;
            }
        }
        if ($resp) {
            $mensaje = "El borrado lógico se realizó correctamente.";
        } else {
            $mensaje = "El borrado lógico no pudo concretarse.";
        }
    }

?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start" href="../paginas/listarUsuario.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="fw-bold">
    <?php
        echo $mensaje;
    ?>
</h1>

<?php
    include_once("../estructura/pie.php");
?>