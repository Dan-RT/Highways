<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 08/05/2017
 * Time: 19:09
 */


class portion {
    private $_code_troncon;
    private $_duKm;
    private $_auKm;
    private $_ouvert;
    private $_id_autoroute;
    private $_payant;


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


    public function setCode_troncon($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            $this->_code_troncon = $code;
        }
    }

    public function code_troncon() {
        return $this->_code_troncon;
    }


    public function setDuKm($data) {

        $data = (int) $data;

        if ($data >= 1 && $data <= 10000) {
            $this->_duKm = $data;
        }
    }

    public function duKm() {
        return $this->_duKm;
    }


    public function setAuKm($data) {

        $data = (int) $data;

        if ($data >= 1 && $data <= 10000) {
            $this->_auKm = $data;
        }
    }

    public function auKm() {
        return $this->_auKm;
    }


    public function setOuvert($data) {
        if ($data != 0) {
            $this->_ouvert = 1;
        } else {
            $this->_ouvert = 0;
        }
        /*
        $data = (bool) $data;
        $this->_ouvert = $data;*/
    }

    public function ouvert() {
        if ($this->_ouvert != 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function setId_autoroute($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            $this->_id_autoroute = $code;
        }
    }

    public function id_autoroute() {
        return $this->_id_autoroute;
    }

    public function setPayant($data) {
        if ($data != 0) {
            $this->_payant = 1;
        } else {
            $this->_payant = 0;
        }
    }

    public function payant() {
        if ($this->_payant != 0) {
            return 1;
        } else {
            return 0;
        }
    }

}


/*


    public function setPgDuKm($data) {

        $data = (int) $data;

        if ($data >= 1 && $data <= 10000) {
            $this->_pgDuKm = $data;
        }
    }

    public function pgDuKm() {
        return $this->_pgDuKm;
    }


    public function setPgAuKm($data) {

        $data = (int) $data;

        if ($data >= 1 && $data <= 10000) {
            $this->_pgAuKm = $data;
        }
    }

    public function pgAuKm() {
        return $this->_pgAuKm;
    }

public function setId_registre($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 100) {
            //$this->_id_registre = $id;
            echo "set_id_registre dans highway désactivée";
        }
    }

    public function id_registre() {
        return $this->_id_registre;
    }

    public function setCode_societe($code) {

        $code = (int) $code;

        if ($code >= 1 && $code <= 10000) {
            //$this->_code_societe = $code;
            echo "set_code_societe dans highway désactivée";
        }
    }

    public function code_societe() {
        return $this->_id_registre;
    }

 */



?>