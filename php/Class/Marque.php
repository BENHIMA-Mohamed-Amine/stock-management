<?php
require_once("./AfficherTout.php");
class Marque {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;
    public function __construct(
        private $nom_marque,
        private $description_marque
    ) {
    }

    public function inserMarque() {
        Dao::inserMarque($this->nom_marque, $this->description_marque);
    }


}