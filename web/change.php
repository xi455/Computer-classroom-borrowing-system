<?php

include('./link.php');

$sql = $db->prepare('update works set startAt=:start,endAt=:end where id=:id');

$sql->bindvalue('start', $_GET['start']);
$sql->bindvalue('end', $_GET['end']);
$sql->bindvalue('id', $_GET['id']);

$sql->execute();
header('location:./');
