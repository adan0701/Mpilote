<?php
include "dbconnexion.php";


if(isset($_POST['delete'])) {
    $name = htmlspecialchars($_POST['name']);
    $req = $db->prepare("DELETE FROM equipement WHERE name = '$name'");
    $req->execute();
    header("Location: equipmanagement.php");
}
elseif(isset($_POST['new'])){
    header("Location: newequip.php");
}
elseif(isset($_POST['main'])) {
    header("Location: index.php");
}
elseif(isset($_POST['test'])) {
    header("Location: test.php");
}
elseif(isset($_POST['equipmanagement'])) {
    header("Location: equipmanagement.php");
}
?>