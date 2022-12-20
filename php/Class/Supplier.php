<?php
require_once("Personne.php");
class Supplier extends Personne {
    public function __construct(
        $nom,
        $prenom,
        $adr,
        $tele,
        $email,
        $image
    ) {
        Personne::__construct($nom, $prenom, $adr, $tele, $email, $image);
    }
}