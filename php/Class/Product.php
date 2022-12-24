<?php
require_once("AfficherTout.php");
require_once("Dao.php");
class Product {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout;
    public function __construct(
        private $num_pr,
        private $id_cat,
        private $id_marque,
        private $lib_pr,
        private $desc_pr,
        private $prix_uni,
        private $prix_achat,
        private $qte_stock,
        private $image
    ) {
    }
    public function addPr() {
        Dao::addPr($this->num_pr, $this->id_cat, $this->id_marque, $this->lib_pr, $this->desc_pr, $this->prix_uni, $this->prix_achat, $this->qte_stock, $this->image);
    }
    public static function prJoinCatJoinMarque() {
        return Dao::prJoinCatJoinMarque();
    }

    public static function deletePr($num_pr) {
        Dao::deletePr($num_pr);
    }
    public static function displayPr($num_pr) {
        return Dao::displayPr($num_pr);
    }
    public static function editPr($num_pr, $id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image, $new_num_pr) {
        Dao::editPr($num_pr, $id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image, $new_num_pr);
    }

    public static function editQty($num_pr, $qte_achete) {
        Dao::editQty($num_pr, $qte_achete);
    }

    public static function allAboutProducts() {
        return Dao::allAboutProducts();
    }

    public static function deleteQty($num_pr, $qte_pr) {
        Dao::deleteQty($num_pr, $qte_pr);
    }

    public static function qtePr($num_pr) {
        return Dao::qtePr($num_pr);
    }

    public static function afficherExepiredPr() {
        return Dao::afficherExepiredPr();
    }
}