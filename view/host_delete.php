<div class="container">
        <div class="small-12 columns big-menu">
<?php

if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cond = array(
          'HostId' => $id
        );
        $result = db_get_where('hosting',$cond);
        for ($i=0;$i<count($result);$i++){
            $domain = $result[$i]['Domain'];
            $ClientId = $result[$i]['ClientId'];
        }
        $condUser = array(
            'ClientId' => $ClientId
        );
        $res =  db_get_where('Users',$condUser);
        for ($i=0;$i<count($res);$i++){
            $Username = $res[$i]['Username'];
        }
///disable hosting
shell_exec("sudo chmod 777 /etc/apache2/sites-available");
echo shell_exec("sudo a2dissite ".$domain.".conf");
echo '<br>';
echo shell_exec("sudo service apache2 reload");
echo '<br>';
echo shell_exec("sudo rm -f /etc/apache2/sites-available/".$domain.".conf");
echo shell_exec("sudo rm -fR /home/".$Username."/".$domain);
shell_exec("sudo chmod 755 /etc/apache2/sites-available");
echo '<br>Done!';

        db_delete('hosting',$cond);
        $result = "The data has beed deleted!";
    echo '
    <div class="row">
    <div class="small-12 columns title-row">
                
                <span class="section-title">'.$result.'</span>
    </div>
    <a href="list" class="flat-green button">Back to list</a><a href="home" class="flat-green button">Home</a>
    </div>
    ';        
    }else{
        $id = 0;
}



?>
</div>
    </div>