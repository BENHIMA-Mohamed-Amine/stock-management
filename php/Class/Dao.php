<?php

class Dao {
    // Pour la conexion avec DB
    public static function getPDO() {
        try {
            $pdo = new \PDO('mysql:host=localhost;dbname=gestion_des_stocks', "root", "");
            return $pdo;
        } catch (\Throwable) {
            exit("<b>ERREUR :</b> dans la conexion avec la DB"); // Stoper l'execution de programme est afficher le message celle dans exit function
        }
    }

    // ajouter un nouveau Client ou Fournisseur
    public static function ajouterPersonne($nom, $prenom, $adr, $tele, $email, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO {$nom_de_class}(nom,prenom,adr,tele,email) VALUES (?,?,?,?,?)";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email]);
    }

    // Modifier un Client ou Fournisseur
    public static function modifierPersonne($id, $nom, $prenom, $adr, $tele, $email, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE {$nom_de_class} SET nom=?, prenom=?, adr=?, tele=?, email=? WHERE id=?";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email, $id]);
        // print_r($pdo);
    }

    // Supprimer un Client ou Fournisseur ou Admin
    public static function supprimerPersonne($id, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM {$nom_de_class} WHERE id  = ?";
        $pdo->prepare($sql)->execute([$id]);
    }

    // pour recuperer ga3 data li kayn f table farray soit ta3 admin soit ta3 client soit fournisseur
    public static function afficher($nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM $nom_de_class";
        return $pdo->query($sql)->fetchAll();
    }

    // bach n3ref ch7al mn wa7ed 3nedi soit admin soit client soit fournisseur 
    static public function nbrDesTuples($nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "SELECT count(id) as nbrDesTuples FROM $nom_de_class;";
        $stmt = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $somme = $stmt['nbrDesTuples'];
        return $somme;
    }

    // ajouter un nouveau admin
    public static function ajouterAdmin($nom, $prenom, $adr, $tele, $email, $mdp, $image, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO {$nom_de_class}(nom,prenom,adr,tele,email,mdp,image) VALUES (?,?,?,?,?,?,?)";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email, $mdp, $image]);
    }

    // Modifier un Admin
    public static function modifierAdmin($id, $nom, $prenom, $adr, $tele, $email, $mdp, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE {$nom_de_class} SET nom=?, prenom=?, adr=?, tele=?, email=?, mdp=? WHERE id=?";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email, $mdp, $id]);
    }

    public static function modifierImageAdmin($id, $image) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE admin SET image=? WHERE id=?";
        $pdo->prepare($sql)->execute([$image, $id]);
    }

    // bach n inserer categorie jdida
    public static function ajouterCat($lib_cat) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO categorie(lib_cat) VALUES (?)";
        $pdo->prepare($sql)->execute([$lib_cat]);
    }

    // bach nmodifier libelle d category
    public static function modifierCat($id_cat, $lib_cat) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE categorie SET lib_cat=? WHERE lib_cat=?";
        $pdo->prepare($sql)->execute([$lib_cat, $id_cat]);
    }

    // Supprimer une categorie
    public static function supprimerCat($id_cat) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM categorie WHERE id_cat  = ?";
        $pdo->prepare($sql)->execute([$id_cat]);
    }

    // bach n3ref ch7al mn category kayna f DB
    public static function nbrDesCat() {
        $pdo = Dao::getPDO();
        $sql = "SELECT count(id_cat) as nbrDesCat FROM categorie;";
        $stmt = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $somme = $stmt['nbrDesCat'];
        return $somme;
    }

    // bach nafficher personne wa7ed
    public static function affciherPersonne($id, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM $nom_de_class WHERE id = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $personne = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($personne === false) {
            exit("cet id = {$id} n'exist pas");
        }
        return $personne;
    }

    // bach afficher categorie we7da

    public static function affichetCat($id_cat) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM categorie WHERE id_cat = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_cat]);
        $cat = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($cat === null || $cat === false) {
            exit("cet id = {$id_cat} n'exist pas");
        }
        return $cat;
    }

    // bach ninserer marque
    public static function inserMarque($nom_marque, $description_marque, $image) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO marque(nom_marque, description_marque, image) VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([$nom_marque, $description_marque, $image]);
    }

    // bach nmodifier marque
    public static function modifierMarque($nom_marque, $description_marque, $image, $id_marque) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE marque SET nom_marque=?, description_marque=?, image =? WHERE id_marque=?";
        $pdo->prepare($sql)->execute([$nom_marque, $description_marque, $image, $id_marque]);
    }

    // bach nsupprimer une marque
    public static function supprimerMarque($id_marque) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM marque WHERE id_marque  = ?";
        $pdo->prepare($sql)->execute([$id_marque]);
    }

    // bach afficher marque we7da

    public static function afficherMarque($id_marque) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM marque WHERE $id_marque = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_marque]);
        $marque = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($marque === false) {
            exit("cet id = {$id_marque} n'exist pas");
        }
        return $marque;
    }

    public static function adminExiste($email) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM admin WHERE email = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        // echo ("<pre>");
        // print_r($stmt->fetch());
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}