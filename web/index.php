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

    if (isset($_SESSION['user']) == false) {
        header('location:./login.php');
    }
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
            <a href="./myuser.php">我的帳戶</a>
            <a href="loginout.php">登出</a>
        </div>
    </div>

    <div class="items">
        <div class="item">
            <div class="item_header">
                <div class="header_time">時間</div>
                <div class="header_work">工作</div>
            </div>

            <div class="item_main">
                <div class="times"></div>
                <div class="works"></div>
            </div>
        </div>
    </div>

    <?php
    $sql = $db->prepare('select * from works');
    $sql->execute();

    $query = $sql->fetchAll(PDO::FETCH_ASSOC);
    $query = json_encode($query);
    ?>

    <script>
        const todos = <?php echo $query; ?>;

        function toFixedLength(num, len) {
            return num.toString().padStart(len, '0')
        }

        const order_list = []
        for (let i = 8; i < 18; i++) {
            if (i % 2 == 0) {
                $('.times').append($(`<div class="time" data-id="${i}">${toFixedLength(i, 2)}-${toFixedLength(i + 2, 2)}</div>`))
            }
            const workDiv = document.createElement('div')
            workDiv.className = "work"
            workDiv.dataset.id = i

            todos.filter(todo => parseInt(todo.startAt) == i && todo.online == 'true').map(todo => {
                const todoDiv = document.createElement('div')
                todoDiv.className = 'todo'
                todoDiv.dataset.id = todo.id

                todoDiv.style.width = '100px'
                todoDiv.style.height = `${(todo.endAt - todo.startAt) * 50}px`

                todoDiv.innerHTML = `
                    <div>${toFixedLength(todo.startAt, 2)}-${toFixedLength(todo.endAt, 2)}</div>
                    <div>${todo.text}</div>
                    <div>${todo.name}</div>
                `

                const orders = order_list.filter(Othertodo => parseInt(Othertodo.endAt) > parseInt(todo.startAt)).map(todo => todo.order || 0)
                if (orders.length) {
                    todo.order = Math.max(...orders) + 1
                } else {
                    todo.order = 0
                }
                const todo_left = todo.order * 110
                if (todo_left + 110 > 600) {
                    $('.header_work').css('width', `${(todo_left - 600)+710}px`)
                    $('.works').css('width', `${(todo_left - 600)+710}px`)
                }
                todoDiv.style.left = `${todo_left}px`


                workDiv.append(todoDiv)
                order_list.push(todo)
            })

            $('.works').append(workDiv)
        }

        <?php
        if ($_SESSION['user']['role'] == '管理員') {
        ?>
            $('.todo').draggable({
                revert: true
            })

            $('.work').droppable({
                accept: '.todo',
                tolerance: 'pointer',

                drop: function(event, ui) {
                    const start = event.target.dataset.id
                    const todo = todos.filter(todo => todo.id == ui.draggable[0].dataset.id)
                    const Time = parseInt(todo[0].endAt) - parseInt(todo[0].startAt)
                    const end = parseInt(start) + Time

                    if (end > 18) {
                        alert('超時')
                        location.href = '#'
                    } else {
                        location.href = 'change.php?start=' + start + '&end=' + end + '&id=' + todo[0].id
                    }
                    console.log(Time)
                    console.log(end)
                }
            })
        <?php
        }
        ?>
    </script>
</body>

</html>