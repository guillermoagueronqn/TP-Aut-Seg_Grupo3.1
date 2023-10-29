<?php

class Session {
    // Constructor que Inicia la sesión.
    public function __construct(){
        session_start();
    }

    // Actualiza las variables de sesión con los valores ingresados.
    public function iniciar($nombreUsuario, $psw){
        $_SESSION["usnombre"] = $nombreUsuario;
        $_SESSION["uspass"] = $psw;
    }

    // Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.
    public function validar(){
        $resp = false;
        $objAbmUsuario = new AbmUsuario();
        $arreglo = $objAbmUsuario->buscar($_SESSION);
        if ($arreglo != null){
            if ($arreglo[0]->getUsdeshabilitado() == "0000-00-00 00:00:00"){
                $resp = true;
            }
        }
        return $resp;
    }

    // Devuelve true o false si la sesión está activa o no. 
    public function activa(){
        $resp = false;
        if (session_status() == PHP_SESSION_ACTIVE){
            $resp = true;
        }
        return $resp;
    }

    // Devuelve el usuario logeado.
    public function getUsuario(){
        $objUsuario = null;
        $objAbmUsuario = new AbmUsuario();
        if ($listaUsuarios = $objAbmUsuario->buscar($_SESSION)){
            $objUsuario = $listaUsuarios[0];
        }
        return $objUsuario;
    }

    // Devuelve el rol del usuario logeado.
    public function getRol(){
        $objRol = null;
        $objUsuario = $this->getUsuario();
        if ($objUsuario != null){
            $parametro["idusuario"] = $objUsuario->getIdusuario();
            $objAbmUsuarioRol = new AbmUsuariorol();
            if ($listaUsuarioRol = $objAbmUsuarioRol->buscar($parametro)){
                $param2["idrol"] = $listaUsuarioRol[0]->getObjRol()->getIdrol();
                $objAbmRol = new AbmRol();
                if ($listaRol = $objAbmRol->buscar($param2)){
                    $objRol = $listaRol[0];
                }
            }
        }
        return $objRol;
    }

    //  Cierra la sesión actual.
    public function cerrar(){
        session_unset();
        session_destroy();
    }
}

?>