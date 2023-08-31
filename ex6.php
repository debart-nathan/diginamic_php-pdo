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
        if (isset($_POST['firstname'])&& isset($_GET["uid"])){
            $params=[
                "id" => $_GET["uid"],
                "email"=> $_POST["email"],
                "firstname"=> $_POST["firstname"],
                "lastname"=> $_POST["lastname"],
            ];
            $req = $dbh->prepare("UPDATE users ".
                "SET firstname = :firstname , email = :email , lastname = :lastname ".
                "WHERE id = :id ;");
            $req->execute($params);
            $user = $req->fetch();
        }


        if (isset($_GET["uid"])) {
            $req = $dbh->prepare("SELECT * FROM users Where id = :id ;");
            $req->execute(["id" => $_GET["uid"]]);
            $user = $req->fetch();
    ?>
    <form method='post'>
        <label>nom <input name="lastname" value="<?php echo $user["lastname"];?>"></label>
        <label>prenom <input name="firstname" value="<?php echo $user["firstname"];?>"></label>
        <label>email <input name="email" value="<?php echo $user["email"];?>"></label>
        <button type="submit">
            Save
        </button>
    </form>
    <?php
        }

        $dbh = null;
    } catch (Exception $e) {
        print "Erreur !: " . $e->getMessage() . PHP_EOL;
        die();
    }
    ?>


</body>

</html>