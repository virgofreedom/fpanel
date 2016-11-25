<?php
include PHYSICAL_PATH.'library/admin.php';
?>

<?php
//submit to create a new sidebar items
if(isset($_POST['submit'])){
    $data = array(
        'SidebarName'=>$_POST['Name'],
        'HtmlId'=>$_POST['htmlid'],
        'SidebarType'=>$_POST['SidebarType'],
        'Url'=>$_POST['url'],
        'Text'=>htmlspecialchars($_POST['text'],ENT_QUOTES)
        
    );
    db_insert('sidebar_items',$data);

?>
<div class="small-10 small-offset-1 columns big-menu">
    <center><h4>ទិន័្នយបានរក្សាទុក!</h4></center>
    
    <a href="<?=ADMIN_NAV_PATH?>sidebar.php" class="button flat-green">គ្រប់គ្រងផ្នែកចំហៀង</a>
</div>
<?php
}else{
?>
<div class="small-10 small-offset-1 columns big-menu">
    <center><h4>បង្កើតផ្នែកចំហៀង</h4></center>
    <form action="<?=THIS_PAGE?>" method="POST">
        Sidebar's Name : <input type="text" name="Name" placeholder="ឈ្មោះរបស់ទិន្ន័យ/Name of Sidebar"/>
        Sidebar's Type : <input type="text" name="htmlid" placeholder="google_maps..etc.">
        Sidebar's Option :
        <select name="SidebarType" id="Options">
            <option value=""></option>
            <option value="option">Options</option>
            <option value="link">Link</option>
            <option value="input">Input Text</option>
            <option value="api">API plugin</option>
        </select>
        Sidebar's URL:
        <input type="text" name="url" placeholder="URL"/>
        Sidebar's Text for link:
        <textarea name="text" ></textarea>
        <input type="submit" class="button flat-green right" name="submit" value="បង្កើត"/>
    </form>
</div>
<?php
}
?>