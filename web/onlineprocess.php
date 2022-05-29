<?php

include('./link.php');

$sql = $db->prepare('update works set online=:online where id=:id');

$sql->bindValue('online', $_GET['online']);
$sql->bindValue('id', $_GET['id']);
$sql->execute();
header('location:./state.php');
