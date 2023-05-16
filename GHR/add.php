<?php
include "../dbconnexion.php";
if (isset($_POST['submit'])) {
    $ip = htmlspecialchars($_POST['ip']);
    $equiptype = htmlspecialchars($_POST['equiptype']);
    if (!empty($_POST['ip']) AND !empty($_POST['equiptype'])) {
        $sql = "SELECT * FROM equipement";
   
        try{
         $stmt = $db->query($sql);
         
         if($stmt === false){
          die("Erreur");
         }
         
        }catch (PDOException $e){
          echo $e->getMessage();
        }
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($row['name'] === $equiptype) {
                $name = $row['name'];
                $port = htmlspecialchars($row['port']);
                $type = htmlspecialchars($row['type']);
                $start_command = htmlspecialchars($row['startcommand']);
                $stop_command = htmlspecialchars($row['stopcommand']);
                $insert = $db->prepare("INSERT INTO ghr(name, ip, port, type, startcommand, stopcommand) VALUES(?, ?, ?, ?, ?, ?)");
                $insert->execute(array($name ,$ip, $port, $type, $start_command, $stop_command));
                header("Location: index.php");
            }
        }
    } else {
        $erreur = "Veuillez compléter tous les champs";
    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>
<form action="actionbutton.php" method="POST">
<input type="submit" name="back" value="Back to main menu">
</form>
<br />
<form action="" method="POST">
<fieldset>
    <legend>Ajouter un équipement :</legend>
                <input type="text" placeholder="IP" name="ip" value="10.1.124."required>
                <br />
                <label for="equiptype">Choissisez un type d'équipement :</label>
                <br />
                <?php 
                  $sql = "SELECT * FROM equipement";
   
                  try{
                   $stmt = $db->query($sql);
                   
                   if($stmt === false){
                    die("Erreur");
                   }
                   
                  }catch (PDOException $e){
                    echo $e->getMessage();
                  } 
                ?>
                <select name="equiptype" id="equiptype">
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <?php $equiptype = htmlspecialchars($row['name']); ?>
                    <option value="<?php echo $equiptype; ?>"><?php echo $equiptype; ?></option>
                    <?php endwhile; ?>
                </select>
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