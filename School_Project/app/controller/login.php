<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH.'/app/lib/db.php';

$stmt = $db->prepare('SELECT * FROM `user` WHERE `id`=? && `pw`=?');
$stmt->execute(array(htmlspecialchars($_POST['id']), htmlspecialchars(sha1($_POST['pw']))));
$list = $stmt->fetch();

if(is_array($list)){
    $a = 6;
    $_SESSION['idx'] = $list['idx'];
    $_SESSION['lv'] = $list['lv'];
   // echo $_SESSION['idx'];
    ?>
    <script>alert("로그인 되었습니다."); location.href = '/index.php?idx=' + '<?= $_SESSION['idx'] ?>' + '&lv=' + '<?= $_SESSION['lv'] ?>'</script><?php
}else{
    ?><script>alert("아이디 또는 비밀번호가 틀렸습니다."); history.back();</script><?php
}

?>