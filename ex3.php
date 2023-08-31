<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">



        <?php
        $params = [];
        $query = "SELECT * FROM users Where 1=1 ";

        //prenom
        echo '<label for="u-prenom">prenom</label>';
        if (isset($_POST["u-prenom"]) and $_POST["u-prenom"] != "") {

            $params['prenom'] = '%' . $_POST["u-prenom"] . "%";

            $query .= "AND firstname LIKE :prenom ";

            echo '<input id="u-prenom" type="text" name="u-prenom" value="' . $_POST["u-prenom"] . '">' . PHP_EOL;
        } else {
            echo '<input id="u-prenom type="text" name="u-prenom">' . PHP_EOL;
        }
        echo "<br>". PHP_EOL;

        //nom
        echo '<label for="u-nom">nom</label>';
        if (isset($_POST["u-nom"]) and $_POST["u-nom"] != "") {

            $params['nom'] = '%' . $_POST["u-nom"] . "%";

            $query .= "AND lastname LIKE :nom ";

            echo '<input id="u-nom" type="text" name="u-nom" value="' . $_POST["u-nom"] . '">' . PHP_EOL;
        } else {
            echo '<input id="u-nom type="text" name="u-nom">' . PHP_EOL;
        }
        echo "<br>". PHP_EOL;

        //mail
        echo '<label for="u-mail">mail</label>';
        if (isset($_POST["u-mail"]) and $_POST["u-mail"] != "") {

            $params['mail'] = '%' . $_POST["u-mail"] . "%";

            $query .= "AND email LIKE :mail ";

            echo '<input id="u-mail" type="text" name="u-mail" value="' . $_POST["u-mail"] . '">' . PHP_EOL;
        } else {
            echo '<input id="u-mail type="text" name="u-mail">' . PHP_EOL;
        }
        echo "<br>". PHP_EOL;


        echo ' <button type="submit" ">recherche</button>' . PHP_EOL;
        echo '</form>' . PHP_EOL;




        try {
            
            $req = $dbh->prepare($query . " LIMIT 200");
            $req->execute($params);
            echo "<ul>";
            foreach ($req as $user) {
                echo "<li><ul>";
                echo "<li>nom: " . $user["lastname"] . "</li>";
                echo "<li> prenom: " . $user["firstname"] . "</li>";
                echo "<li> email:". $user["email"]. "</li>";
                echo '<li><a href="/user?uid='.$user["id"].'">En savoir plus</a></li>';
                echo "</ul></li>";
            }
            echo "</ul>";



            $dbh = null;
        } catch (Exception $e) {
            print("Erreur !: " . $e->getMessage() . "<br/>");
            die();
        }
        ?>

</body>

</html>