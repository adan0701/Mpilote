<?php
if (isset($_POST['submit'])) {
    $ip = htmlspecialchars($_POST['ip']);
    $port = htmlspecialchars($_POST['port']);
    $cmd = html_entity_decode($_POST['cmd']);
    $type = htmlspecialchars($_POST['type']);
    if (!empty($_POST['ip']) AND !empty($_POST['port']) AND !empty(['cmd']) AND !empty(['type'])) {
        if ($type === "UDP") {
            $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
            socket_connect($sock, $ip, $port);
            socket_write($sock, $cmd);
        }
        elseif($type === "TCP") {
            $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            socket_connect($sock, $ip, $port);
            socket_write($sock, $cmd);
        }
		
	}
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPilote</title>
</head>
<body>
<h1>Mode de test</h1>
<a href="index.php">Retour au menu principal</a>
<form action="" method="POST">
            <input type="text" placeholder="IP" name="ip" <?php if(isset($ip)) {echo $ip; } ?> required>
            <input type="text" placeholder="Port" name="port" <?php if(isset($port)) {echo $port; } ?> required>
            <br />
            <label for="TCP">TCP</label>
            <input type="radio" value="TCP" name="type">
            <label for="UDP">UDP</label>
            <input type="radio" value="UDP" name="type" checked>
            <br />
            <input type="text" placeholder="cmd" name="cmd" required>
            <br />
            <input type="submit" id='submit' name='submit' value='Envoyer la commande'>
                
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
</body>
</html>