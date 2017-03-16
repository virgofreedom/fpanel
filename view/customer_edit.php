<div class="container">
        <div class="small-12 columns big-menu">
<?php
if(isset($_GET['id'])){
        $id = $_GET['id'];
        
    }else{
        $id = 0;
    }
if (!isset($_POST['submit']))
{//show form
    $data = array(
        'ClientId'=>$id
    );
    $result = db_get_where('Users',$data);
         for ($i=0;$i<count($result);$i++){
             $com_name = $result[$i]['CompanyName'];
             $cl_last_name =  $result[$i]['LastName'];
             $cl_first_name =  $result[$i]['FirstName'];
             $phone =  $result[$i]['Phone'];
             $email =  $result[$i]['Email'];
         }
?>
            <div class="small-12 columns title-row">
            
            <span class="section-title">New Customers</span>
            </div>    
            <form action="edit" method="POST">
                <input type="hidden" name="id" value="<?=$id?>">
               <div class="row">
                    <div class="small-12 medium-12 large-12 columns">
                        <label for="company_name">Company Name
                        <input type="text" id="company_name" name="com_name" value="<?=$com_name?>" required>
                        </label>        
                    </div>
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="client_name">Client Last Name
                            <input type="text" id="client_name" name="cl_last_name" class="full-width" value="<?=$cl_last_name?>" required>
                        </label>
                    </div>
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="client_name">Client First Name
                            <input type="text" id="client_name" name="cl_first_name" class="full-width" value="<?=$cl_first_name?>" required>
                        </label>
                    </div>    
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="phone">Phone
                        <input type="text" id="phone" name="phone" class="full-width" value="<?=$phone?>">
                        </label>
                    </div>    
                    <div class="small-12 medium-6 large-6 columns">
                        <label for="email">Email
                            <input type="email" id="email" name="email" class="full-width" value="<?=$email?>" required>
                        </label>
                    </div>    
                    <div class="small-12 medium-6 large-6 columns left">
                        <input type="submit" name="submit" class="flat-green" value="Submit">
                        </label>
                    </div>    
                </div>
                
            </form>
        
<?php
}else{//submit form
  $cond = array(
      'ClientId'=>$_POST['id']
  );

  $data = array(
      'LastName' => $_POST['cl_last_name'],
      'FirstName' => $_POST['cl_first_name'],
      'CompanyName' => $_POST['com_name'],
      'Phone' =>$_POST['phone'],
      'Email' =>$_POST['email'],
      'DateCreate'=>date("Y-m-d H:i:s") 
      );
      db_update('Users',$data,$cond);
      $result = $_POST['com_name']." has beed saved!";
  
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