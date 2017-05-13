<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 12/05/2017
 * Time: 23:41
 */
class toll {

    private $_id_peage;
    private $_pgAuKm;
    private $_pgDuKm;
    private $_prix;
    private $_code_troncon;
    private $_id_societe;

    public function __construct(array $data = null) {

        $this->_code_troncon = null;
        $this->_societe = null;

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


    public function setId_peage($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 10000) {
            $this->_id_peage = $id;
        }
    }

    public function id_peage() {
        return $this->_id_peage;
    }


    public function setPrix($price) {

        $price = (float) $price;

        if ($price >= 0 && $price <= 10000) {
            $this->_prix = $price;
        }
    }

    public function prix () {
        return $this->_prix;
    }


    public function setPgDuKm($data) {

        $data = (int) $data;

        if ($data >= 0 && $data <= 10000) {
            $this->_pgDuKm = $data;
        }
    }

    public function pgDuKm() {
        return $this->_pgDuKm;
    }


    public function setPgAuKm($data) {

        $data = (int) $data;

        if ($data >= 0 && $data <= 10000) {
            $this->_pgAuKm = $data;
        }
    }

    public function pgAuKm() {
        return $this->_pgAuKm;
    }


    public function setCode_troncon($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            $this->_code_troncon = $code;
        }
    }

    public function code_troncon() {
        return $this->_code_troncon;
    }


    public function setId_societe($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 10000) {
            $this->_id_societe = $id;
        }
    }

    public function id_societe() {
        return $this->_id_societe;
    }


}