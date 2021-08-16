<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shokaivps</title>
</head>
<body>
    <p>スタッフ追加</p>
    <form method="post" action="staff_add_check.php">
        <p>スタッフ名を入力してください。</p>
        <input type="text" name="staff_name" style="width:200px"><br>
        <p>パスワードを入力してください。</p>
        <input type="password" name="password" style="width:100px"><br>
        <p>パスワードをもう一度入力してください。</p>
        <input type="password" name="password2" style="width:100px"><br><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK" >
    </form>
</body>
</html>