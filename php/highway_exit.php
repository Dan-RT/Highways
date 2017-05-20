<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 22:05
 */

class highway_exit {

    private $_libelle_sortie;
    private $_numero_sortie;
    private $_code_troncon;
    private $_code_postal;
    private $_nom_ville;
    private $_id_autoroute;

    public function __construct(array $data = null) {

        $this->_code_troncon = null;
        $this->_code_postal = null;
        $this->_code_autoroute = null;

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

    public function setLibelle_sortie($nom) {
        if (is_string($nom) && strlen($nom) <= 30) {
            $this->_libelle_sortie = $nom;
        }
    }

    public function setNumero_sortie($nb) {

        $nb = (int) $nb;

        if ($nb >= 1 && $nb <= 100) {
            $this->_numero_sortie = $nb;
        }
    }

    public function setCode_troncon($code) {

        $code = (int) $code;

        if ($code >= 0 && $code <= 10000) {
            $this->_code_troncon = $code;
        }
    }

    public function setId_autoroute($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            $this->_id_autoroute = $code;
        }
    }

    public function libelle_sortie() {
        return $this->_libelle_sortie;
    }

    public function numero_sortie() {
        return $this->_numero_sortie;
    }

    public function code_troncon() {
        return $this->_code_troncon;
    }

    public function id_autoroute() {
        return $this->_id_autoroute;
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