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
            $dsn='mysql:dbname=shokai;host=localhost;charset=utf8';
            $user='root';
            $password='';
        try
        {
            $dbh=new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql='SELECT id, staff_name FROM shokai_staffs WHERE 1';
            $stmt=$dbh->prepare($Sql);
            $stmt->execute();

            $dbh=null;

            echo 'スタッフ一覧<br><br>';

            echo '<form method="post" action="staff_branch.php">';
            while(true)
                {
                    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

                    if($rec==false)
                    {
                        break;
                    }
                    echo '<form method="radio" name="staff_id" value="'.$rec['id'].'">';
                    echo $rec['staff_name'];
                    echo '<br>';
                }
                
                echo '<input type="submit" name="disp" value="参照">';
                echo '<input type="submit" name="add" value="追加">';
                echo '<input type="submit" name="edit" value="修正">';
                echo '<input type="submit" name="delete" value="削除">';
                echo '</form>';
            }

        catch (Exception $e)
        {
            echo 'ただいま障害により大変ご迷惑をおかけしております。';
            echo $e;
            exit();
        }
    ?>
</body>
</html>