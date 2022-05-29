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
            <a href="./index.php">
                電腦教室借用管理系統
            </a>
        </h1>
        <div class="header_a">
            <a href="./myuser.php" style="background-color: rgb(206, 233, 249);">返回</a>
        </div>
    </div>

    <div class="items">
        <div class="classroom_box">
            <form action="./Applyprocess.php" method="get">
                <h1>教室申請</h1>

                <div class="classroom_user">
                    <p>
                        借用教室：<select name="class" id="">
                            <option value="電腦教室一">電腦教室一</option>
                            <option value="電腦教室二">電腦教室二</option>
                            <option value="電腦教室三">電腦教室三</option>
                            <option value="電腦教室四">電腦教室四</option>
                            <option value="電腦教室五">電腦教室五</option>
                            <option value="電腦教室六">電腦教室六</option>
                            <option value="電腦教室七">電腦教室七</option>
                        </select>

                    </p>
                    <p>
                        借用日期：<input type="date" name="date">
                    </p>
                </div>
                <div class="classroom_user">
                    <p>
                        開始時間：<select name="start" id="">
                            <option value="8">第一節</option>
                            <option value="9">第二節</option>
                            <option value="10">第三節</option>
                            <option value="11">第四節</option>
                            <option value="13">第五節</option>
                            <option value="14">第六節</option>
                            <option value="15">第七節</option>
                            <option value="16">第八節</option>
                            <option value="17">第九節</option>
                        </select>
                    </p>
                    <p>
                        結束時間：<select name="end" id="">
                            <option value="9">第一節</option>
                            <option value="10">第二節</option>
                            <option value="11">第三節</option>
                            <option value="13">第四節</option>
                            <option value="14">第五節</option>
                            <option value="15">第六節</option>
                            <option value="16">第七節</option>
                            <option value="17">第八節</option>
                            <option value="18">第九節</option>
                        </select>
                    </p>
                </div>

                <p class="classroom_text">借用理由</p>
                <p style="text-align: center;">
                    <textarea name="apply" cols=" 60" rows="6" placeholder="簡述理由"></textarea>
                </p>

                <div class="classroom_select">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>