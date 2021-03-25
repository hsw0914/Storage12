<?php
/**
 * Created by PhpStorm.
 * User: Web Design
 * Date: 2017-03-24
 * Time: 오후 5:06
 */
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH.'/app/lib/db.php';

$stmt = $db->prepare('SELECT * FROM `screen` WHERE `name`=?');
$stmt->execute(array($_POST['name']));
$screen = $stmt->fetch();

if(is_array($screen)){
    echo '<script>alert("이미 존재하는 상영관입니다."); history.back();</script>';
}else{
        if (!$_POST['name'] || !$_POST['number']) {
            echo '<script>alert("누락된 값이 존재합니다!"); history.back();</script>';
        } else {
                $stmt = $db->prepare('INSERT INTO `screen`(`name`, `number`, `seat`) VALUES (?,?,?)');
                $stmt->execute(array(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['number']), htmlspecialchars($_POST['number'])));
                echo '<script>alert("상영관 등록이 완료되었습니다."); window.close();</script>';
        }

}
?>
