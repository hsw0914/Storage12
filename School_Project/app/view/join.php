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
<main>
    <div class="login_area">
        <form action="/app/controller/join.php" method="post">
            <input type="text" name="id" placeholder="Id">
            <input type="password" name="pw" placeholder="Password">
            <input type="password" name="repw" placeholder="Password">
            <input type="text" name="name" placeholder="Name">
            <input type="submit" value="JOIN" class="join">
        </form>
    </div>
</main>
</body>
</html>
