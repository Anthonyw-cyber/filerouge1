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
if( !empty($_GET['film_id']) && !empty($_GET['music'])  ) {
    //Si toutes les données sont saisie par le client

$requete = $connexion->prepare("INSERT INTO hisaishi (film_id, music) VALUES ( :film_id, :music);");
$requete->bindParam(':film_id', $_GET['film_id']);
$requete->bindParam(':music', $_GET['music']);


if ($requete->execute()) {
    $success = true;
    $msg = 'La music a bien été ajouté';
}


else {
    $msg = "Il manque des informations";
}

}
