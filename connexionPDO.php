<?php

$hostnom = 'host=btssio.dedyn.io';
$usernom = 'BOULECT';
$password = '20050324';
$bdd = 'BOULECT_Biblio';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>