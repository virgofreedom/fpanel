<li><a href="<?=NAV_PATH?>index.php/index"><center>ទំព័រដើម
<br>
        <span class="small">Home</span></center>
</a></li>
<?php
$drId = 0;
$res = db_get('menu','','GROUP By DropId');
for($i=0;$i<count($res);$i++){
    if ($res[$i]['DropId'] == 0){
        $sub_res = db_get('fp_posts',"Where PostId='".$res[$i]['PostId']."'");
        echo '<li><a href="'.NAV_PATH.'index.php/post?p='.$sub_res[0]['PostId'].'"><center>'.$sub_res[0]['PostTitle'].'<br>
        <span class="small">'.$sub_res[0]['PostTitleEn'].'</span></center>
        </a></li>';
    }else{
        echo '
        <li><a href="#"><center>'.$res[$i]['MenuTitle'].'<br>
        <span class="small">'.$res[$i]['EnTitle'].'</span></center>
        </a>
        <ul class="vertical menu">';
        $menu_res = db_get_inner_join('menu','fp_posts','PostId','PostId','','');
        for ($y=0;$y<count($menu_res);$y++){
            if($menu_res[$y]['DropId']==$res[$i]['DropId'] && $menu_res[$y]['PostId'] != 0)
            {
                echo '
                    <li><a href="'.NAV_PATH.'index.php/post?p='.$menu_res[$y]['PostId'].'"><center>'.$menu_res[$y]['PostTitle'].'<br/>
                    <span class="small">'.$menu_res[$y]['PostTitleEn'].'</span></center>
                    </a></li>
                ';
            }
            /*
            <li><a href="#">Item 1A</a></li>
            <li><a href="#">Item 1A</a></li>
      z`      */
        }
        
        
        echo'
            </ul>
        </li>
        ';
    }   
}
/*
    echo '
    <li><a href="'.NAV_PATH.'index.php/post?p='.$res[$i]['PostId'].'">'.$res[$i]['PostTitle'].'</a></li>
    ';
*/
?>
