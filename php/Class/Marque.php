<?php
require_once("AfficherTout.php");
require_once("Dao.php");
class Marque {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;
    public function __construct(
        private $nom_marque,
        private $description_marque,
        private $image
    ) {
    }

    public function inserMarque() {
        Dao::inserMarque($this->nom_marque, $this->description_marque, $this->image);
    }

    // pour supprimer une marque
    public static function suppMarque($id_marque) {
        $marque = Marque::afficherMarque($id_marque);
        Dao::supprimerMarque($id_marque);
        $old_img = $marque['br_image'];
        if (!unlink($old_img)) {
            exit("<h3> Failed to delete image!</h3>");
        }
    }

    // return un tableau indexes pour une seul marque 
    public static function afficherMarque($id_marque) {
        return Dao::afficherMarque($id_marque);
    }

    // modifier une marque 
    public static function modifierMarque($nom_marque, $description_marque, $image, $id_marque) {
        Dao::modifierMarque($nom_marque, $description_marque, $image, $id_marque);
    }

    // supprimer une image d'une marque 
    public static function unlinkFile($old_img) {
        if (!unlink($old_img)) {
            exit("<h3> Failed to delete image!</h3>");
        }
    }

    // ajouter une image d'une marque 
    public static function uploadFile($tempname, $image) {
        if (move_uploaded_file($tempname, $image)) {
            return true;
        } else {
            exit("<h3> Failed to upload image!</h3>");
        }
    }
}