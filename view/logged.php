<?php
$user = $_POST['email'];
$pass = $_POST['pass'];
$data = array(
    'Email'=>$user
);
$result = db_get_where('Users',$data);
    for ($i=0;$i<count($result);$i++){
        echo pass_decrypt($result[$i]['Password'],KEY_ENCRYPT);
        if ($pass == pass_decrypt($result[$i]['Password'],KEY_ENCRYPT))
        {
         $_SESSION['pass'] = $result[$i]['Password'];
         unset($_SESSION['error']);    
         header("Location: ".VIRTUAL_PATH."index.php/index.php");
         die;
        }
    }
    $_SESSION['error'] = 'Email and Password entered does not match';
    header("Location: ".VIRTUAL_PATH."index.php/login.php");
