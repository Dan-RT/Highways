<?php

/**
 * Created by IntelliJ IDEA.
 * User: Daniel
 * Date: 06/05/2017
 * Time: 22:05
 */

class highway_exit_manager {

    private $_db;

    public function __construct() {
        $this->setDb();
    }

    public function setDb() {
        $this->_db = new PDO('mysql:host=localhost;dbname=Highway_to_Hell;charset=utf8', 'root', 'root');
    }

    public function add(highway_exit $sortie) {

        $q = $this->_db->prepare('INSERT INTO Sortie (libelle_sortie, code_troncon, code_troncon_arrivee, id_autoroute, id_city) VALUES(:libelle_sortie, :code_troncon, :code_troncon_arrivee, :id_autoroute, :id_city)');

        $q->bindValue(':libelle_sortie', $sortie->libelle_sortie());
        $q->bindValue(':code_troncon', $sortie->code_troncon(), PDO::PARAM_INT);
        $q->bindValue(':code_troncon_arrivee', $sortie->code_troncon_arrivee(), PDO::PARAM_INT);
        $q->bindValue(':id_autoroute', $sortie->id_autoroute(), PDO::PARAM_INT);
        $q->bindValue(':id_city', $sortie->id_city(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(highway_exit $sortie) {
        //echo "sortie : " . $sortie->numero_sortie();
        //echo "DELETEEEEEE";
        $this->_db->exec('DELETE FROM Sortie WHERE numero_sortie = '.$sortie->numero_sortie());
    }

    public function update(highway_exit $sortie) {

        $q = $this->_db->prepare('UPDATE Sortie SET libelle_sortie = :libelle_sortie, code_troncon = :code_troncon, code_troncon_arrivee = :code_troncon_arrivee, id_autoroute = :id_autoroute, id_city = :id_city WHERE numero_sortie = :numero_sortie');

        $q->bindValue(':libelle_sortie', $sortie->libelle_sortie());
        $q->bindValue(':numero_sortie', $sortie->numero_sortie(), PDO::PARAM_INT);
        $q->bindValue(':code_troncon', $sortie->code_troncon(), PDO::PARAM_INT);
        $q->bindValue(':code_troncon_arrivee', $sortie->code_troncon_arrivee(), PDO::PARAM_INT);
        $q->bindValue(':id_city', $sortie->id_city(), PDO::PARAM_INT);
        $q->bindValue(':id_autoroute', $sortie->id_autoroute(), PDO::PARAM_INT);

        $q->execute();
    }

    public function exists($info) {

        if (is_int($info)) { // On veut voir si tel sortie ayant pour numero_sortie $info existe.
            return (bool) $this->_db->query('SELECT COUNT(*) FROM Sortie WHERE numero_sortie = '.$info)->fetchColumn();
        }

        // Sinon, c'est qu'on veut vérifier que le libelle_sortie existe ou pas.

        $q = $this->_db->prepare('SELECT COUNT(*) FROM Sortie WHERE libelle_sortie = :libelle_sortie');
        $q->execute([':libelle_sortie' => $info]);

        return (bool) $q->fetchColumn();
    }

    public function get($numero) {

        $numero = (int) $numero;

        if ($this->exists($numero)) {
            $q = $this->_db->query('SELECT * FROM Sortie WHERE numero_sortie = '.$numero);
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return new highway_exit($data);
        } else {
            //echo $numero . " n'existe pas dans la table.";
            return null;
        }
    }

    public function get_by_troncon($numero) {

        $numero = (int) $numero;

        if ($this->exists($numero)) {
            $q = $this->_db->query('SELECT * FROM Sortie WHERE code_troncon = '.$numero);
            $data = $q->fetch(PDO::FETCH_ASSOC);

            return new highway_exit($data);
        } else {
            //echo $numero . " n'existe pas dans la table.";
            return null;
        }
    }

    public function get_nom_city ($numero) {

        $numero = (int) $numero;

        $q = $this->_db->query('SELECT nom_ville FROM Ville WHERE id_city = '.$numero);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        //echo "nom_ville" . $data["nom_ville"];

        return $data["nom_ville"];

    }

    public function getList() {


        $sorties = [];

        $q = $this->_db->query('SELECT * FROM Sortie ORDER BY numero_sortie');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $sorties[] = new highway_exit($data);
        }
        return $sorties;
    }
}


?>