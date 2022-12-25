<?php
require_once "Dao.php";
require_once("AfficherTout.php");
require_once("TotalLigne.php");
class Purchase {
    // bach ndeclarer la methode afficher li ftrait f had la class
    use AfiicherTout, TotalLigne;
    public function __construct(
        private $num_app,
        private $date_app,
        private $id_four,
        private $desc_app
    ) {
    }

    public static function isPurchase($num_app) {
        return Dao::isPurchase($num_app);
    }

    public function add() {
        Dao::addPurchase($this->num_app, $this->date_app, $this->id_four, $this->desc_app);
    }

    public function __get($prop) {
        switch ($prop) {
            case 'num_app':
                return $this->num_app;
            case 'date_app':
                return $this->date_app;
            case 'desc_app':
                return $this->desc_app;
        }
    }

    public static function displayPur($num_app) {
        return Dao::displayPur($num_app);
    }

    public static function deletePrPurchase($num_pr, $num_app) {
        Dao::deletePrPurchase($num_pr, $num_app);
    }

    public static function displayAllPur() {
        return Dao::displayAllPur();
    }

    public static function deletePur($num_app) {
        Dao::deletePur($num_app);
    }

}