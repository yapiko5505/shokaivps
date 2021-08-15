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

            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $postal=$_POST['postal'];
            $address=$_POST['address'];
            $gendar=$_POST['gendar'];
            $birth=$_POST['birth'];
            $content=$_POST['content'];

            $dsn='mysql:dbname=shokai;host=localhost';
            $user='root';
            $password='';


            $name=htmlspecialchars($name);
            $email=htmlspecialchars($email);
            $phone=htmlspecialchars($phone);
            $postal=htmlspecialchars($postal);
            $address=htmlspecialchars($address);
            $gendar=htmlspecialchars($gendar);
            $birth=htmlspecialchars($birth);
            $content=htmlspecialchars($content);
        
        try 
        {
            $dbh=new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo $name.'様<br>';
            echo 'お問い合わせありがとうございました。<br>';
            echo $email.'にメールを送りましたのでご確認ください。<br>';
            echo $postal.'<br>';
            echo $address.'<br>';
            echo $phone.'<br>';
            echo $gendar.'<br>';
            echo $birth.'<br>';
            echo $content.'<br>';

            $mail_sub='アンケートを受け付けました。';
            $mail_body=$name."様へ\nアンケートご協力ありがとうございました。";
            $mail_body=html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
            $mail_head='From:xxx@xxx.co.jp';
            mb_language('Japanese');
            mb_internal_encoding("UTF-8");
            mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

            $sql='INSERT INTO shokai_users (name, email, phone, postal, address, gendar, birth, content) 
            VALUES(" '.$name.' "," '.$email.' "," '.$phone.' "," '.$postal.' "," '.$address.' "," '.$gendar.' "," '.$birth.' "," '.$content.' ")';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();

            $dbh=null;

        }

        catch(Exception $e)
        {
            echo 'ただいま障害により大変ご迷惑をおかけしております。';
            echo $e;
        }
    ?>
    
</body>
</html>