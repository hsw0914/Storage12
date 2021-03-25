<?php
define('PATH',$_SERVER['DOCUMENT_ROOT'].'/');
require PATH.'/app/lib/db.php';

$img = $_FILES['image'];
$upload_file_name = '';
if(is_uploaded_file($img['tmp_name'])){
    $exe_filter = ['PNG', 'JPG', 'JPEG', 'GIF', 'BMP'];
    $extension = strtoupper(pathinfo($img['name'], 4));
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/static/uploaded/';
    $upload_file_name = uniqid() . '.' . $extension;

    if(in_array($extension, $exe_filter)){
        move_uploaded_file($img['tmp_name'], $upload_path . $upload_file_name);
        if (!$_POST['start'] || !$_POST['end'] || !$_FILES['image'] || !$_POST['time'] || !$_POST['pre']) {
            echo '<script>alert("누락된 값이 존재합니다!"); history.back();</script>';
        }else {
            if (strtotime($_POST['start']) < strtotime($_POST['end'])) {
                $stmt = $db->prepare('INSERT INTO `movie`(`start`, `end`, `screen`, `name`, `time`, `img`, `pre`) VALUES (?,?,?,?,?,?,?)');
                $stmt->execute(array($_POST['start'], $_POST['end'], $_POST['screen'], $_POST['name'],$_POST['time'], $upload_file_name, $_POST['pre']));
                echo '<script>alert("영화 등록이 완료되었습니다.");  location.href ="/";</script>';
            }else {
                echo '<script>alert("개봉일이 종영일보다 빠릅니다!"); history.back();</script>';
            }
        }
    }else{
        echo '<script>alert("파일은 이미지만 업로드 가능합니다."); history.back();</script>';
    }
}

?>