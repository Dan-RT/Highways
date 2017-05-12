<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 09/05/2017
 * Time: 00:11
 */

class register {

private $_cause_ferme;
private $_id_registre;

    public function __construct(array $data = null) {

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


    public function setCause_ferme($cause) {

        if (is_string($cause) && strlen($cause) <= 500) {
            $this->_cause_ferme = $cause;
        }
    }

    public function cause_ferme() {
        return $this->_cause_ferme;
    }


    public function setId_registre($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 1000) {
            $this->_id_registre = $id;
        }
    }

    public function id_registre() {
        return $this->_id_registre;
    }


}



?>