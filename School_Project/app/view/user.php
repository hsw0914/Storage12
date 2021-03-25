<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';

$lv = (isset($_SESSION['lv']))?$_SESSION['lv']:0;

$data = $db->prepare('SELECT * FROM `user` WHERE 1');
$data -> execute();
$user = $data->fetchAll();

$dataa = $db->prepare('SELECT * FROM `user` WHERE idx = ?');
$dataa -> execute(array($_SESSION['idx']));
$userr = $dataa->fetch();
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

<?php
if (isset($_SESSION['idx'])) {
    if ($lv == 99) { ?>
    <table border="1"  style="text-align: center;">
        <tr>
            <td>순번</td>
            <td>아이디</td>
            <td>이름</td>
            <td>회원구분</td>
            <td>기능</td>
        </tr>
        <?php foreach ($user as $i => $list) {
            if ($list['lv'] == 99) {
                $list['lv'] = "관리자";
            }else {
                $list['lv'] = "회원";
            }?>
            <tr>
                <td><?=$i + 1?></td>
                <td><?=$list['id']?></td>
                <td><?=$list['name']?></td>
                <td><?=$list['lv']?></td>
                <td><a href="/app/view/user_up.php?idx=<?=$list['idx']?>">수정</a> </td>
            </tr>
        <?php } ?>
    </table>
    <?php }else { ?>
    <table border="1"  style="text-align: center;">
        <tr>
            <td>아이디</td>
            <td>이름</td>
            <td>기능</td>
        </tr>
        <tr>
            <td><?=$userr['id']?></td>
            <td><?=$userr['name']?></td>
            <td><a href="/app/view/user_up.php?idx=<?=$userr['idx']?>">수정</a> </td>
        </tr>
    </table>
    <?php }?>
<?php }?>

</body>
</html>