<?php
    $tituloPagina = "Actualizar Login (Resultado)";
    include_once("../estructura/encabezado.php");

    include_once '../../configuracion.php';
    $datos = data_submitted();
    $datos['uspass'] = md5($datos['uspass']);
    $resp = false;
    $objTrans = new AbmUsuario();
    if (isset($datos['accion'])) {
        if ($datos['accion'] == 'actualizar') {
            if ($objTrans -> modificacion($datos)) {
                $resp = true;
            }
        }
        if ($resp) {
            $mensaje = "La actualización del login se realizó correctamente.";
        } else {
            $mensaje = "La actualización del login no pudo concretarse.";
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