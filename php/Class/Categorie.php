<?php
require_once("./AfficherTout.php");
class Categorie {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;
    public function __construct(
        private string $lib_cat
    ) {
    }

    // bach n inserer categorie jdida
    public function ajouterCat() {
        Dao::ajouterCat($this->lib_cat);
    }

    // bach nmodifier libelle d category
    public static function modifierCat($id_cat, $lib_cat) {
        Dao::modifierCat($id_cat, $lib_cat);
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