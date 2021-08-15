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
        $dsn='mysql:dbname=shokai;host=localhost';
        $user='root';
        $password='';
        $dbh=new PDO($dsn, $user, $password);

        $sql='SELECT * FROM shokai_users WHERE 1';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();

        while(1)
        {
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false)
            {
                break;
            }
            
            echo $rec['id'];
            echo $rec['name'];
            echo $rec['email'];
            echo $rec['phone'];
            echo $rec['postal'];
            echo $rec['address'];
            echo $rec['gendar'];
            echo $rec['birth'];
            echo $rec['content'];
            echo '<br>';
        }

        $dbh=null;

        ?>
    <br><a href="menu.html">メニューに戻る</a>
</body>
</html>