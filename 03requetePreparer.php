<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    try {
        
        if (isset($_GET["uid"])) {
            // $_GET["uid"] will be escaped with \ and will not be evaluated
            // that protect against sql injection.
            // also the base request without the parameter will be loaded.
            // and so subsequent call during the connection lifespan will be faster
            $req = $dbh->prepare("SELECT * FROM users Where id = :id ;");
            $req->execute(["id" => $_GET["uid"]]);
            var_dump($req->fetch());
            echo "<br>";
        }

        $dbh = null;
    } catch (Exception $e) {
        print("Erreur !: " . $e->getMessage() . "<br/>");
        die();
    }
    ?>


</body>

</html>