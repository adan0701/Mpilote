<?php
include 'dbconnexion.php';


if(isset($_POST['apply'])) {
    $name = htmlspecialchars($_POST['name']);
    $id = htmlspecialchars($_POST['id']);
    $port = htmlspecialchars($_POST['port']);
    $type = htmlspecialchars($_POST['type']);
    $startcommand = htmlspecialchars($_POST['startcommand']);
    $stopcommand = htmlspecialchars($_POST['stopcommand']);
    $req = $db->prepare("UPDATE equipement SET name = '$name', port = '$port', type = '$type', startcommand = '$startcommand', stopcommand = '$stopcommand' WHERE id = '$id'");
    $req->execute();
    header("Location: equipmanagement.php");

}
elseif(isset($_POST['back'])){
    header("Location: index.php");
}
?>