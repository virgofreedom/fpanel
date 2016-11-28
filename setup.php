
<?php
include 'includes/header.php';
$user = $_POST['user'];
$pass = $_POST['pass'];
if(isset($_POST['submit'])){
    $iConn = mysqli_connect('localhost',$user,$pass) or die(mysqli_error($iConn));//connect to database
    ///Delete if user exists
    $query = "DELETE from mysql.user WHERE User='fpanel'";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Flush privileges
    $query = "flush privileges";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Create user fpanel and password
    $query = "CREATE USER 'fpanel'@'localhost' IDENTIFIED BY 'fpanel'";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Check if database exits

    ///Create database 
    $query = "CREATE DATABASE IF NOT EXISTS fpanel";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Select database
    mysqli_select_db($iConn,'fpanel');
    ///Create table
    $query = "CREATE TABLE IF NOT EXISTS `Users`(
    Id int DEFAULT NULL,
    LastName varchar(255) DEFAULT NULL,
    FirstName varchar(255) DEFAULT NULL,
    Email text DEFAULT NULL,
    Username varchar(255) DEFAULT NULL,
    Password text DEFAULT NULL,
    ROLE text DEFAULT NULL,
    DateCreate datetime DEFAULT NULL
    )";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    ///Add Grant user with database
    $query = "GRANT ALL PRIVILEGES ON `fpanel`.* TO 'fpanel'@'localhost' WITH GRANT OPTION";
    mysqli_query($iConn,$query) or die(mysqli_error($iConn));
    @mysqli_close($iConn);
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
        $myfile = fopen("config/credentials.php","w") or die("Unable to open file");
        fwrite ($myfile,$string);
        fclose($myfile);
        shell_exec("sudo chmod 777 config/credentials.php");
        shell_exec("sudo chmod 755 config");
    }
}
echo '<div class="small-10 small-offset-1 columns">
<h1>Setup Completed</h1>
</div>';
header('Location: index.php');
include 'includes/footer.php';