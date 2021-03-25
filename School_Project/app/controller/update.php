<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH.'/app/lib/db.php';

    if ($_POST['pw'] == null) {
        echo "<script>alert('패스워드를 입력해주세요!'); history.back();</script>";
    }else {
        $stmt = $db->prepare('UPDATE user SET pw = ? WHERE idx = ?');
        $stmt->execute(array( htmlspecialchars(sha1($_POST['pw'])),htmlspecialchars($_GET['idx'] )));
?>
        <script>alert("성공적으로 변경되었습니다."); location.href = '/'</script><?php
    }
?>