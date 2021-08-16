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
    
</body>
</html>