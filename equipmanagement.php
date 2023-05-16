<?php
include 'dbconnexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/createequip.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <title>Gérer les équipements</title>
</head>
<body>
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

<form action="actionequipbutton.php" method="POST">
<input type="submit" name="main" value="Back to main menu">
<input type="submit" name="new" value="New device type">
</form>
<table>
   <thead>
       <th scope="col">Name</th>
       <th scope="col">Port</th>
       <th scope="col">Type</th>
       <th scope="col">Start command</th>
       <th scope="col">Stop command</th>
     </tr>
   </thead>
   <tbody>
   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):  ?>
     <tr>
     <th><?php $name = htmlspecialchars($row['name']);
                  echo $name; ?></th>
      </th>
      <th><?php $port = htmlspecialchars($row['port']);
                  echo $port; ?></th>
      </th>
      <th><?php $type = htmlspecialchars($row['type']);
                  echo $type; ?></th>
      </th>
      <th><?php $startcommand = htmlspecialchars($row['startcommand']);
                  echo $startcommand; ?></th>
      </th>
      <th><?php $stopcommand = htmlspecialchars($row['stopcommand']);
                  echo $stopcommand; ?></th>
      </th>
      <form action="editequip.php" method="POST">
      <th><input type="submit" name="edit" value="EDIT">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="startcommand" value="<?php echo $startcommand; ?>">
      <input type="hidden" name="stopcommand" value="<?php echo $stopcommand; ?>">
      <input type="hidden" name="port" value="<?php echo $port; ?>">
      <input type="hidden" name="type" value="<?php echo $type; ?>">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    </th>
      </form>

      <form action="actionequipbutton.php" method="POST">
      <th><input type="submit" name="delete" value="DELETE">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
        </th>
      </form>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>