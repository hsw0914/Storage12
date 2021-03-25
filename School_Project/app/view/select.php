<?php

define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';

$stmt = $db->prepare('SELECT * FROM `movie` WHERE idx = ?');
$stmt -> execute([$_GET['idx']]);
$stmtt = $stmt->fetch();


$screen = $db->prepare('SELECT * FROM `screen` WHERE idx = ?');
$screen -> execute([$stmtt['screen']]);
$screenn = $screen->fetch();
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/common.css">
    <script src="/static/js/jquery-3.2.1.min.js"></script>
    <script src="/static/js/app.js"></script>
    <title>::UHS::</title>
</head>
<body style="position: relative;">
<header>
    <h1>영화예약</h1>
    <hr>
    <h2>영화 : <?=$stmtt['name']?></h2>
    <h2>상영관 : <?=$screenn['name']?></h2>
    <h2>좌석 : <?=$screenn['number']?></h2>
</header>
<main>
    <div class="seat_tool">
        <form action="/app/controller/ticketing.php?idx=<?=$_GET['idx']?>&&date=<?=$_GET['date']?>" name="d" method="post">
            <?php for ($i = 1; $i <= $screenn['number']; $i++ ) { ?>
                <input type="checkbox" name="check_list[]"id="<?=$stmtt['screen']?><?=$i?>" value="<?=$stmtt['screen']?><?=$stmtt['screen']?><?=$i?>" style="display: none;">
                <label for="<?=$stmtt['screen']?><?=$i?>" class="seat"><?=$i?></label>
            <?php } ?>
            <input type="submit"value="예약" class="fixed">
        </form>
    </div>
</main>
</body>
</html>