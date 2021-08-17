<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        echo 'ログインされていません。';
        echo '<a href="../phplogin/staff_login.html">ログイン画面</a>';
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
    <?php

                $staff_id=$_GET['staff_id'];

                $dsn='mysql:dbname=shokai;host=localhost;charset=utf8';
                $user='root';
                $password='';

        try{
                $dbh=new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='SELECT id, staff_name FROM shokai_staffs WHERE id=?';
                $stmt=$dbh->prepare($sql);
                $data[]=$staff_id;
                $stmt->execute($data);

                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $staff_name=$rec['staff_name'];

                $dbh=null;

            }
            catch (Exception $e)
            {
                echo 'ただいま障害により大変ご迷惑をおかけしております。';
                echo $e;
                exit();
            }

            
    ?>

    <p>スタッフ情報参照<br></p>
    スタッフID<br>
    <?php echo $staff_id; ?><br><br>
    <?php echo $staff_name; ?><br><br>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>