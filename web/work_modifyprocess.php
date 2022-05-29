<?php
include('./link.php');

$sql = $db->prepare('update works set text=:class,startAt=:start,endAt=:end,online=:online,reason=:reason,dates=:date where id=:id');

$sql->bindValue('class', $_POST['class']);
$sql->bindValue('start', $_POST['start']);
$sql->bindValue('end', $_POST['end']);
$sql->bindValue('online', 'false');
$sql->bindValue('reason', $_POST['reason']);
$sql->bindValue('date', $_POST['date']);
$sql->bindValue('id', $_POST['id']);

$sql->execute();

header('location:./myuser.php');
