<div class="container">
    <div class="small-12 columns big-menu">
            <div class="small-12 columns title-row">        
            <span class="section-title">Host List</span>
            </div>     
            <div class="row">
                <table class="hover border">
                    <thead>
                        <tr>
                            <th>Host's ID</th><th>Customer's Username</th><th>Domain</th><th>Date Modify</th><th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $result = db_get_left_join('hosting','Users','ClientId');
                        //<a href="customer_edit.php?id='.$result[$i]['CustomerID'].'" class="flat-green button tiny">Edit</a>
                        for ($i=0;$i<count($result);$i++){
                            if($result[$i]['Status'] == 0){//Status == 0 is mean host is suspending
                                $btn = '<a href="#" onclick="msgbox('.
                         "'It will will activate this. Do you want to continue?','activate?id=".$result[$i]['HostId']."','_self','yesno'"
                         .')" class="flat-green button tiny">Activate</a>';
                            }else{//Status == 1 is mean host is activating
                                $btn = '<a href="#" onclick="msgbox('.
                         "'Are you sure to suspend this domain?','suspend?id=".$result[$i]['HostId']."','_self','yesno'"
                         .')" class="flat-red button tiny">Suspend</a>';
                            }
                         echo '
                         <tr>
                         <td>'.$result[$i]['HostId'].'</td><td>'.$result[$i]['Username'].'</td>
                         <td>'.$result[$i]['Domain'].'</td><td>'.$result[$i]['DateModify'].'</td>
                         <td>'.$btn.'
                         
                         <a href="#" onclick="msgbox('.
                         "'Are you sure to delete this customer?','delete?id=".$result[$i]['HostId']."','_self','yesno'"
                         .')" class="flat-red button tiny">Delete</a>
                         </td>
                         </tr>
                         ';   
                        }
                        ?>
                        
                    </tbody>
                    
                </table>
            </div>
        

    </div>
</div>