<?php

include('../link.php');

$sql = $db->prepare('insert into users (user,password,role,text) values(:user,:pwd,:role,:text)');

$sql->bindValue('user', $_POST['user']);
$sql->bindValue('pwd', $_POST['pwd']);
$sql->bindValue('role', '會員');
$sql->bindValue('text', $_POST['text']);

$sql->execute();

header('location:../login.php');
