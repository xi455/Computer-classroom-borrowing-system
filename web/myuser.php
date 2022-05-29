<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include('./link.php');
    ?>
    <div class="header">
        <h1>
            <a href="index.php">
                電腦教室借用管理系統
            </a>
        </h1>
        <div class="header_a">
            <?php
            if ($_SESSION['user']['role'] == '管理員') {
            ?>
                <a href="./users/">帳戶管理</a>
                <a href="state.php">目前狀態</a>
            <?php
            }
            ?>
            <a href="#" style="background-color: rgb(206, 233, 249);">我的帳戶</a>
            <a href="loginout.php">登出</a>
        </div>
    </div>

    <div class="items">
        <div class="myuser_box">
            <div class="myuser_main">
                <h1>我的帳戶</h1>

                <div class="myuser_img">
                    <img src="./user.png" alt="">
                </div>

                <div class="myuser_user">
                    <p>
                        帳號：<?php echo $_SESSION['user']['user']; ?>
                    </p>
                    <p>
                        密碼：<?php echo $_SESSION['user']['password']; ?>
                    </p>
                    <p>
                        自介：<?php echo $_SESSION['user']['text']; ?>
                    </p>
                </div>
            </div>

            <div class="myuser_messages">
                <?php
                $sql = $db->prepare('select * from works where name=:name order by online asc');
                $sql->bindValue('name', $_SESSION['user']['user']);
                $sql->execute();

                $query = $sql->fetchAll();
                foreach ($query as $data) {
                ?>

                    <div class="my_message">

                        <div class="message_main">教室地點：<?php echo $data['text'] ?></div>
                        <div class="message_main">借用時間：<?php echo $data['startAt'] ?>點 ~ <?php echo $data['endAt'] ?>點</div>
                        <div class="message_main">借用人：<?php echo $data['name'] ?></div>
                        <div class="message_main">是否借出：<?php echo $data['online'] ?></div>

                        <div class="my_user_selector">
                            <a href="./work_modify.php?id=<?php echo $data['id'] ?>" class="state_selector">修改</a>
                            <a href="./work_removeprocess.php?id=<?php echo $data['id'] ?>" class="state_selector" style="background-color: rgb(251, 169, 169);">刪除</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="new">
        <button onclick="location.href='./Apply_classroom.php'">申請</button>
    </div>

    <script>
        for (let i = 0; i < $('.my_message').length; i++) {
            if ($($('.my_message').eq(i)[0].childNodes[7]).text() == '是否借出：true') {
                $('.my_message').eq(i).toggleClass('my_message_col')
            }
        }
    </script>
</body>

</html>