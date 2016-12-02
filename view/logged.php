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
         $_SESSION['infos'] = array(
             'LastName' => $result[$i]['LastName'],
             'FirstName' => $result[$i]['FirstName'],
             'Email'=> $result[$i]['Email'],
             'Phone' => $result[$i]['Phone']
         );
         unset($_SESSION['error']);    
         header("Location: ".VIRTUAL_PATH."home");
         die;
        }
    }
    $_SESSION['error'] = 'Email and Password entered does not match';
    header("Location: login");
