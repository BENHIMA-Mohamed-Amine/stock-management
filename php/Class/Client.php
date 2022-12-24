<?php
require_once("Personne.php");
class Client extends Personne {
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