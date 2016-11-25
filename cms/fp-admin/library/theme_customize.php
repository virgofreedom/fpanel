<?php
$data = array(
    'Title'=> THEME_TITLE
);
$res = db_get_where('themes',$data);
    for ($i=0;$i<count($res);$i++){
        $title = $res[$i]['Title']; 
        $banner = $res[$i]['Banner'];
        $bg_img = $res[$i]['BgImage'];
        $bg_color = $res[$i]['BgColor'];
        $text_color = $res[$i]['TextColor'];
        $nav_color = $res[$i]['NavColor'];
        $nav_text_color = $res[$i]['NavTextColor'];
    }
?>
<style>
    body{
        background:white url("<?=VIRTUAL_PATH_SITE?>themes/<?=$title?>/img/<?=$bg_img?>") repeat fixed center;
        padding : 0px;
    }
    .big-banner{
        background: #<?=$nav_color?>;
    }
    .desktop-menu{
        background: #<?=$nav_color?>;
    }
</style>