<?php
include '../dbconnexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="../css/ghr.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <title>GHR</title>
</head>
<body onload="sortTable()">

<h1>Équipement de la salle GHR</h1>


<form action="actionbutton.php" method="POST">
<input type="submit" name="back" value="Back to main menu">
<input type="submit" name="add" value="Add a device">
</form>

<br /><br />

<?php

  $sql = "SELECT * FROM ghr";
   
  try{
   $stmt = $db->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<table id="iptable">
   <thead>
       <th scope="col">Name</th>
       <th scope="col">Ip</th>
       <th scope="col">Port</th>
       <th scope="col">State</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):  ?>
     <tr>
        <th scope="row"><?php $name = htmlspecialchars($row['name']);
                  echo $name ?></th>
       <th scope="row"><?php $ip = htmlspecialchars($row['ip']);
                  echo $ip ?></th>
       <th><?php $port = htmlspecialchars($row['port']);
                  echo $port ?></th>
                  <th>??
                  <?php
                  /*
                  if(htmlspecialchars($row['type']) === "TCP") {
                    $start = "(PWR?)";
                    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            
                    socket_connect($sock, $ip, $port);
                    socket_write($sock, $start);
                    echo "TCP";
                  }
                  elseif(htmlspecialchars($row['type']) === "UDP") {
                    echo "UDP";
                  }
                  */
                ?>






                  </th>
       <th>
       <form action="actionbutton.php" method="POST">
        <input type="submit" name="start" value="START">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="type" value="<?php echo htmlspecialchars($row['type']); ?>">
        <input type="hidden" name="startcommand" value="<?php echo htmlspecialchars($row['startcommand']); ?>">
        <input type="hidden" name="stopcommand" value="<?php echo htmlspecialchars($row['stopcommand']); ?>">
     </form>
    </th>
       <th>
       <form action="actionbutton.php" method="POST">
        <input type="submit" name="stop" value="STOP">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="type" value="<?php echo htmlspecialchars($row['type']); ?>">
        <input type="hidden" name="startcommand" value="<?php echo htmlspecialchars($row['startcommand']); ?>">
        <input type="hidden" name="stopcommand" value="<?php echo htmlspecialchars($row['stopcommand']); ?>">
     </form>
      </th>
      <th>
       <form action="actionbutton.php" method="POST">
        <input type=<?php
        if(htmlspecialchars($row['type']) === "TCP") {
          echo "hidden";
        }
        else {
          echo "submit";
        }
        ?> name="reboot" value="REBOOT">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="type" value="<?php echo htmlspecialchars($row['type']); ?>">
     </form>
      </th>
      <th>
       <form action="actionbutton.php" method="POST">
        <input type="submit" name="delete" value="Delete">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
     </form>
      </th>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 <br />
 <form action="" method="POST">
 <input type="submit" name="startall" value="START all">
 </form>
 <br />
 <form action="" method="POST">
 <input type="submit" name="stopall" value="STOP all">
 </form>
 <br />
 <form action="" method="POST">
 <input type="submit" name="refresh" value="Refresh Status">
 </form>

 <?php
   $sql = "SELECT * FROM ghr";
   
   try{
    $stmt = $db->query($sql);
    
    if($stmt === false){
     die("Erreur");
    }
    
   }catch (PDOException $e){
     echo $e->getMessage();
   }

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    if (isset($_POST['startall'])) {

      $ip = htmlspecialchars($row['ip']);
      $port = htmlspecialchars($row['port']);
      $type = htmlspecialchars($row['type']);
      $start = htmlspecialchars($row['startcommand']);
      if($type === "UDP") {

        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_connect($sock, $ip, $port);
        socket_write($sock, $start);
      }
      elseif($type === "TCP") {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($sock, $ip, $port);
        socket_write($sock, $start);
      }
  }
  elseif (isset($_POST['stopall'])) {
    $ip = htmlspecialchars($row['ip']);
    $port = htmlspecialchars($row['port']);
    $type = htmlspecialchars($row['type']);
    $start = htmlspecialchars($row['stopcommand']);
    
    if ($type === "UDP") {
      $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
      socket_connect($sock, $ip, $port);
      socket_write($sock, $start);
    }
    elseif($type === "TCP") { 
      $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
      socket_connect($sock, $ip, $port);
      socket_write($sock, $start);
    }
  }
}
/*
if(strtolower(PHP_OS)=='winnt'){
  $command = "ping -n 1 $address";
  exec($command, $output, $status);
}else{
  $command = "ping -c 1 $address";
  exec($command, $output, $status);
}
if($status === 0){
//      echo '<img src="/assets/UP.png" alt="UP" height="40px" weight="40px">';
echo "UP";
  return true;
}else{
//      echo '<img src="/assets/DOWN.PNG" alt="DOWN" height="40px" weight="40px">';
echo "DOWN";
  return false;
}
*/
   ?>
</body>
</html>