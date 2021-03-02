<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.

    require "Classes/DB.php";

    $bdd = DB::getInstance();

    $stmt = $bdd->prepare("SELECT MIN(age) as minimum FROM user");

    //3
    $state = $stmt->execute();
    if ($state) {
        $min = $stmt->fetch();
        echo "L'age minimum des utilisateurs est " . $min['minimum'] . " ans <br><br>";
    }

    //4
    $stmt = $bdd->prepare("SELECT MAX(age) as maximum FROM user");

    $state = $stmt->execute();
    if ($state) {
        $max = $stmt->fetch();
        echo "L'age maximum des utilisateurs est " . $max['maximum'] . " ans <br><br>";
    }

    //5
    $stmt = $bdd->prepare("SELECT COUNT(*) as number FROM user");

    $state = $stmt->execute();
    if ($state) {
        $count = $stmt->fetch();
        echo "Il y a " . $count['number'] . " utilisateurs <br><br>";
    }

    //6
    $stmt = $bdd->prepare("SELECT COUNT(*) as number FROM user WHERE numero >= 5");

    $state = $stmt->execute();
    if ($state) {
        $count = $stmt->fetch();
        echo "Il y a " . $count['number'] . " utilisateurs qui ont un numéro de rue >= 5<br><br>";
    }

    //7
    $stmt = $bdd->prepare("SELECT AVG(age) as moyenne_age FROM user");

    $state = $stmt->execute();
    if ($state) {
        $avg = $stmt->fetch();
        echo "La moyenne d'âge des utilisateurs est de " . $avg['moyenne_age'] . " ans <br><br>";
    }

    //8
    $stmt = $bdd->prepare("SELECT SUM(numero) as somme_numero FROM user");

    $state = $stmt->execute();
    if ($state) {
        $sum = $stmt->fetch();
        echo "La somme des numéros de maison des 3 utilisateurs sont de " . $sum['somme_numero'] . " <br><br>";
    }


    ?>
</body>
</html>

