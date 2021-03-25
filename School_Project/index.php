<?php


    define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
    require PATH. 'app/lib/db.php';

    $lv = (isset($_SESSION['lv']))?$_SESSION['lv']:0;
    $date = (isset($_GET['date']))?$_GET['date']:'';


    $stmt = $db->prepare('SELECT * FROM `movie` WHERE 1');
    $stmt -> execute();
    $stmtt = $stmt->fetchAll();

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
            <ul style="width: 100%;">
                <?php
                    if (isset($_SESSION['idx'])) {
                        if ($lv == 99) { ?>
                            <li><a href="/app/view/user.php" target="_blank">회원관리</a></li>
                            <li >
                                <a href="/app/view/screen.php" style="width: 50%; float: left;" target="_blank">상영관등록</a>
                                <a href="/app/view/upload.php" style="width: 50%; float: right;" target="_blank">영화등록</a>
                            </li>
                        <?php }else { ?>
                            <li><a href="/app/view/user.php" target="_blank">마이페이지</a></li>
                        <?php }?>
                        <li><a href="/app/view/ticketing.php" target="_blank">예몌현황</a></li>
                        <li><a href="/app/controller/logout.php">로그아웃</a></li>
                <?php
                    }else {
                        echo '<li><a href="/app/view/login.php">로그인</a></li>';
                        echo '<li><a href="/app/view/join.php">회원가입</a></li>';
                    }
                ?>
            </ul>
        </div>
    </header>
    <main>
        <?php

            $list = $db->prepare("SELECT * FROM `movie` WHERE `start` <= '".$date."' and '".$date."' <= `end`");
            $list -> execute();
            $listt = $list->fetchAll();

        ?>
        <h1>영화 검색</h1>
        <form action="/" method="get" class="search">
            <input type="date" name="date" class="date" value="<?=$_GET['date']?>">
            <input type="submit" value="검색" class="search">
        </form>

        <table border="1"  style="text-align: center; width: 80%; margin-right: auto; margin-left: auto">
            <thead>
            <h2 style="margin: 10px; text-align: center;"><?=$date?> 일에 상영중인 영화를 검색한 <span class="red">결과</span>입니다</h2>
            </thead>
            <tr style="border-bottom: 3px solid #000;" class="table_title">
                <td>영화목록</td>
                <td>종영일</td>
            </tr>
            <?php foreach ($listt as $data) { ?>
                <tr>
                    <td style="width: 90%"><a href="/app/view/select.php?idx=<?=$data['idx']?>&&date=<?=$date?>" style="display: block; width: 100%; height: auto;"><?=$data['name']?></a></td>
                    <td style="width: 10%"><?=$data['end']?></td>
                </tr>
            <?php }?>

        </table>
<!--        <div class="slide">-->
<!--            <ul>-->
<!--                --><?php
//                foreach ($stmtt as $dataa) {
//                    if (!empty($dataa['img'])) {
//                        ?>
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <img src="/static/uploaded/--><?//= $dataa['img'] ?><!--" alt="border_img" title="border_img"-->
<!--                                     class="border_img">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        --><?php
//                    }
//                }
//                ?>
<!--            </ul>-->
<!--        </div>-->
    </main>
</body>
</html>
