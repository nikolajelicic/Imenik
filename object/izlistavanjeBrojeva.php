<?php

include '../class/users.php';
$users = new users();
$users->getNumber($_POST['id']);
?>