<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn,$dbUser,$dbPass);
    if ($pdo) {
        echo 'Er is een verbinding gemaakt met de MYSQL database';
    } else {
        echo 'Internal server error, contact database admin';
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO RichestPeople (Id
                                    ,Name
                                    ,Networth
                                    ,Age
                                    ,Mycompany)
        VALUES                      (NULL
                                    ,:name
                                    ,networth
                                    ,age
                                    ,mycompany);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$statement->bindValue(':networth', $_POST['networth'], PDO::PARAM_STR);
$statement->bindValue(':age', $_POST['age'], PDO::PARAM_STR);
$statement->bindValue(':mycompany', $_POST['mycompany'], PDO::PARAM_STR);

$statement->execute();

header('Location: read.php');