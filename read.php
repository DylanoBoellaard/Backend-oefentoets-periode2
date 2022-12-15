<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    // 3. Maak een pdo-object aan voor het maken van de verbinding
    $pdo = new PDO($dsn,$dbUser,$dbPass);
    if ($pdo) {
        echo "Er is verbinding gemaakt met de MySQL database";
    } else {
        echo 'Internal server error, contact database admin';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT Id
            ,Name
            ,Networth
            ,Age
            ,Mycompany
        FROM RichestPeople
        ORDER BY Id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->Name</td>
                <td>$info->Networth</td>
                <td>$info->Age</td>
                <td>$info->Mycompany</td>
                <td>
                    <a href='delete.php?id={$info->Id}'>
                        <img src='b_drop.png' alt='Drop'</img>
                    </a>
                </td>
                <td>
                    <a href='update.php'>
                        <img src='b_edit.png' alt='Edit'</img>
                    </a>
                </td>
             <tr>";
}

?>

<a href="index.html">Home page</a>
<h3>Persoonsgegevens</h3>
<table border="1">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Networth</th>
        <th>Age</th>
        <th>MyCompany</th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>