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
    <div class="screen">
        <form action="/app/controller/screen.php" method="post">
            <input type="text" name="name" placeholder="상영관 이름을 입력해주세요">
            <input type="number" name="number"  placeholder="좌석수를 입력해주세요">
            <input type="submit" value="Registration">
        </form>
    </div>
</body>