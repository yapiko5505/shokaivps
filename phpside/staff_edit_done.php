<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shokaivps</title>
</head>
<body>
    <?php

            $staff_id=$_POST['id'];
            $staff_name=$_POST['staff_name'];
            $staff_pass=$_POST['password'];

            $dsn='mysql:dbname=shokai;host=localhost;charset=utf8';
            $user='root';
            $password='';

        try
        {
            $dbh=new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql='UPDATE shokai_staffs SET staff_name=?, password=? WHERE id=?';
            $stmt=$dbh->prepare($sql);
            $data[]=$staff_name;
            $data[]=$staff_pass;
            $data[]=$staff_id;
            $stmt->execute($data);

            $dbh=null;

        }
        catch(Exceotion $e)
        {
            echo 'ただいま障害により大変ご迷惑をおかけしております。';
            echo $e;
            exit();
        }

    ?>

    <p>修正しました。<p><br><br>
    <a href="staff_list.php">戻る</a>
</body>
</html>