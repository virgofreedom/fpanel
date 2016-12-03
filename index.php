<?php
if(file_exists("config/credentials.php")){
    
    include 'config/config.php';
    include 'theme/fpanel/header.php';
    include 'theme/fpanel/layout/index.php';
    include 'theme/fpanel/footer.php';
}else{
    include 'includes/header.php';
?>

<div class="small-12 medium-10 large-10 medium-offset-1 large-offset-1 columns big-menu">
    <form action="setup.php" method="POST">
    <h3 class="center">First Time Setup</h3>
    <div class="row">
    <div class="small-12 columns">
         <h4>Database Information</h4>
         
             <div class="small-12 medium-6 large-6 columns">
                <label for="">Root user*:</label>
                <input type="text" placeholder="root" name="user" required>
             </div>
             <div class="small-12 medium-6 large-6 columns">
                <label for="">Password*:</label>
                <input type="password" placeholder="Password" name="pass" required>
             </div>
             
    </div>
    </div>
    <div class="row">
    <div class="small-12 columns">
         <h4>Hoster/Admin Information</h4>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">Last Name*:</label>
                <input type="text" placeholder="Last Name" name="lastname" required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">First Name*:</label>
                <input type="text" placeholder="First Name" name="firstname" required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">Username*:</label>
                <input type="text" placeholder="First Name" name="username" required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">Email*:</label>
                <input type="Email" placeholder="Email" name="email" required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">Password*:</label>
                <input type="password" placeholder="Password" name="password" required>
             </div>
             
    </div>
    </div>
    <div class="row">
    <div class="small-12 columns">
         <h4>Config Information</h4>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">VIRTUAL PATH*:</label>
                <input type="text" placeholder="HTTP HOST" name="http_host" value="<?=$_SERVER['HTTP_HOST']?>/fpanel/" required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">PHYSICAL PATH*:</label>
                <input type="text" placeholder="Physical path" name="physical_path" 
                value="<?=$_SERVER['DOCUMENT_ROOT']?>/fpanel/"
                required>
             </div>
             <div class="small-12 medium-6 large-4 columns">
                <label for="">Secret Key*:</label>
                <input type="text" placeholder="Secret" name="secret_key" required>
             </div>
             <div class="small-12 columns">
                 <label for=""><i>Note*: all the path must ending by "/". In case you forgot "/" you can add it later in the control panel.</i></label>
             </div>
             <div class="small-12 columns">
                <input type="submit" name="submit" class="button flat-green right" value="Next">    
             </div>    
    </div>
    </div>
    </form>
</div>

<?php
    include 'includes/footer.php';
}
  
    