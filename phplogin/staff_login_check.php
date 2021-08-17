<?php

        require_once('../kansu/common.php');
        
        $post=sanitize($_POST);
        $staff_id=$post['id'];
        $staff_pass=$post['password'];

        $staff_pass=md5($staff_pass);

        $dsn='mysql:dbname=shokai;host=localhost;charset=utf8';
        $user='root';
        $password='';

    try
    {
        $dbh=new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql='SELECT staff_name FROM shokai_staffs WHERE id=? AND password=?';
        $stmt=$dbh->prepare($sql);
        $data[]=$staff_id;
        $data[]=$staff_pass;
        $stmt->execute($data);

        $dbh=null;

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);

        if($rec==false)
        {
            echo 'スタッフコードかパスワードが間違っています。<br>';
            echo '<a href="staff_login.html">戻る</a>';
        } else {
            session_start();
            $_SESSION['login']=1;
            $_SESSION['staff_id']=$staff_id;
            $_SESSION['staff_name']=$rec['staff_name'];
            header('Location:menu.php');
            exit();
        }
    }

    catch(Exception $e)
    {
        echo 'ただいま障害により大変ご迷惑をおかけしております。';
        echo $e;
        exit();
    }

?>