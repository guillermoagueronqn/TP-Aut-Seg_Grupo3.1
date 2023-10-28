<?php
    $tituloPagina = "Implementación";
    include_once("../estructura/encabezado.php");
?>

<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <h5 class="card-title">Lista de Usuarios</h5>
                <a href="listarUsuario.php" class="stretched-link"></a>
            </div>
        </div>
    </div>
    <div class="col">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <a href="login.php" class="stretched-link"></a>
                </div>
            </div>
    </div>
</div>

<?php
    include_once("../estructura/pie.php");
?>