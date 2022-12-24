<?php
/**
 * 
 */
trait TotalLigne {
    public static function TotalLigne($nom_de_class) {
        return Dao::TotalLigne($nom_de_class);
    }
}