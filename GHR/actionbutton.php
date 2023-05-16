<?php
include "../dbconnexion.php";


if(isset($_POST['start'])) {
    $ip = htmlspecialchars($_POST['ip']);
    $port = htmlspecialchars($_POST['port']);
    $type = htmlspecialchars($_POST['type']);
    $start = htmlspecialchars($_POST['startcommand']);

    if($type === "UDP") {
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        
        socket_connect($sock, $ip, $port);
        socket_write($sock, $start);
        header("Location: index.php");
    }
    elseif($type === "TCP") {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        socket_connect($sock, $ip, $port);
        socket_write($sock, $start);
        header("Location: index.php");

    }
    

}
elseif (isset($_POST['stop'])) {

    $ip = htmlspecialchars($_POST['ip']);
    $port = htmlspecialchars($_POST['port']);
    $type = htmlspecialchars($_POST['type']);
    $stop = htmlspecialchars($_POST['stopcommand']);

    if($type === "UDP") {
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
     
        socket_connect($sock, $ip, $port);
        socket_write($sock, $stop);
        header("Location: index.php");
    }
    else if($type === "TCP") {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($sock, $ip, $port);
        socket_write($sock, $stop);
        header("Location: index.php");
    }

}
elseif (isset($_POST['reboot'])) {

    $ip = htmlspecialchars($_POST['ip']);
    $port = htmlspecialchars($_POST['port']);
    $type = htmlspecialchars($_POST['type']);

            
    $reboot = "REBOOT";
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_connect($sock, $ip, $port);
    socket_write($sock, $reboot);
    header("Location: index.php");
}
elseif (isset($_POST['delete'])) {
    $ip = htmlspecialchars($_POST['ip']);
    $req = $db->prepare("DELETE FROM ghr WHERE ip = '$ip'");
    $req->execute();
    header("Location: index.php");
}
elseif (isset($_POST['back'])) {
    header("Location: ../index.php");
}
elseif (isset($_POST['add'])) {
    header("Location: add.php");
}
?>