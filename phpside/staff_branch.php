
    <?php

        session_start();
        session_regenerate_id(true);
        if(isset($_SESSION['login'])==false)
        {
            echo 'ログインされていません。<br>';
            echo '<a href="../phplogin/staff_login.html">ログイン画面へ</a>';
            exit();
        }

        if(isset($_POST['disp'])==true)
        {
            if(isset($_POST['staff_id'])==false)
            {
                header('Location:staff_ng.php');
                exit();
            }
            $staff_id=$_POST['staff_id'];
            header('Location:staff_disp.php?staff_id='.$staff_id);
            exit();
        }

        if(isset($_POST['add'])==true)
        {
            header('Location:staff_add.php');
            exit();
        }

        if(isset($_POST['edit'])==true)
        {
            if(isset($_POST['staff_id'])==false)
            {
                header('Location:staff_ng.php');
                exit();
            }
            $staff_id=$_POST['staff_id'];
            header('Location:staff_edit.php?staff_id='.$staff_id);
            exit();
        }

        if(isset($_POST['delete'])==true)
        {
            if(isset($_POST['staff_id'])==false)
            {
                header('Location:staff_ng.php');
                exit();
            }
            $staff_id=$_POST['staff_id'];
            header('Location:staff_delete.php?staff_id='.$staff_id);
            exit();
        }
    ?>
    