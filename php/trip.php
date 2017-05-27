<?php


class trip {

    private $_id_deplacement;
    private $_id_autoroute;
    private $_id_city;
    private $_id_city_2;
    private $_id_voiture;


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

    public function setId_deplacement($id) {

        $id = (int) $id;

        if ($id >= 1 && $id <= 10000) {
            $this->_id_deplacement = $id;
        }
    }

    public function id_deplacement() {
        return $this->_id_deplacement;
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

    public function setId_city($code) {
        $code = (int) $code;
        if ($code >= 1 && $code <= 100000) {
            $this->_id_city = $code;
        }
    }

    public function id_city() {
        return $this->_id_city;
    }

    public function setId_city_2($code) {
        $code = (int) $code;
        if ($code >= 1 && $code <= 100000) {
            $this->_id_city_2 = $code;
        }
    }

    public function id_city_2() {
        return $this->_id_city_2;
    }

    public function setId_voiture($code) {
        $code = (int) $code;
        if ($code >= 1 && $code <= 100000) {
            $this->_id_voiture = $code;
        }
    }

    public function id_voiture() {
        return $this->_id_voiture;
    }

}