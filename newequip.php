<?php
include "dbconnexion.php";

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $port = htmlspecialchars($_POST['port']);
    $type = htmlspecialchars($_POST['type']);
    $startcommand = htmlspecialchars($_POST['startcommand']);
    $stopcommand = htmlspecialchars($_POST['stopcommand']);
    if(!empty($_POST['name']) AND !empty(['port']) AND !empty(['type']) AND !empty(['startcommand']) AND !empty(['stopcommand'])) {
        $insert = $db->prepare("INSERT INTO equipement(name, startcommand, stopcommand, port, type) VALUES(?, ?, ?, ?, ?)");
        $insert->execute(array($name, $startcommand, $stopcommand, $port, $type));
        $erreur = "Device added to database !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New type of device</title>
</head>
<body>
<a href="equipmanagement.php">Back to main menu</a>
<br />
<form action="" method="POST">
<fieldset>
    <legend>Add a type of device :</legend>
                <input type="text" placeholder="Name" name="name" required>
                <br />
                <input type="text" placeholder="Port" name="port" required>
                <br />
                <input type="text" placeholder="Type of connexion" name="type" required>
                <br />
                <input type="text" placeholder="Start command" name="startcommand" required>
                <br />
                <input type="text" placeholder="Stop command" name="stopcommand" required>
                <br />
                <input type="submit" id='submit' name='submit' value='+ Ajouter'>
            </form>
            <?php 
			if(isset($erreur))
			{
				echo '<font color="red">' . $erreur . '</font>';
			}
			else
			{
				echo " ";
			}
			?>
</fieldset>
</body>
</html>