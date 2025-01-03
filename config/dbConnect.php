<?php
$user = "root"; //variavel em PHP usa $
$pass = "senac123";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=labmaker', $user, $pass);
    echo "";
} catch (PDOException $e) {
    echo "";
    echo $e;
}
?>