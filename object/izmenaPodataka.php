<?php

include '../class/users.php';
$users = new users();
$users->editUsers($_POST['ime'],$_POST['prezime'],$_POST['id']);
?>