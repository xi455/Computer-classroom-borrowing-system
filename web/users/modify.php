<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="users.css">
</head>

<body>
    <?php
    include('../link.php');

    $sql = $db->prepare('select * from users where id=:id');
    $sql->bindValue('id', $_GET['id']);

    $sql->execute();
    $query = $sql->fetch();
    ?>
    <div class="header">
        <h1>
            <a href="./index.php">
                電腦教室借用管理系統
            </a>
        </h1>
        <div class="header_a">
            <a href="./index.php" style="background-color: rgb(206, 233, 249);">返回</a>
        </div>
    </div>

    <div class="items">
        <div class="modify_box">
            <form action="./modifyprocess.php" method="post">
                <h1>帳號修改</h1>

                <div class="modify_user">
                    <p>
                        帳號：<input type="text" name="user" value="<?php echo $query['user'] ?>">

                    </p>
                    <p>
                        密碼：<input type="text" name="pwd" value="<?php echo $query['password'] ?>">
                    </p>
                </div>

                <p class="modify_text">自介</p>
                <p style="text-align: center;">
                    <textarea name="text" cols=" 60" rows="6" placeholder="簡述理由">
                    <?php echo ($query['text']) ?>
                    </textarea>
                </p>

                <div class="modify_select">
                    <input type="hidden" name="id" value="<?php echo $query['id'] ?>">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>