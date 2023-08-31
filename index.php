<?php
 $dbh = new PDO(
    'mysql:host=localhost;dbname=test',
    "diginamique",
    "diginamique",
    array(PDO::ATTR_PERSISTENT)
);
switch(strtok($_SERVER["REQUEST_URI"], '?')){
    case "/users":
        include_once __DIR__."/ex3.php";
        break;
    case "/user":
        include_once __DIR__."/ex6.php";
        break;
    default:
        include_once __DIR__."/ex3.php";
        break;
}