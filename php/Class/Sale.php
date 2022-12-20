<?php
class Sale {
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
}