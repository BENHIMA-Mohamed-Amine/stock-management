<?php
/**
 * bahc nafficher ga3 data li kayna f ayatoha table
 */
trait AfiicherTout {
    public static function afficher($nom_de_class) {
        return Dao::afficher($nom_de_class);
    }
}