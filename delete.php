<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    
    if ($pdo) {
        echo "Er is een verbinding gemaakt met de database<br>";
    } else {
        echo "Internal server error<br>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "DELETE FROM RichestPeople
        WHERE Id = :SQLId";

$statement = $pdo->prepare($sql);

$statement->bindValue(':SQLId', $_GET['id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    // Geef een melding dat het gelukt is
    echo "Succesvol verwijderd van de record met id {$_GET['id']}";
    header('Refresh:3;url=read.php');
} else {
    echo "Internal server error, record is niet verwijderd";
    header('Refresh:3,url=read.php');
}