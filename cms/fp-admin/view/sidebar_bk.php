
<?php
include PHYSICAL_PATH.'library/admin.php';
?>
<div class="small-5 columns big-menu sub-left-side-bar">
<ul class="menu dragdrog" id="sidebar_item"  ondrop="drop(event)" ondragover="allowDrop(event)">
<?php
$res = db_get('sidebar_items');
for ($i=0; $i<count($res);$i++){
?>
    <li class="col-2" sidebar="<?=$res[$i]['SidebarId']?>" draggable="true" onclick="show_hide(this)" ondragstart="drag(event,'<?=$res[$i]['SidebarName']?>','<?=$res[$i]['HtmlId']?>','<?=$res[$i]['SidebarId']?>')" id="<?=$res[$i]['HtmlId']?>"><?=$res[$i]['SidebarName']?><i></i>
    
    </li>
<?php
}
?>

    </ul>
    
</div>
<div class="small-3 columns big-menu sub-left-side-bar">
    <input type="text" name="left_side" id="left_side">
    <ul id="sidebar_left" class="vertical menu dragdrog"  ondrop="drop(event)" ondragover="allowDrop(event)">
    </ul>
</div>
<div class="small-3 columns big-menu sub-left-side-bar left">
    <input type="text" name="right_side" id="right_side">
    <ul id="sidebar_right" class="vertical menu dragdrog" ondrop="drop(event)" ondragover="allowDrop(event)">
    </ul>
</div>
<div class="small-6 columns big-menu sub-left-side-bar left">
    <input type="submit" name="submit" value="Save" class="button flat-green right">
</div>