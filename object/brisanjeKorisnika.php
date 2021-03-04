<?php

include '../class/users.php';
$users = new users();
$users->delateUsers($_POST['id']);
?>