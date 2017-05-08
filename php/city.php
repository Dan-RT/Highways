<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 21:21
 */


class city {


    private $_code_postal;
    private $_nom_ville;

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

    public function setNom_ville($nom) {

        if (is_string($nom) && strlen($nom) <= 30) {
            $this->_nom_ville = $nom;
        }
    }

    public function setCode_postal($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 100000) {
            $this->_code_postal = $code;
        }
    }

    public function nom_ville() {
        return $this->_nom_ville;
    }

    public function code_postal() {
        return $this->_code_postal;
    }

}


?>