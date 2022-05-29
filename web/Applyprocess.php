<?php
include('./link.php');

$sql = $db->prepare('insert into works (startAt,endAt,text,online,name,reason,dates) values(:start,:end,:text,:online,:name,:reason,:dates)');

$sql->bindValue('start', $_GET['start']);
$sql->bindValue('end', $_GET['end']);
$sql->bindValue('text', $_GET['class']);
$sql->bindValue('online', 'false');
$sql->bindValue('name', $_SESSION['user']['user']);
$sql->bindValue('reason', $_GET['apply']);
$sql->bindValue('dates', $_GET['date']);

$sql->execute();
header('location:./myuser.php');
