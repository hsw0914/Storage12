<?php

define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';


$data = $db->prepare('SELECT * FROM `screen` WHERE 1');
$data -> execute();
$all = $data->fetchAll();
?>


<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>::UHS::</title>
    <link rel="stylesheet" href="../../static/css/common.css">
</head>
<body>
<form action="../../app/controller/upload.php" method="post" enctype="multipart/form-data">
    <input type="date" name="start">
    <input type="date" name="end">
    <select name="screen" id="screen" required>
        <?php foreach ($all as $item) { ?>
            <option value="<?=$item['idx']?>"><?=$item['name']?></option>
        <?php } ?>
    </select>
    <input type="text" name="name" placeholder="영화 제목을 작성해주세요">
    <input type="number" name="time" placeholder="상영시간을 작성해주세요!">
    <input type="file" name="image" accept="image/*" id="image">
    <textarea name="pre" class="pre" ></textarea>
    <input type="submit" value="영화 등록">
</form>
</body>
</html>
