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

                $sql='SELECT id, name FROM shokai_staffs WHERE id=?';
                $stmt=$dbh->prepare($Sql);
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