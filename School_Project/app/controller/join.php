<?php
/**
 * Created by PhpStorm.
 * User: Web Design
 * Date: 2017-03-24
 * Time: 오후 5:06
 */
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH.'/app/lib/db.php';

    $stmt = $db->prepare('SELECT * FROM `user` WHERE `id`=?');
    $stmt->execute(array($_POST['id']));
    $user_member = $stmt->fetch();

if(is_array($user_member)){
    echo '<script>alert("이미 존재하는 아이디 입니다."); history.back();</script>';
}else{
    if (strlen($_POST['pw']) < 8) {
        echo '<script>alert("패스워드 길이가 너무 짧습니다!"); history.back();</script>';
    }else {
        if (!$_POST['id'] || !$_POST['pw'] || !$_POST['repw'] || !$_POST['name']) {
            echo '<script>alert("누락된 값이 존재합니다!"); history.back();</script>';
        } else {
            if ($_POST['pw'] === $_POST['repw']) {
                $stmt = $db->prepare('INSERT INTO `user`(`id`, `pw`, `name`) VALUES (?,?,?)');
                $stmt->execute(array(htmlspecialchars($_POST['id']), htmlspecialchars(sha1($_POST['pw'])), htmlspecialchars($_POST['name'])));
                echo '<script>alert("회원가입이 완료되었습니다."); location.href = "/";</script>';
            } else {
                echo '<script>alert("패스워드가 일치하지 않습니다."); history.back();</script>';
            }
        }
    }
}
?>
