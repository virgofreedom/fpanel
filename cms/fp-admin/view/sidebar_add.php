<?php
include PHYSICAL_PATH.'library/admin.php';
?>
<?php
$id ='';
$opt='';
//submit to set sidebar items
$Lposition='';
if(isset($_POST['submit'])){
    $data = array(
        'SourceId'=>$_POST['sr_id'],
        'SidebarType'=>$_POST['sb_type'],
        'Label'=>$_POST['label'],
        'Position'=>$_POST['position'],
        'Options'=>htmlspecialchars($_POST['num_show'],ENT_QUOTES),
        'Orders'=>$_POST['orders']
    );
    db_insert('sidebar_set',$data);

?>
<div class="small-10 small-offset-1 columns big-menu">
    <center><h4>ទិន្ន័យបានរក្សាទុកហើយ!</h4></center>
    <a href="<?=ADMIN_NAV_PATH?>sidebar.php" class="button flat-green">គ្រប់គ្រងផ្នែកចំហៀង</a>
</div>

<?php
die;
}else if(isset($_POST['update'])){
    $data = array(
        'SourceId'=>$_POST['sr_id'],
        'SidebarType'=>$_POST['sb_type'],
        'Label'=>$_POST['label'],
        'Position'=>$_POST['position'],
        'Options'=>$_POST['num_show'],
        'Orders'=>$_POST['orders']
    );
    $cond = array(
        'Id'=>$_POST['Id']
    );
    db_update('sidebar_set',$data,$cond);
    echo'
<div class="small-10 small-offset-1 columns big-menu">
    <center><h4>ទិន្ន័យបានរក្សាទុកហើយ!</h4></center>
    <a href="'.ADMIN_NAV_PATH.'sidebar.php" class="button flat-green">គ្រប់គ្រងផ្នែកចំហៀង</a>
</div>';
die;
}else if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $data = array('Id'=>$id);
    $res = db_get_where('sidebar_set',$data);
    $sb_type = $res[0]['SidebarType'];
    $sr_id =  $res[0]['SourceId'];
    $label =  $res[0]['Label'];
    $position = $res[0]['Position'];
    $orders =  $res[0]['Orders'];
    if($position=='left'){
        $Lposition = 'ខាងឆ្វេង';
    }elseif($position=='right'){
        $Lposition = 'ខាងស្តាំង';
    }elseif($position=='both'){
        $Lposition = 'សងខាង';
    }else{
        $Lposition = '';
    }
    $option =  $res[0]['Options'];
    
    $btn = '<input type="submit" class="button flat-green right" name="update" value="រក្សាទុក"/>';
}else{
    $position = 'right';
    $option =  '';
    $orders = 0;
    if(isset($_GET['sb'])){
        $res_sb = db_get('sidebar_items',"Where SidebarId='".$_GET['sb']."'");
        $label = $res_sb[0]['SidebarName'];
        $sb_type = 'sb_items';
        $sr_id = $res_sb[0]['SidebarId'];;
        $opt = $res_sb[0]['SidebarType'];
    }elseif(isset($_GET['ct'])){
        $res_sb = db_get('catergories',"Where Id='".$_GET['ct']."'");
        $label = $res_sb[0]['Name'];
        $sr_id =  $res_sb[0]['Id'];
        $opt ='';
        $sb_type = 'cat_items';
    }
    $btn = '<input type="submit" class="button flat-green right" name="submit" value="បង្កើត"/>';
}
?>
<div class="small-10 small-offset-1 columns big-menu">
    <center><h4>ការបន្ថែមទិន្ន័យផ្នែកចំហៀង</h4></center>
    <form action="<?=THIS_PAGE?>" method="POST">
        <input type="hidden" name="Id" value="<?=$id?>" readonly><!-- Sidebar id-->
        <input type="hidden" name="sb_type" value="<?=$sb_type?>" readonly><!-- Source Type-->
        <input type="hidden" name="sr_id" value="<?=$sr_id?>" readonly><!-- Source ID-->
        <div class="row">
            <div class="small-3 columns">
                <label for="label" class="text-right middle">ចំណងជើងផ្នែក</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="label" name="label" placeholder="<?=$label?>" value="<?=$label?>">
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="orders" class="text-right middle">លេខលំដាប់រៀង</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="orders" name="orders" placeholder="លេខលំដាប់រៀង" value="<?=$orders?>">
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="middle-label" class="text-right middle">ទីតាំង</label>
            </div>
            <div class="small-9 columns">
                <select name="position" id="">
                    <option value="<?=$position?>"><?=$Lposition?></option>
                    <option value="right">ខាងស្តាំង</option>
                    <option value="left">ខាងឆ្វេង</option>
                    <option value="both">សងខាង</option>
                </select>
            </div>
        </div>
        <?php
        if($opt != 'link'){
            
         
            echo '
            <div class="row">
            <div class="small-3 columns">
                <label for="middle-label" class="text-right middle">Plugin Code/Number to Show</label>
            </div>
            <div class="small-9 columns">
                <textarea type="text" id="middle-label" name="num_show">'.$option.'</textarea>
            </div>
            </div>
            ';
        }else{
            echo '<input type="hidden" name="num_show" value="0">';
        }
        ?>
        <?=$btn?>
    </form>
</div>
