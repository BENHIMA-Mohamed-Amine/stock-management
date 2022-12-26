<?php
require_once "Dao.php";
class PrPurchase {
    public function __construct(
        private $num_app,
        private $num_pr,
        private $qte_achete
    ) {
    }

    public function add() {
        Dao::add_pr_of_pruchase($this->num_app, $this->num_pr, $this->qte_achete);
    }

    public static function displayPrPurchase($num_app) {
        return Dao::displayPrPurchase($num_app);
    }
}