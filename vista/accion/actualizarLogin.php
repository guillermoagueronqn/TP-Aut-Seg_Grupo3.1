<?php
    $tituloPagina = "Actualizar Login";
    include_once("../estructura/encabezado.php");

    include_once '../../configuracion.php';
    $objAbmUsuario = new AbmUsuario();
    $datos = data_submitted();
    $obj = null;
    if (isset($datos['accion'])) {
        if ($datos['accion'] == 'editar') {
            $listaUsuarios = $objAbmUsuario -> buscar($datos);
            if (count($listaUsuarios) == 1) {
                $obj = $listaUsuarios[0];
            }
        }
    }
?>

<a class="btn btn-lg btn-dark text-center text-white float-start position-absolute d-flex justify-content-start" href="../paginas/listarUsuario.php"><i class="bi bi-arrow-90deg-left"></i></a>
<h1 class="mb-5 fw-bold">Actualizar Login</h1>
<div class="d-flex justify-content-center">
    <div class="w-50">
        <form method="post" action="actualizarLoginResultado.php" class="needs-validation p-5 border border-dark" novalidate>
            <div class="form-group">
                <label for="idusuario">ID de Usuario:</label>
                <input id="idusuario" name="idusuario" class="form-control" type="text" value="<?php echo $obj -> getIdusuario()?>" readonly>
            </div>
            <div class="form-group">
                <label for="usnombre">Nombre de Usuario:</label>
                <input id="usnombre" name="usnombre" class="form-control" type="text" value="<?php echo $obj -> getUsnombre()?>" required pattern="^[a-zA-Z][a-zA-Z0-9]*$">
                <div class="valid-feedback">
                    Correcto.
                </div>
                <div class="invalid-feedback">
                    Incorrecto.
                </div>
            </div>
            <div class="form-group">
                <label>Contraseña:</label><br/>
                <input id="uspass" name="uspass" class="form-control" type="password" value="<?php echo $obj -> getUspass()?>" required pattern="^[a-zA-Z0-9][a-zA-Z0-9]*$">
                <div class="valid-feedback">
                    Correcto.
                </div>
                <div class="invalid-feedback">
                    Incorrecto.
                </div>
            </div>
            <div class="form-group">
                <label for="Nombre">Email:</label><br/>
                <input id="usmail" name="usmail" class="form-control" type="email" value="<?php echo $obj -> getUsmail()?>" required>
                <div class="valid-feedback">
                    Correcto.
                </div>
                <div class="invalid-feedback">
                    Incorrecto.
                </div>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <?php
                    if ($obj -> getUsdeshabilitado() == NULL) {
                        $estado = "Habilitado";
                    } else {
                        $estado ="Deshabilitado (" . $obj -> getUsdeshabilitado() . ")";
                    }
                ?>
                <input id="estado" name="estado" class="form-control" type="text" value="<?php echo $estado?>" readonly>
            </div>
            <div class="form-group">
                <input id="usdeshabilitado" name="usdeshabilitado" class="form-control" type="hidden" value="<?php echo $obj -> getUsdeshabilitado()?>" readonly>
            </div>
            <br/>
            <input id="accion" name ="accion" value="actualizar" type="hidden">
            <input type="submit" class="btn btn-dark" value="Actualizar">
        </form>
        <script src="../js/function.js"></script>
    </div>
</div>

<?php
    include_once("../estructura/pie.php");
?>