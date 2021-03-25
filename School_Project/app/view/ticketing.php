<?php


define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';

$lv = (isset($_SESSION['lv']))?$_SESSION['lv']:0;
$date = (isset($_GET['date']))?$_GET['date']:'';
$idx = (isset($_GET['idx']))?$_GET['idx']:'';


$stmt = $db->prepare('SELECT * FROM `movie` WHERE 1');
$stmt -> execute();
$stmtt = $stmt->fetchAll();

$tickk = $db->prepare('SELECT * FROM `ticketing` WHERE 1');
$tickk -> execute();
$tickt = $tickk->fetchAll();

$tick = $db->prepare('SELECT * FROM `ticketing` WHERE movie = ?');
$tick -> execute([$idx]);
$tickting = $tick->fetch();

$movie = $db->prepare('SELECT * FROM `movie` WHERE idx = ?');
$movie -> execute([$idx]);
$moviee = $movie->fetch();


$screen = $db->prepare('SELECT * FROM `screen` WHERE idx = ?');
$screen -> execute([$moviee['screen']]);
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
    <title>::UHS::</title>
</head>
<body>
<header>
    <div class="title">
        <h1>협성 영화</h1>
        <ul>
            <li><a href="">영화별 예매 현황</a></li>
            <li><a href="">날짜별 예매 현황</a></li>
        </ul>
    </div>
</header>
<main>
    <form action="#" method="get">
        <select name="idx">
            <?php foreach ($stmtt as $item) {?>
                <option value="<?=$item['idx']?>" name="idx"><?=$item['name']?></option>
            <?php } ?>
        </select>
        <input type="submit">
    </form>
    <?php if ($tickting['movie'] != 0 ) {?>
    <table border="1"  style="text-align: center; width: 80%; margin-right: auto; margin-left: auto">
        <tr>
            <td>제목</td>
            <td>날짜</td>
            <td>예약 인원</td>
        </tr>
        <?php foreach ($tickt as $item)  { ?>
        <tr>
            <td><?=$moviee['name']?></td>
            <td><?=$screenn['name']?></td>
            <td><?=$tickting['number']?></td>
        </tr>
        <?php }?>
    </table>
    <?php }?>
</main>
</body>
</html>
