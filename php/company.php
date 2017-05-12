<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 12/05/2017
 * Time: 23:00
 */
class company {

    private $_id_societe;
    private $_code_societe;
    private $_nom_societe;
    private $_ca_societe;
    private $_fin_contrat_societe;

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


    public function setId_societe($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 10000) {
            $this->_id_societe = $id;
        }
    }

    public function id_societe() {
        return $this->_id_societe;
    }


    public function setCode_societe($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            $this->_code_societe = $code;
        }
    }

    public function code_societe() {
        return $this->_code_societe;
    }


    public function setNom_societe($name) {

        if (is_string($name) && strlen($name) <= 500) {
            $this->_nom_societe = $name;
        }
    }

    public function nom_societe() {
        return $this->_nom_societe;
    }


    public function setCa_societe($ca) {

        $ca = (int) $ca;

        if ($ca >= 1 && $ca <= 1000000) {
            $this->_ca_societe = $ca;
        }
    }

    public function ca_societe() {
        return $this->_ca_societe;
    }


}