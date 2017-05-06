<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 19:23
 */
class highway {

private $_code_autoroute;
private $_id_registre;
private $_code_societe;

    public function hydrate(array $data) {

        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set_'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function set_code_autoroute($nom) {

        if (is_string($nom) && strlen($nom) <= 30) {
            $this->_code_autoroute = $nom;
        }
    }

    public function set_id_registre($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 100) {
            $this->_id_registre = $id;
        }
    }

    public function set_code_societe($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 100) {
            $this->_code_societe = $code;
        }
    }

    public function code_autoroute() {
        return $this->_code_autoroute;
    }

    public function id_registre() {
        return $this->_id_registre;
    }

    public function code_societe() {
        return $this->_id_registre;
    }

}


?>