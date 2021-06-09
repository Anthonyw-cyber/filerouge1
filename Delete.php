<?php
header('Content-Type: application/json');

///**
// * connexion à la base de données
// */
try {
    $connexion = new PDO('mysql:host=localhost;dbname=Miyazaki;charset=utf8', 'anthony', 'root');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de données réussie";
} catch (Exception $ex) {
    $retour["success"] = false;
    $retour["message"] = "Erreur de connexion à la base de données";
}


if (!empty($_GET['id'])) {
    //Si le client a saisis un id

    $requete = $connexion->prepare("DELETE FROM hisaishi WHERE id = :id");
    $requete->bindParam(':id', $_GET['id']);

    if ($requete->execute()) {
        $success = true;
        $msg = 'La music est supprimé';
    } else {
        $msg = "Une erreur s'est produite";
    }
} else {
    $msg = "Il manque des informations";
}

