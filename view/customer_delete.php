<div class="container">
        <div class="small-12 columns big-menu">
<?php
if(isset($_GET['id'])){
    $data_arr = array(
        'ClientId'=>$_GET['id']
    );
        $res = db_get_where('Users',$data_arr);
        echo '<pre>';
        echo shell_exec ('sudo deluser '.$res[0]['Username']);
        echo shell_exec ('sudo rm -R /home/'.$res[0]['Username']);
        echo '</pre>';
        db_delete('Users',$data_arr);
        $result = "The data has beed deleted!";
    echo '
    <div class="row">
    <div class="small-12 columns title-row">
                
                <span class="section-title">'.$result.'</span>
    </div>
    <a href="list" class="flat-green button">Back to list</a><a href="'.VIRTUAL_PATH.'home" class="flat-green button">Home</a>
    </div>
    ';        
    }
?>
</div>
    </div>