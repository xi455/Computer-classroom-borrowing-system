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
    <div class="header">
        <h1>
            <a href="index.php">
                電腦教室借用管理系統
            </a>
        </h1>
        <div class="header_a">
            <a href="./users/">帳戶管理</a>
            <a href="state.php" style="background-color: rgb(206, 233, 249);">目前狀態</a>
            <a href="./myuser.php">我的帳戶</a>
            <a href="loginout.php">登出</a>
        </div>
    </div>

    <div class="items">
        <div class="state_main">
            <?php
            include('./link.php');
            $sql = $db->prepare('select * from works order by online asc');
            $sql->execute();

            $query = $sql->fetchAll();
            foreach ($query as $data) {
            ?>
                <div class="state">
                    <div class="state_mains">
                        <div class="state_row">教室名稱：<?php echo $data['text'] ?></div>
                        <div class="state_row">借用日期：<?php echo $data['dates'] ?></div>
                        <div class="state_row">借用時間：<?php echo $data['startAt'] ?>點 ~ <?php echo $data['endAt'] ?>點</div>
                        <div class="state_row">借用者：<?php echo $data['name'] ?></div>
                        <div class="state_row">借用理由：<?php echo $data['reason'] ?></div>
                        <div class="state_row">是否上傳：<?php echo $data['online'] ?></div>

                        <div class="selector">
                            <a href="./onlineprocess.php?online=true&id=<?php echo $data['id'] ?>" class="state_selector">確認</a>
                            <a href="./onlineprocess.php?online=false&id=<?php echo $data['id'] ?>" class="state_selector" style="background-color: rgb(251, 169, 169);">下架</a>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="new">
        <button onclick="location.href='./Apply_classroom.php'">新增</button>
    </div>

    <script>
        for (let i = 0; i < $('.state_mains').length; i++) {
            if ($($('.state_mains').eq(i)[0].childNodes[11]).text() == '是否上傳：true') {
                $('.state').eq(i).toggleClass('my_message_col')
            }
        }
    </script>
</body>

</html>