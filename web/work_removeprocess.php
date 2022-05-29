<?php

include('./link.php');

$sql = $db->prepare('delete from works where id=:id');
$sql->bindValue('id', $_GET['id']);
$sql->execute();

header('location:./myuser.php');
