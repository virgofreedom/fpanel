<div class="container">
    <div class="small-12 columns big-menu">
            <div class="small-12 columns title-row">        
            <span class="section-title">Customers List</span>
            </div>     
            <div class="row">
                <table class="hover border">
                    <thead>
                        <tr>
                            <th>ID</th><th>Customer's Company</th><th>Customer's Name</th><th>Customer's Phone</th>
                            <th>Customer's Email</th><th>Date Modify</th><th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $result = db_get('Users');
                        
                        for ($i=0;$i<count($result);$i++){
                            if ($result[$i]['ROLE']!='hoster'){
                            
                            echo '
                                <tr>
                                <td>'.$result[$i]['Id'].'</td><td>'.$result[$i]['CompanyName'].'</td><td>'.$result[$i]['LastName'].' '.$result[$i]['FirstName'].'</td>
                                <td>'.$result[$i]['Phone'].'</td><td>'.$result[$i]['Email'].'</td><td>'.$result[$i]['DateCreate'].'</td>
                                <td>
                                <a href="edit?id='.$result[$i]['Id'].'" class="flat-green button tiny">Edit</a>
                                <a href="#" onclick="msgbox('.
                                "'Are you sure to delete this customer?','delete?id=".$result[$i]['Id']."','_self','yesno'"
                                .')" class="flat-red button tiny">Delete</a>
                                </td>
                                </tr>
                                '; 
                            }
                        }
                        ?>
                        
                    </tbody>
                    
                </table>
            </div>
        

    </div>
</div>