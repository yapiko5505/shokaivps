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
    <?php

        require_once('../kansu/common.php');

        $post=sanitize($_POST);
        $staff_name=$post['staff_name'];
        $staff_pass=$post['password'];
        $staff_pass2=$post['password2'];

        if($staff_name=='') {
            echo 'スタッフ名が入力されていません。';
        } else {
            echo 'スタッフ名';
            echo $staff_name;
            echo '<br>';
        }

        if($staff_pass=='') {
            echo 'パスワードが入力されていません。<br>';
        }

        if($staff_pass!=$staff_pass2) {
            echo 'パスワードが一致しません。<br>';
        }

        if($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2) {
            echo '<form>';
            echo '<input type="button" onclick="history.back()" value="戻る">';
            echo '</form>';
        } else {
            $staff_pass=md5($staff_pass);
            echo '<form method="post" action="staff_add_done.php">';
            echo '<input type="hidden" name="staff_name" value="'.$staff_name.'">';
            echo '<input type="hidden" name="password" value="'.$staff_pass.'">';
            echo '<br>';
            echo '<input type="button" onclick="history.back()" value="戻る">';
            echo '<input type="submit" value="OK">';
            echo '</form>';
        }
    
    ?>
</body>
</html>