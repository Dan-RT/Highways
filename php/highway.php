<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 19:23
 */
class highway {

    private $_code_autoroute;
    private $_id_autoroute;
    private $_id_city;
    private $_id_city_2;


/*private $_id_registre;
private $_code_societe;*/

    public function __construct(array $data = null) {

        /*$this->_id_registre = null;
        $this->_code_societe = null;*/

        if ($data != null) {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data) {

        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setCode_autoroute($nom) {

        if (is_string($nom) && strlen($nom) <= 30) {
            $this->_code_autoroute = $nom;
        }
    }

    public function code_autoroute() {
        return $this->_code_autoroute;
    }

    public function setId_autoroute($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 10000) {
            $this->_id_autoroute = $id;
        }
    }

    public function id_autoroute() {
        return $this->_id_autoroute;
    }

/*

    public function setId_registre($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 100) {
            //$this->_id_registre = $id;
            echo "set_id_registre dans highway désactivée";
        }
    }

    public function setCode_societe($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            //$this->_code_societe = $code;
            echo "set_code_societe dans highway désactivée";
        }
    }

    public function id_registre() {
        return $this->_id_registre;
    }

    public function code_societe() {
        return $this->_id_registre;
    }*/

}


?>