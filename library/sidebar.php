<?php
$side_set = db_get('sidebar_set');
$SideOrders = array();
$SideType = array();
$SideLabel = array();
$SidePositoin = array();
$SideOpotion = array();
$SideUrl = array();
$SideText = array();
if(count($side_set)==0){
    $left_side = "You do not set any sidebar yet! please login into the admin panel to set the sidebar.";
    $right_side = "You do not set any sidebar yet! please login into the admin panel to set the sidebar.";
}else{
    for($i=0;$i<count($side_set);$i++){
        if ($side_set[$i]['SidebarType']== 'sb_items'){
            $data = array(
            'SidebarId'=>$side_set[$i]['SourceId']
            );
            $side_items = db_get_where('sidebar_items',$data);
        }
        

    }
}