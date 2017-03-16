<div class="container">
        <div class="small-12 columns big-menu">
<?php

if (!isset($_POST['submit']))
{//show form
?>
            <div class="small-12 columns title-row">
            
            <span class="section-title">New Customers</span>
            </div>    
            <form action="new" method="POST" name="form1">
               <div class="row">
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="company_name">Company Name*
                        <input type="text" id="company_name" name="com_name" required>
                        </label>        
                    </div>
                    <div class="small-12 medium-5 large-5 columns">
                        <label for="username">Username*
                        <input type="text" id="username" name="username" 
                        onkeyup= "checkuser('username')";
                        required>
                        </label>        
                    </div>
                    <div class="small-12 medium-1 large-1 columns">
                        <label for=""><br>
                            <i id="check_user" class="fa fa-times flat-red"></i>
                        </label>
                    </div>
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="client_name">Client Last Name*
                        <input type="text" id="client_name" name="cl_last_name" class="full-width" required>
                        </label>
                    </div>
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="client_name">Client First Name*
                        <input type="text" id="client_name" name="cl_first_name" class="full-width" required>
                        </label>
                    </div>    
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="phone">Phone
                        <input type="text" id="phone" name="phone" class="full-width">
                        </label>
                    </div>    
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="email">Email*
                        <input type="email" id="email" name="email" class="full-width" required>
                        </label>
                    </div>
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="password">Password*
                            <input type="password" id="password" name="password" 
                            onkeyup="verifypassword('password','v_password')" class="full-width" required>
                        </label>
                    </div>
                    <div class="small-12 medium-5 large-5 columns">
                        <label for="v_password">Verify Password* 
                            <input type="password" id="v_password" name="v_password" 
                            onkeyup="verifypassword('password','v_password')" class="full-width" required>
                            
                        </label>
                    </div>    
                    <div class="small-12 medium-1 large-1 columns">
                        <label for=""><br>
                            <i id="check_password" class="fa fa-check flat-green"></i>
                        </label>
                    </div>
                    <div class="small-12 medium-6 large-6 columns left">
                        
                        <input type="submit" name="submit" id="submit" class="flat-green" value="Submit" disabled>
                        </label>
                    </div>    
                </div>
                
            </form>
            
        
<?php
}else{//submit form
  $data = array(
      'Username' => $_POST['username'],
      'LastName' => $_POST['cl_last_name'],
      'FirstName' => $_POST['cl_first_name'],
      'CompanyName' => $_POST['com_name'],
      'Phone' =>$_POST['phone'],
      'Email' =>$_POST['email'],
      'Password'=>pass_encrypt($_POST['password'],KEY_ENCRYPT),
      'ROLE'=>'client',
      'DateCreate'=>date("Y-m-d H:i:s") 
      );
  $res = db_get('Users','Where email="'.$_POST['email'].'"');
  if (count($res > 0)){
      if($res[0]['Email'] != ""){
      $result = $_POST['email'] . " has been already assign to an account. Please enter another email!.";
      }else{
          db_insert('Users',$data);
          $result = $_POST['com_name']." has beed saved!";
            echo '<pre>';
            echo shell_exec ('sudo echo -e "'.$_POST['password'].'\n'.$_POST['password'].'\n\n\n\n\n\nY\n" | sudo adduser '.$_POST['username']);
            echo '</pre>';
      }  
  }
  
      
  
  echo '
   <div class="small-12 columns title-row">
            <label class="section-title">'.$result.'</label>
   </div>
   <div class="small-12 columns title-row">
        <a href="new" class="flat-green button">Add more</a><a href="'.VIRTUAL_PATH.'home" class="flat-green button">Home</a>
   </div>
   
  ';
}
?>
</div>
    </div>