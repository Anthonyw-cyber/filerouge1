
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>api</title>

    <link rel="stylesheet" href="stylessheet.css"/>
    <?php $donnee_api = file_get_contents('http://localhost:8888/api2.php');
    $donnee_api_result =json_decode($donnee_api,true);?>


</head>
<header>
    <ul class="fondlu">
        <li><a href="index.html">Accueil </a></li>
        <li><a href="LesFilms.php">Les Films</a></li>
        <li><a href="LesHéros.php">Les Héros</a></li>
        <li><a href="apiaffiche.php">Music des films</a></li>
</header>
<body class="couleurFond">
<div class="divapi">
    <?php

    foreach ($donnee_api_result as $api)

    {
        ?>

        <?php if($api['id']>5 && $api['id']<=11)
    {?>

        <div class="divalign">
            <img class="bordureShadow_api"  src="<?php echo htmlspecialchars($api["image"])?>" alt="affiche du Film" width="400px"><br>

            <strong>Film :</strong><?php  echo htmlspecialchars($api["nom"]); ?><br>
            <strong>Music :</strong>  <?php echo htmlspecialchars($api["music"]);?>
        </div>
    <?php } ?>
    <?php }
    ?>
</div>
</body>
<footer>
    <nav>
        <ul class="listecenter">
            <li class="lirond"><a href="apiaffiche.php">1</a></li>
            <li class="lirond"><a href="apiaffiche2.php" >2</a></li>
        </ul>
    </nav>
</footer>
</html>
