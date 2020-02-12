    //Function to cross-check the two passwords
    function passwordValidate(){
        //Why can't javascript obtained variables be declared globally??!
        
        var initPassword = document.forms["staffForm"]["password"].value; /*Variable to pick original password from the form*/
        var confirmPassword = document.forms["staffForm"]["passwordConfirm"].value; /*Variable to pick the confirmatory password from the form*/
        if (confirmPassword != initPassword){
            document.getElementById("passwordError").innerHTML = "Passwords do not match!";
        }else{
            document.getElementById("passwordError").innerHTML = "";
        }
    }
    
    //Function to prompt the user to change the password incase of persistent suubmission
    function formValidate(){
        var initPassword = document.forms["staffForm"]["password"].value;
        var confirmPassword = document.forms["staffForm"]["passwordConfirm"].value;
        if (confirmPassword != initPassword){
            alert("Please Insert matching passwords");
            return false;
        }
    }