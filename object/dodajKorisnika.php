<?php

include '../class/users.php';
$users = new users();
$users->insertUsers($_POST['ime'],$_POST['prezime']);
?>