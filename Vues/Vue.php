<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue d'exemple</title>
</head>
<body>
    <h1>Ma liste de super fruits :</h1>
    <ul>
    <?php
        foreach($fruits as $fruit){
            echo $fruit;
        }
    ?>
    </ul>
</body>
</html>