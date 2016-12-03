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
 $str_host = '<VirtualHost *:80> 
        ServerName www.'.$domain.'
        ServerAlias '.$domain.'
        ServerAdmin webmaster@localhost
        DocumentRoot /home/'.$Username.'/'.$domain.'/
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
         </VirtualHost>      
        ';
echo '<pre>';
shell_exec("sudo chmod 777 /etc/apache2/sites-available");
echo shell_exec("sudo rm -f /etc/apache2/sites-available/".$domain.".conf");
echo shell_exec("sudo echo '".$str_host."' >> /etc/apache2/sites-available/".$domain.".conf");
echo shell_exec("sudo service apache2 reload");
shell_exec("sudo chmod 755 /etc/apache2/sites-available");
echo '</pre>';
echo '<br>Done!';
$data = array(
    'Status' => '1'
);

    db_update('hosting',$data,$cond);
        $result = $domain . " has beed suspended!";
    echo '
    <div class="row">
    <div class="small-12 columns title-row">
                
                <span class="section-title">'.$result.'</span>
    </div>
        <a href="list" class="flat-green button">Back to list</a><a href="'.VIRTUAL_PATH.'home" class="flat-green button">Home</a>
    </div>
    ';        
    }else{
        $id = 0;
}



?>
</div>
    </div>