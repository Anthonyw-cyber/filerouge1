
<?php
include('reset.php');
    $bdd = new mysqli('localhost', 'root', 'root', 'Miyazaki');
    if ($bdd->connect_error) {
        die("Connection failed: " . $bdd->connect_error);
    }
    $donnee_film = file_get_contents('https://filrouge.uha4point0.fr/Miyasaki/films');
    $donnee_film_result =json_decode($donnee_film,true);
    $donnee_heros = file_get_contents('https://filrouge.uha4point0.fr/Miyasaki/heros');
    $donnee_heros_result = json_decode($donnee_heros, true);




$tabgenre=[];
$id=1;
foreach($donnee_film_result as $film)
{
    foreach($film["Genre"] as $genre){
        if(!isset($tabgenre[$genre]) or !$tabgenre[$genre]){
            $tabgenre[$genre]=$id;
            $id++;
        }
    }

}

foreach($tabgenre as $genre => $id){
    $query = "INSERT INTO genres (genre) VALUES (?);";
    $queryPrepared= $bdd->prepare($query);
    $queryPrepared->bind_param("s", $genre);
    $queryPrepared->execute();
}


foreach($donnee_film_result as $film)
    {


       $query = "INSERT INTO films (nom,annee,note,image,trailers) VALUES (?,?,?,?,?);";
       $queryPrepared= $bdd->prepare($query);
       $queryPrepared->bind_param("sssss", $film['nom'],$film['annee'],$film['note'],$film['image'],$film['trailer']);
       $queryPrepared->execute();

       foreach($film["Genre"] as $genre){
            $id_genre=$tabgenre[$genre];
            $query = "INSERT INTO genres_films (id_films,genres_id) VALUES ('".$film['id']."','".$id_genre."')";
            $queryPrepared= $bdd->prepare($query);
            $queryPrepared->execute();
       }


    }


?>
<?php foreach($donnee_heros_result as $heros)
{

    $query = "INSERT INTO heros (noms,film,description,`role` ) VALUES (?,?,?,?);";
    $queryPrepared= $bdd->prepare($query);
    $queryPrepared->bind_param("siss", $heros['nom'],$heros['film'],$heros['description'],$heros['role']);
    $queryPrepared->execute();
}




?>