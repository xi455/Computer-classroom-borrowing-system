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

    if (isset($_SESSION['user'])) {
        header('location:./index.php');
    }
    ?>
    <div class="header">
        <h1>
            電腦教室借用管理系統
        </h1>
        <div class="header_a">
            <a href="./users/insert.html">申請</a>
        </div>
    </div>

    <div class="items">
        <form action="loginprocess.php" method="post">
            <p>
            <h1>login</h1>
            </p>
            <p>
            <div class="text">帳號：<input type="text" name="user" placeholder="請輸入帳號"></div>
            </p>

            <p>
            <div class="text">密碼：<input type="text" name="pwd" placeholder="請輸入密碼"></div>
            </p>

            <p>
            <div class="text">
                <input type="submit" class="sub">
                <input type="reset" class="sub">
            </div>
            </p>
        </form>
    </div>
</body>

</html>