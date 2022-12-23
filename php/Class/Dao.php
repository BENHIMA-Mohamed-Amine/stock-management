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
    public static function ajouterPersonne($nom, $prenom, $adr, $tele, $email, $image, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO {$nom_de_class}(nom,prenom,adr,tele,email, image) VALUES (?,?,?,?,?,?)";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email, $image]);
    }

    // Modifier un Client ou Fournisseur
    public static function modifierPersonne($id, $nom, $prenom, $adr, $tele, $email, $image, $nom_de_class) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE {$nom_de_class} SET nom=?, prenom=?, adr=?, tele=?, email=?, image=? WHERE id=?";
        $pdo->prepare($sql)->execute([$nom, $prenom, $adr, $tele, $email, $image, $id]);
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
    public static function ajouterCat($lib_cat, $desc_cat, $image) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO categorie(lib_cat, desc_cat, cat_image) VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([$lib_cat, $desc_cat, $image]);
    }

    // bach nmodifier libelle d category
    public static function modifierCat($id_cat, $lib_cat, $desc_cat, $image) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE categorie SET lib_cat=?, desc_cat=?, cat_image=? WHERE id_cat=?";
        $pdo->prepare($sql)->execute([$lib_cat, $desc_cat, $image, $id_cat]);
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
        $sql = "INSERT INTO marque(nom_marque, description_marque, br_image) VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([$nom_marque, $description_marque, $image]);
    }

    // bach nmodifier marque
    public static function modifierMarque($nom_marque, $description_marque, $image, $id_marque) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE marque SET nom_marque=?, description_marque=?, br_image =? WHERE id_marque=?";
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

    public static function addPr($num_pr, $id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO produit VALUES (?,?,?,?,?,?,?,?,?)";
        $pdo->prepare($sql)->execute([$num_pr, $id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image]);
    }

    public static function prJoinCatJoinMarque() {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM (produit NATURAL JOIN categorie) NATURAL JOIN marque;";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function deletePr($num_pr) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM produit WHERE num_pr  = ?";
        $pdo->prepare($sql)->execute([$num_pr]);
    }
    public static function displayPr($num_pr) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM (produit NATURAL JOIN categorie) NATURAL JOIN marque WHERE num_pr=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_pr]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function editPr($num_pr, $id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image, $new_num_pr) {
        $pdo = Dao::getPDO();
        $sql = "UPDATE produit SET id_cat=?, id_marque=?, lib_pr =?, desc_pr=?, prix_uni=?, prix_achat=?, qte_stock=?, pr_image=?, num_pr=? WHERE num_pr=?";
        $pdo->prepare($sql)->execute([$id_cat, $id_marque, $lib_pr, $desc_pr, $prix_uni, $prix_achat, $qte_stock, $image, $new_num_pr, $num_pr]);
    }

    // bach n3ref wach deja m inserya had purchase ola la
    public static function isPurchase($num_app) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM approvisionnement WHERE num_app = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_app]);
        $purchase = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($purchase === false) {
            return false;
        } else {
            return true;
        }
    }

    public static function addPurchase($num_app, $date_app, $id, $desc_app) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO approvisionnement VALUES (?,?,?,?)";
        $pdo->prepare($sql)->execute([$num_app, $date_app, $id, $desc_app]);
    }

    public static function add_pr_of_pruchase($num_app, $num_pr, $qte_achete) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO est_compose VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([$num_app, $num_pr, $qte_achete]);
    }

    public static function editQty($num_pr, $qte_achete) {
        $res = Dao::displayPr($num_pr);
        $old_qty = $res['qte_stock'];
        $pdo = Dao::getPDO();

        $sql = "UPDATE produit SET qte_stock=?+? WHERE num_pr=?";
        $pdo->prepare($sql)->execute([$old_qty, $qte_achete, $num_pr]);
    }

    public static function displayPur($num_app) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM approvisionnement  WHERE num_app=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_app]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function displayPrPurchase($num_app) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM produit NATURAL JOIN est_compose WHERE num_app=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_app]);
        return $stmt->fetchAll();
    }

    public static function deletePrPurchase($num_pr) {
        $res = Dao::displayPr($num_pr);
        $qty = $res['qte_stock'];
        $res = Dao::displayPrPurchase($num_pr);
        $qty_purchase = $res['qte_achete'];
        $pdo = Dao::getPDO();
        $sql = "UPDATE produit SET qte_stock=?-? WHERE num_pr=?";
        $pdo->prepare($sql)->execute([$qty, $qty_purchase, $num_pr]);

        $pdo = Dao::getPDO();
        $sql = "DELETE FROM est_compose WHERE num_pr  = ?";
        $pdo->prepare($sql)->execute([$num_pr]);
    }

    public static function displayAllPur() {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM approvisionnement NATURAL JOIN fournisseur WHERE id_four = id;";
        return $pdo->query($sql)->fetchAll();
    }

    public static function deletePur($num_app) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM approvisionnement WHERE num_app  = ?";
        $pdo->prepare($sql)->execute([$num_app]);
    }

    public static function allAboutProducts() {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM produit NATURAL JOIN marque NATURAL JOIN categorie;";
        return $pdo->query($sql)->fetchAll();
    }

    public static function isSale($num_com) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM commande WHERE num_com = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_com]);
        $purchase = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($purchase === false) {
            return false;
        } else {
            return true;
        }
    }

    public static function addSale($num_com, $date_com, $id_cli) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO commande VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([$num_com, $date_com, $id_cli]);
    }

    public static function prSale($num_pr, $num_com, $qte_pr, $prix_vente) {
        $pdo = Dao::getPDO();
        $sql = "INSERT INTO contient_pr VALUES (?,?,?,?)";
        $pdo->prepare($sql)->execute([$num_pr, $num_com, $qte_pr, $prix_vente]);
    }

    public static function deleteQty($num_pr, $qte_pr) {
        $res = Dao::displayPr($num_pr);
        $old_qty = $res['qte_stock'];
        $pdo = Dao::getPDO();

        $sql = "UPDATE produit SET qte_stock=?-? WHERE num_pr=?";
        $pdo->prepare($sql)->execute([$old_qty, $qte_pr, $num_pr]);
    }

    public static function displayPrsSale($num_com) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM produit NATURAL JOIN contient_pr WHERE num_com=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_com]);
        return $stmt->fetchAll();
    }

    public static function displaySale($num_com) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM commande  WHERE num_com=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_com]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function displayPrSale($num_pr) {
        $pdo = Dao::getPDO();
        $sql = "SELECT * FROM contient_pr  WHERE num_pr=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$num_pr]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function deletePrSale($num_pr) {
        $res = Dao::displayPr($num_pr);
        $qty = $res['qte_stock'];
        $res = Dao::displayPrSale($num_pr);
        $qty_sale = $res['qte_pr'];
        $pdo = Dao::getPDO();
        $sql = "UPDATE produit SET qte_stock=?+? WHERE num_pr=?";
        $pdo->prepare($sql)->execute([$qty, $qty_sale, $num_pr]);
        $sql = "DELETE FROM contient_pr WHERE num_pr  = ?";
        $pdo->prepare($sql)->execute([$num_pr]);
    }

    public static function displayAllSales() {

        $pdo = Dao::getPDO();
        $sql = "SELECT SUM(`qte_pr` * prix_vente) as total, num_pr, num_com, nom, prenom, image, date_com, nom,prenom,num_com
FROM (((contient_pr NATURAL JOIN produit) NATURAL JOIN commande) NATURAL JOIN client)
WHERE id_cli = id
GROUP BY num_com;";
        return $pdo->query($sql)->fetchAll();
    }

    public static function deleteSale($num_com) {
        $pdo = Dao::getPDO();
        $sql = "DELETE FROM Commande WHERE num_com  = ?";
        $pdo->prepare($sql)->execute([$num_com]);
    }
}