
<?php
include 'includes/header.php';
include 'library/common.php';
//////////Get all post value from index.php//////////////
$user = $_POST['user'];
$pass = $_POST['pass'];
$last = $_POST['lastname'];
$first = $_POST['firstname'];
$secret =   $_POST['secret_key'];
$email  = $_POST['email'];
$password = pass_encrypt($_POST['password'],$secret);
$http_host = $_POST['http_host'];
$physical =  $_POST['physical_path'];
$now = date("Y-m-d H:i:s");

shell_exec("sudo mkdir config");
 /////Create file Credentials in config folder
    if(!file_exists("config/credentials.php")){
        $string = "<?php \r\n 
        define('DB_NAME','fpanel'); \r\n
        define('DB_USER','fpanel'); \r\n
        define('DB_PASSWORD','fpanel'); \r\n
        define('DB_HOST','localhost'); \r\n
        ";
        ///Change permission
        shell_exec("sudo chmod 777 config");
        //create file
        $credenttials = fopen("config/credentials.php","w") or die("Unable to open file");
        fwrite ($credenttials,$string);
        fclose($credenttials);
        shell_exec("sudo chmod 777 config/credentials.php");
        shell_exec("sudo chmod 755 config");
    }
    /////////Create config file///////////
    if(!file_exists("config/config.php")){
        $string = "<?php \n
        //config on the domain \n
        define('VIRTUAL_PATH','http://".$http_host."'); \n
        define('PHYSICAL_PATH','".$physical."'); \n
        define('KEY_ENCRYPT','".$secret."'); \n
        ";
        $config_default = fopen ("library/config_default.conf","r") or die("Unable to open file");
        $string .= fread ($config_default,filesize("library/config_default.conf"));
        ///Change permission
        shell_exec("sudo chmod 777 config");
        $config = fopen("config/config.php","w") or die("Unable to open file");
        fwrite ($config,$string);
        fclose($config);
        shell_exec("sudo chmod 777 config/config.php");
        shell_exec("sudo chmod 755 config");
    }


/////////////////////////////////////
if(isset($_POST['submit'])){
    $iConn = mysqli_connect('localhost',$user,$pass) or die(mysqli_error($iConn));//connect to database
    $query = "Select * from mysql.user where User='fpanel'";
    $res = mysqli_query($iConn,$query);
    if (mysqli_num_rows($res)==0){
        ///Create user fpanel and password
        $query = "CREATE USER 'fpanel'@'localhost' IDENTIFIED BY 'fpanel'";
        mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    }
    ///Create database 
    $query = "CREATE DATABASE IF NOT EXISTS fpanel";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Select database
    mysqli_select_db($iConn,'fpanel');
    ///Create table
    $query = "CREATE TABLE IF NOT EXISTS `Users`(
    Id int AUTO_INCREMENT PRIMARY KEY,
    LastName varchar(255) DEFAULT NULL,
    FirstName varchar(255) DEFAULT NULL,
    Email text DEFAULT NULL,
    Password text DEFAULT NULL,
    ROLE text DEFAULT NULL,
    DateCreate datetime DEFAULT NULL
    )";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Add Grant user with database
    $query = "GRANT ALL PRIVILEGES ON `fpanel`.* TO 'fpanel'@'localhost' WITH GRANT OPTION";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Check user exists
    $query = "Select * from Users Where Email='$email'";
    $res = mysqli_query($iConn,$query);
    if (mysqli_num_rows($res) == 0){
        ///create user hosterd
        $query = "INSERT INTO Users(`LastName`,`FirstName`,`Email`,`Password`,`ROLE`,`DateCreate`)
        VALUES ('$last','$first','$email','$password','hoster','$now')";
        mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    }
    
    
    @mysqli_close($iConn);

}
echo '<div class="small-10 small-offset-1 columns">
<h1>Setup Completed</h1>
</div>';
header('Location: index.php');
include 'includes/footer.php';