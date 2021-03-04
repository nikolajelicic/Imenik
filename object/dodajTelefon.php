<?php

include '../class/users.php';
$users = new users();
$users->insertPhone($_POST['broj'],$_POST['id']);
?>