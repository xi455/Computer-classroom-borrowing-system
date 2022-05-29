<?php
include('../link.php');

$text = preg_replace('/[@\.\;\" "]+/', '', $_POST['text']);

$sql = $db->prepare('update users set user=:user,password=:pwd,text=:text where id=:id');

$sql->bindValue('user', $_POST['user']);
$sql->bindValue('pwd', $_POST['pwd']);
$sql->bindValue('text', $text);
$sql->bindValue('id', $_POST['id']);


$sql->execute();
header('location:./');
