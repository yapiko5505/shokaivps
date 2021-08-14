<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        $name=htmlspecialchars($name);
        $email=htmlspecialchars($email);
        $phone=htmlspecialchars($phone);
        $postal=htmlspecialchars($postal);
        $address=htmlspecialchars($address);
        $gendar=htmlspecialchars($gendar);
        $birth=htmlspecialchars($birth);
        $content=htmlspecialchars($content);

        if($name=='') {
            echo '氏名が入力されていません。<br>';
        } else {
            echo '氏名<br>';
            echo $name;
            echo '様';
            echo '<br>';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'メールアドレスをきちんと入力してください。<br>';
        } else {
            echo 'メールアドレス<br>';
            echo '$email';
            echo '<br>';
        }

        if(preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/',$phone)==0) {
            echo '電話番号は記入例通り入力してください。<br>';
        } else {
            echo '電話番号<br>';
            echo $phone;
            echo '<br>';
        }

        if(preg_match('/^[0-9]{3}-[0-9]{4}$/', $postal)==0) {
            echo '郵便番号は記入例通り入力してください。<br>';
        } else {
            echo '郵便番号<br>';
            echo $postal;
            echo '<br>';
        }

        if($address=='') {
            echo '住所が入力されていません。';
        } else {
            echo '住所<br>';
            echo $address;
            echo '<br>';
        }

        echo '<br>性別：<br>';
        if($gendar=='ladys') {
            echo '女性';
            echo '<br>';
        } else {
            echo '男性';
            echo '<br>';
        }

        if($birth=='') {
            echo '生年月日が入力されていません。<br>';
        } else {
            echo '生年月日<br>';
            echo $birth;
            echo '<br>';
        }

        if($content=='') {
            echo 'お問い合わせ内容が入力されていません。<br>';
        } else {
            echo 'お問い合わせ内容<br>';
            echo $content;
            echo '<br>';
        }

        if($name==''|| $email==''|| $phone=='' || $postal=='' || $address=='' || $gendar=='' || $birth==''|| $content=='')
        {
            echo '<form method="post" action="phpside/thanks.php">';
            echo '<input type="button" onclick="history.back()" value="戻る">';
            echo '</form>';
        } else {
             echo '<form method="post" action="thanks.php">';
             echo '<input type="name" type="hidden" value="'.$name.'">';
             echo '<input type="email" type="hidden" value="'.$email.'">';
             echo '<input type="phone" type="hidden" value="'.$phone.'">';
             echo '<input type="postal" type="hidden" value="'.$postal.'">';
             echo '<input type="address" type="hidden" value="'.$address.'">';
             echo '<input type="gendar" type="hidden" value="'.$gendar.'">';
             echo '<input type="birth" type="hidden" value="'.$birth.'">';
             echo '<input type="content" type="hidden" value="'.$content.'">';

             echo '<input type="button" onclick="history.back()" value="戻る">';
             echo '<input type="submit" value="OK">';
             echo '</form>';
        }
        
    ?>
</body>
</html>