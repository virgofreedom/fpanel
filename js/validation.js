function checkpassword(txt)
{
    
    var right = "fa fa-check flat-green";
    var wrong = "fa fa-times flat-red";
    var passw= /^(?=.*[0-9])[A-Za-z]\w{7,15}$/;
    
   if(txt.value.match(passw))
    {
        
        document.getElementById("check_sign").className = right;
        document.getElementById("submit").style.display = "block";
        return true;
        
    }
    else
    {
        document.getElementById("submit").style.display = "none";
        document.getElementById("check_sign").className = wrong;
        return false;   
    }
    
}
function checkuser(user){
    
    var right = "fa fa-check flat-green";
    var wrong = "fa fa-times flat-red";
    var txt = document.getElementById(user).value;
    
    if (txt.indexOf(" ") == -1){
        document.getElementById("check_user").className = right;
    }else{
        document.getElementById("check_user").className = wrong;
    }
    all_ok();
}
function verifypassword(first,second)
{
    var right = "fa fa-check flat-green";
    var wrong = "fa fa-times flat-red";
    
    if(document.getElementById(first).value == document.getElementById(second).value)
    {
        document.getElementById("check_password").className = right;
        document.getElementById("submit").disabled = false;
        return true;
        
    }
    else
    {
        document.getElementById("submit").disabled = true;
        document.getElementById("check_password").className = wrong;
        return false;
        
    }
    all_ok();
}
function check_email(str,id)
{
    var right = "fa fa-check flat-green";
    var wrong = "fa fa-times flat-red";
    if (str.value == "") { 
        document.getElementById(id).className = "";
        
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //document.getElementById(id).innerHTML = xmlhttp.responseText;
               
               if(xmlhttp.responseText == "yes")
               {
                document.getElementById(id).className = wrong;
                   
               }else
               {
                document.getElementById(id).className = right;   
        
               } 
               
            }
        };
        xmlhttp.open("GET", "check_email.php?email=" + str.value, true);
        xmlhttp.send();
    }   
    
}
function all_ok(){
    var right = "fa fa-check flat-green";
    var wrong = "fa fa-times flat-red";
    if (document.getElementById("check_password").className == wrong || document.getElementById("check_user").className == wrong){
        document.getElementById("submit").disabled = true;
    }else{
        document.getElementById("submit").disabled = false;
    }
}