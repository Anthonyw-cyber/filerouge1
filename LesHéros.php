<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="stylessheet.css"/>
		<meta charset="utf-8" />
        <title>Les Heros</title>
        <script type="text/javascript" src="menu.js"></script>
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=Miyazaki;charset=utf8', 'anthony', 'root');
        }
        catch(Exception $e)
        {
            die('erreur'.$e->getMessage());
        }

        $reponse_heros = $bdd->query("SELECT * FROM heros");
        ?>
	</head>
	<header>

        <?php include('header.php')?>
</header>
	<body class="couleurFond">
    <div class="container">


    <?php
    while($heros = $reponse_heros->fetch())
        { ?>


		<h4><?php echo htmlspecialchars($heros["noms"]) ?> </h4>
        <div class="couleurFondWhite">
		<p>


			<strong> description</strong>: <?php echo htmlspecialchars($heros["description"] )?><br>
            <strong> Role </strong><?php echo htmlspecialchars($heros["role"]) ?>
		</p>
    </div>
            <div class="row">
                <div class=" col-12">
            <img  class=" bordureShadows" src="photo/<?php echo htmlspecialchars($heros["noms"]) ?>.jpeg">
            <?php }?>
            </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    </body>
</html>