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
    <div class="header">
        <h1>
            <a href="../index.php">
                電腦教室借用管理系統
            </a>
        </h1>
        <div class="header_a">
            <a href="#" style="background-color: rgb(206, 233, 249);">帳戶管理</a>
            <a href="../state.php">目前狀態</a>
            <a href="../myuser.php">我的帳戶</a>
            <a href="../loginout.php">登出</a>
        </div>
    </div>

    <div class="items">
        <div class="user_main">
            <?php
            include('../link.php');
            $sql = $db->prepare('select * from users');
            $sql->execute();

            $query = $sql->fetchAll();
            foreach ($query as $data) {
                if ($data['role'] == '管理員') {
                    continue;
                }
            ?>
                <div class="account">
                    <img src="../user.png" alt="">
                    <div class="account_mains">
                        <div class="account_main">帳號：<?php echo $data['user'] ?></div>
                        <div class="account_main">密碼：<?php echo $data['password'] ?></div>
                        <div class="account_main">權限：<?php echo $data['role'] ?></div>
                        <div class="account_main">自介：<?php echo $data['text'] ?></div>

                        <div class="selector">
                            <a href="./modify.php?id=<?php echo $data['id']?>" class="account_selector">修改</a>
                            <a href="./remove.php?id=<?php echo $data['id']?>" class="account_selector" style="background-color: rgb(251, 169, 169);">刪除</a>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="new">
        <button onclick="location.href='./insert.html'">新增</button>
    </div>
</body>

</html>