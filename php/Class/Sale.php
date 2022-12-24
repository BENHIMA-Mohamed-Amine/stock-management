<?php
require_once("Dao.php");
require_once("TotalLigne.php");
class Sale {
    use TotalLigne;
    public function __construct(
        private $num_com,
        private $date_com,
        private $id_cli
    ) {
    }

    public static function isSale($num_com) {
        return Dao::isSale($num_com);
    }

    public function add() {
        Dao::addSale($this->num_com, $this->date_com, $this->id_cli);
    }

    public static function displaySale($num_com) {
        return Dao::displaySale($num_com);
    }

    public static function displayAllSales() {
        return Dao::displayAllSales();
    }

    public static function deleteSale($num_com) {
        Dao::deleteSale($num_com);
    }

    public static function displaySaleWithPr($num_com) {
        return Dao::displaySaleWithPr($num_com);
    }
    public static function topSales() {
        return Dao::topSales();
    }
}