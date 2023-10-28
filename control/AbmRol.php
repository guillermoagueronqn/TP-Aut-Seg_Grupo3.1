<?php

    class AbmRol{

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto.
         * @param array $param
         * @return rol
         */
        private function cargarObjeto($param) {
            $obj = null;
            if (array_key_exists('idrol',$param) and array_key_exists('rodescripcion',$param)) {
                $obj = new rol();
                $obj -> setear($param['idrol'], $param['rodescripcion']);
            }
            return $obj;
        }

        /**
         * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves.
         * @param array $param
         * @return rol
         */
        private function cargarObjetoConClave($param) {
            $obj = null;
            if ( isset($param['idrol']) ) {
                $obj = new rol();
                $obj -> setear($param['idrol'], null);
            }
            return $obj;
        }

        /**
         * Corrobora que dentro del arreglo asociativo están seteados los campos claves.
         * @param array $param
         * @return boolean
         */
        private function seteadosCamposClaves($param) {
            $resp = false;
            if (isset($param['idrol'])) {
                $resp = true;
            }
            return $resp;
        }

        /**
         * Permite crear un objeto.
         * @param array $param
         */
        public function alta($param){
            $resp = false;
            $param['idrol'] = null;
            $objRol = $this->cargarObjeto($param);
            if ($objRol != null and $objRol->insertar()) {
                $resp = true;
            }
            return $resp;
        }

        /**
         * Permite eliminar un objeto.
         * @param array $param
         * @return boolean
         */
        public function baja($param) {
            $resp = false;
            if ($this -> seteadosCamposClaves($param)) {
                $objRol = $this -> cargarObjetoConClave($param);
                if ($objRol != null and $objRol -> eliminar()) {
                    $resp = true;
                }
            }
            return $resp;
        }

        /**
         * Permite modificar un objeto.
         * @param array $param
         * @return boolean
         */
        public function modificacion($param){
            $resp = false;
            if ($this -> seteadosCamposClaves($param)) {
                $objRol = $this -> cargarObjeto($param);
                if ($objRol != null and $objRol -> modificar()) {
                    $resp = true;
                }
            }
            return $resp;
        }

        /**
         * Permite buscar un objeto.
         * @param array $param
         * @return boolean
         */
        public function buscar($param) {
            $where = " true ";
            if ($param <> null) {
                if (isset($param['idrol'])) {
                    $where .= " and idrol =" . $param['idrol'];
                }
                if (isset($param['rodescripcion'])) {
                    $where .= " and rodescripcion ='" . $param['rodescripcion'] . "'";
                }
            }
            $objRol = new rol();
            $arreglo = $objRol -> listar($where);
            return $arreglo;
        }
    }

?>