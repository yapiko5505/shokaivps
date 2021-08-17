<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        echo 'ログインされていません。';
        echo '<a href="../phplogin/staff_login.html">ログイン画面へ</a>';
        exit();
    } 
    else
    {
        echo $_SESSION['staff_name'];
        echo 'さんログイン中<br>';
        echo '<br>';
    }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shokaivps</title>
</head>
<body>
    <p>スタッフ管理トップメニュー<br>
        <a href="../phpside/staff_list.php">スタッフ管理</a><br>
        <a href="../phpside/ichiran.php">お問い合わせ一覧</a><br>
        <a href="../phpside/kensaku.html">お問い合わせ検索</a><br>
        <a href="staff_logout.php">ログアウト</a><br>
    </p>   
</body>
</html>