<?php
require_once("AfficherTout.php");
require_once("Dao.php");
class Categorie {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;
    public function __construct(
        private string $lib_cat,
        private string $desc_cat,
        private string $image
    ) {
    }

    // bach n inserer categorie jdida
    public function ajouterCat() {
        Dao::ajouterCat($this->lib_cat, $this->desc_cat, $this->image);
    }

    // bach nmodifier libelle d category
    public static function modifierCat($id_cat, $lib_cat, $desc_cat, $image) {
        Dao::modifierCat($id_cat, $lib_cat, $desc_cat, $image);
    }

    // Supprimer une categorie
    public static function supprimerCat($id_cat) {
        Dao::supprimerCat($id_cat);
    }

    // bach n3ref ch7al mn category kayna f DB
    public static function nbrDesCat() {
        return Dao::nbrDesCat();
    }

    // bach afficher categorie we7da

    public static function affichetCat($id_cat) {
        return Dao::affichetCat($id_cat);
    }
}