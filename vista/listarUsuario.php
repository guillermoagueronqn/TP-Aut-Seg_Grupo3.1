<html>
    <head>
        <title>Listar Usuarios</title>
    </head>
    <?php
        $objAbmUsuario = new AbmUsuario();
        $listaUsuarios = $objAbmUsuario->buscar(null);
    ?>
    <body>
        <?php 
            if (count($listaUsuarios) > 0){
                echo "<h3>Usuarios (Lista)</h3>";
                echo "<ul class= 'list-group' >";
                echo "<li class= 'list-group-item active' aria-current= 'true' >Lista: </li>";
                foreach ($listaUsuarios as $objUsuario) { 
                    echo "<li class='list-group-item'>ID de usuario: " . $objUsuario->getIdusuario() ."</li>";  
                    echo "<li class='list-group-item'>Nombre de usuario: " . $objUsuario->getUsnombre() ."</li>"; 
                    echo "<li class='list-group-item'>Mail: " . $objUsuario->getNombre() . "</li>";
                    echo "<li class='list-group-item'>Fecha de nacimiento: " . $objUsuario->getFechaNac() . "</li>";
                    echo "<li class='list-group-item'> <a href='../accion/accionPersonaBorrar.php?accion=borrar&NroDni=" . $objPersona->getNroDni() ."'> Borrar </a></li>";
                }
                echo "</ul>";
            } else {
                echo "<h3>No hay usuarios cargados en la base de datos!</h3>";
            }
        
        ?>
    </body>
</html>