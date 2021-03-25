<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH. 'app/lib/db.php';

$stmt = $db->prepare('SELECT * FROM `movie` WHERE idx = ?');
$stmt -> execute([$_GET['idx']]);
$stmtt = $stmt->fetch();


$screen = $db->prepare('SELECT * FROM `screen` WHERE idx = ?');
$screen -> execute([$stmtt['screen']]);
$screenn = $screen->fetch();

    $stmt = $db->prepare('INSERT INTO `ticketing`(`movie`, `date`, `member`) VALUES (?,?,?)');
    $stmt->execute([(htmlspecialchars($stmtt['idx'])), htmlspecialchars($_GET['date']), htmlspecialchars(count($_POST['check_list']))]);

foreach ($_POST['check_list'] as $value) {
    $db->prepare('INSERT INTO `ticketing` (`number`) VALUES (?)')->execute([$value]);
}
//    echo '<script>alert("예약이 완료되었습니다."); location.href = "/";</script>';

$stmt = $db->prepare('UPDATE screen SET seat = ? WHERE idx = ?');
$stmt->execute(array( htmlspecialchars($screenn['seat']-$_POST['check_list'])),htmlspecialchars($stmtt['screen']));
