<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', "diginamique", "diginamique", array(PDO::ATTR_PERSISTENT));
    echo "Database handler ok" . PHP_EOL;
    $req =$dbh->query("SELECT * FROM users");
    echo $req->rowCount() . PHP_EOL ;
    $dbh = null;
    echo "Database handler null";
} catch (Exception $e) {
    print( "Erreur !: " . $e->getMessage() . "<br/>");
    die();
}
