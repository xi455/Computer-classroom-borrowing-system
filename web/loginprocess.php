<?php

include('./link.php');

$sql = $db->prepare('select * from users where user=:user and password=:pwd');
$sql->bindvalue('user', $_POST['user']);
$sql->bindvalue('pwd', $_POST['pwd']);

$sql->execute();
$query = $sql->fetch();

if ($query) {
    $_SESSION['user'] = $query;
    header('location:./verify.html');
} else {
    echo '<script>alert("帳號或密碼錯誤")</script>';
    echo '<script>location.href="login.php"</script>';
}
