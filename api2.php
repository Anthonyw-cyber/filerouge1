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


$request = $connexion->prepare("SELECT * FROM Hisaishi INNER JOIN films ON Hisaishi.film_id = films.film_id ");
$request->execute();

 $resultat = $request->fetchAll(PDO::FETCH_ASSOC);

 $retour["message"] = "voici les music des films ";



echo json_encode(($resultat),JSON_NUMERIC_CHECK);?>

