<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';

$data = $db->prepare('SELECT * FROM `user` WHERE idx = ?');
$data -> execute([$_GET['idx']]);
$user = $data->fetch();
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>::UHS::</title>
</head>
<body>

<a href="/index.php?idx=<?= $_SESSION['idx'] ?>&lv=<?= $_SESSION['lv'] ?>">홈</a>

    <form action="/app/controller/update.php?idx=<?=$_GET['idx']?>" method="post">
        <input type="hidden" name="idx" value="<?=$user['idx']?>">
        <table border="1"  style="text-align: center;">
            <tr>
                <td>아이디</td>
                <td>이름</td>
                <?php
                if (isset($_GET['idx'])) {
                if ($user['lv'] == 99) {
                ?>
                <td>회원구분</td>
                <?php }}?>
                <td>암호</td>
                <td>기능</td>
            </tr>
            <tr>
                <td><input type="text" name="id" value="<?=$user['id']?>"></td>
                <td><input type="text" name="name" value="<?=$user['name']?>"></td>
                <?php
                if (isset($_GET['idx'])) {
                if ($user['lv'] == 99) {
                ?>
                <td>
                    <select name="lv">
                        <option value="99" <?=($user['lv']==99)?'selected':''?>>관리자</option>
                        <option value="1" <?=($user['lv']==1)?'selected':''?>>회원</option>
                    </select>
                </td>
                <?php }}?>
                <td><input type="password" name="pw"></td>
                <td><input type="submit" value="수정"></td>
            </tr>
        </table>
    </form>

</body>
</html>