<?php

require_once "Dao.php";
require_once("AfficherTout.php");

class Personne {

    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;

    // Constructeur
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $adr,
        protected string $tele,
        protected string $email,
        protected string $image
    ) {
    }

    // Getter
    public function __get(string $property) {
        switch ($property) {
            case 'nom':
                return $this->nom;
            case 'prenom':
                return $this->prenom;
            case 'adr':
                return $this->adr;
            case 'tele':
                return $this->tele;
            case 'email':
                return $this->email;
            case 'image':
                return $this->image;
        }
    }

    // ajouter un nouveau Client ou Fournisseur
    public function Ajouter($nom_de_class) {
        Dao::ajouterPersonne($this->nom, $this->prenom, $this->adr, $this->tele, $this->email, $this->image, $nom_de_class);
    }


    // Modifier un Client ou Fournisseur
    public static function modifier($id, $nom, $prenom, $adr, $tele, $email, $image, $nom_de_class) {
        Dao::modifierPersonne($id, $nom, $prenom, $adr, $tele, $email, $image, $nom_de_class);
    }

    // Supprimer un Client ou Fournisseur
    public static function supprimer($id, $nom_de_class) {
        Dao::supprimerPersonne($id, $nom_de_class);
    }

    // bach n3ref ch7al mn personne kayn f DB
    public static function nbrDesTuples($nom_de_class) {
        return Dao::nbrDesTuples($nom_de_class);
    }

    // bach nafficher personne wa7ed
    public static function affciherPersonne($id, $nom_de_class) {
        return Dao::affciherPersonne($id, $nom_de_class);
    }
}