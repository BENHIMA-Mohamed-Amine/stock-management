<?php
class PrSale {
    public function __construct(
        private $num_pr,
        private $num_com,
        private $qte_pr,
        private $prix_vente
    ) {
    }

    public function add() {
        Dao::prSale($this->num_pr, $this->num_com, $this->qte_pr, $this->prix_vente);
    }

    public static function displayPrsSale($num_com) {
        return Dao::displayPrsSale($num_com);
    }

    public static function deletePrSale($num_pr) {
        Dao::deletePrSale($num_pr);
    }
} 