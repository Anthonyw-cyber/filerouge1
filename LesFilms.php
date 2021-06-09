<!DOCTYPE html>
<html>
	<head> 

		<meta charset="utf-8" />
        <title>Les Films</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="stylessheet.css"/>


        <script type="text/javascript" src="lesfilms.js"></script>
        <script type="text/javascript" src="menu.js"></script>
        <?php
       try
       {
           $bdd = new PDO('mysql:host=localhost;dbname=Miyazaki;charset=utf8', 'anthony', 'root');
           $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
       catch(Exception $e)
       {
           die('erreur'.$e->getMessage());
       }
       $reponse_film = $bdd ->query("SELECT * FROM films");

        $apie = json_decode(file_get_contents('https://filrouge.uha4point0.fr/Miyasaki/films'));?>

	</head>


	<header>

   <?php include('header.php')?>
	</header>
	<body class="couleurFond">
    <?php
    $number = 0;
    while($film = $reponse_film->fetch())
    { ?>

	<br>
		<h4><?php
            echo htmlspecialchars($film["nom"]) ?></h4>
        <div>
        <div class="couleurFondWhite" align="center">     <strong>Année de parution</strong>:<?php  echo htmlspecialchars($film["annee"]) ?></br>
            <button  onclick="showHide(<?php echo htmlspecialchars($number) ?>)">Détails </button>
        <div  class="fondu"id="detaille<?php echo htmlspecialchars($number) ?>" style="display:none">
        <strong>Notes</strong><?php echo htmlspecialchars($film["note"]) ?><br>

        <strong>Genre</strong>
           <?php $query = 'SELECT f.*, g.genre genre_nom FROM films f
				INNER JOIN genres_films f_g ON f.film_id = f_g.id_films
				INNER JOIN genres g ON f_g.genres_id = g.genre_id';

            $rep = $bdd->query($query);
            $rep->execute();

            $filmQuery = $rep->fetchAll();

            $rep->closeCursor();

            $fil = [];

            foreach ($filmQuery as $element) {
                $obj = [];

                if (isset($fil[$element['film_id']])) {
                    $obj = $fil[$element['film_id']];
                }

                $obj['nom'] = $element['nom'];
                $obj['film_id'] = $element['film_id'];
                $obj['annee'] = $element['annee'];
                $obj['note'] = $element['note'];
                $obj['image'] = $element['image'];
                $obj['trailers'] = $element['trailers'];

                $genres = [];

                if (isset($obj['genre_nom'])) {
                    $genres = $obj['genre_nom'];
                }

                array_push($genres, $element['genre_nom']);
                $obj['genre_nom'] = $genres;

                $fil[$element['film_id']] = $obj;
            }

            foreach ($fil[$film['film_id']]['genre_nom'] as $genres) {
            ?>
           <?php

                echo  htmlspecialchars($genres) .' <br>';

            }



           $reponse_heros = $bdd->query("SELECT * FROM heros");
            while( $heros = $reponse_heros->fetch())
            {

                if($film["film_id"] == $heros['film'])
                {
            ?>


                <h5><?php echo htmlspecialchars($heros['noms'])?></h5></br>
                <img  class="image_bouge" src="photo/<?php echo htmlspecialchars($heros["noms"])?>.jpeg"></br>
             <strong>Description: </strong><?php echo htmlspecialchars($heros['description'])?></br>
             <strong>role: </strong><?php echo htmlspecialchars($heros['role'])?></br>
           <?php }
            }
            ?>



        </div>
        </div>




        </div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-6 col-lg-5 ml-4"><img class="bordureShadow_film"  src="<?php echo htmlspecialchars($film["image"])?>" alt="affiche du Film" width="400px"><br>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-6"><video controls width="560" height="315">
                <source src="video/<?php echo htmlspecialchars($film["nom"])?>.mp4">
                <source src="video/<?php echo htmlspecialchars($film["nom"])?>.webm">
                </video>
            </div>





	</div>
    </div>
    <?php $number++; }$reponse_heros->closeCursor();
    $reponse_film->closeCursor();

    ?>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	</body>
</html>