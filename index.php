<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oefentoets periode 2</title>
</head>
<body>
    <h3>Richest people</h3>
    <a href="read.php">DB Table</a>
    <form action="create.php" method="post">
        <label for="name">Name</label>
            <input type="text" name="name" id="name"><br>
        <label for="networth">Networth</label>
            <input type="text" name="networth" id="networth"><br>
        <label for="age">Age</label>
            <input type="text" name="age" id="age"><br>
        <label for="mycompany">MyCompany</label>
            <input type="text" name="mycompany" id="mycompany"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>