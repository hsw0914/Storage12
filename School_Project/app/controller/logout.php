<?php
/**
 * Created by PhpStorm.
 * User: Design
 * Date: 2019-10-01
 * Time: 오전 11:29
 */
    session_start();
    session_destroy();
    echo '<script>alert("로그아웃 되었습니다."); location.href="/";</script>';