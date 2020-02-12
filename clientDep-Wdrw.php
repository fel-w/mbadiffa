
<?php
    session_start();
    if(isset($_SESSION['login'])){
        $perform = @$_REQUEST['action'];
        if (empty($perform)){
            $perform = "selection";
            $_SESSION['currentSection'] = "Deposit/Withdraw";
        }
?>
<!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Deposit or Withdraw</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <script>
            function validateForm() {
                var numberField = document.forms["authenticate"]["checkPhone"].value;
                var IDfield = document.forms["authenticate"]["checkID"].value;
                if (numberField == "" && IDfield == "") {
                    alert("At least one of the fields must be filled out");
                    return false;
                }
            }
            function validateForm2() {
                var numberField = document.forms["authenticate2"]["checkPhone2"].value;
                var IDfield = document.forms["authenticate2"]["checkID2"].value;
                if (numberField == "" && IDfield == "") {
                    alert("At least one of the fields must be filled out");
                    return false;
                }
            }
            </script>
            <style>
                .label {
                    font-size: 20px;
                }
                .spacing{
                    margin-right: 10%;
                }
                .fieldset {
                    padding: 50px 0 30px 50px;
                    box-shadow: 0px 0px 3px 1px rgba(229, 181, 179, 1);
                    margin-bottom: 10px;
                    margin-top: 6%;
                }
                .teller {
                    font-size: 30px;
                    font-family: Comic Sans MS;
                    color: #8A0F0B;
                }
                table{
                    width: 70%;
                    margin: auto;
                    margin-top: 3%;
                }
                
                td,th {
                    padding: 10px;
                }
                td.smaller {
                    width: 28%;
                }
                input[type="text"], input[type="date"], input[type="email"], input[type="number"]{    
                    text-indent: 10px; 
                    padding: 5px;
                    border: 2px solid #e5b5b3;
                    border-radius: 2px;
                    outline: none;
                    font-size: 18px;
                    color: black;
                    background: transparent;
                    width: 75%;
                }
                input[type="submit"]{
                    text-transform: uppercase;
                    background: #cb6a67;
                    color: white;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 10px;
                    width: 30%;
                    border-radius: 4px;
                    font-weight: bold;
                    letter-spacing: 1px;
                    margin-top: 10px;
                    box-shadow: 0px 2px 3px 0px #A49DA4;
                }
                input[type="submit"]:hover{
                    background: #E5B5B3;
                }
                input[type="submit"]:active{
                    background: #cb6a67;
                    box-shadow: 0px 0px 0px 0px #A49DA4;
                }
                hr{
                    margin:3px 42px 3px 0;
                    border-color: rgba(140, 18, 13,0.5);
                    border-width: 2px;
                }
                .selection-flex{
                    margin-top: 8%;
                }
                .flex-row-selection{
                    display: flex;
                }
                .first{
                    margin-left: 4%;
                }
                .flex-item-selection {
                    height: 330px;
                    border-radius: 4px;
                    width: 44%;
                    box-shadow: 0px 0px 2px 1px rgba(37, 37, 37, 0.39);
                    margin-right: 3%;
                    text-align: center;
                    line-height: 1.6;
                    text-decoration: none;
                    color: white;
                    font-size: 19px;
                    background: linear-gradient(to top right, #800000 5%, #f7b580 256%);
                    text-transform: uppercase;
                }
                .flex-item-selection div {
                    font-size: 120px;
                    line-height: 1.6;
                    margin: auto;
                    margin: 5% auto;
                }
                .flex-row-selection a:hover{
                    background:#e2766a;
                }
                .flex-row-selection a:active{
                    background:linear-gradient(to top right, #800000 -55%, #f7b580 210%);
                }
                .row-2 {
                    margin-top: 4%;
                    margin-bottom: 3%;
                    margin-left: 26%;
                }
                .row-2-item{
                    width: 60%;
                }
                @media screen and (max-width:767px){
                    .selection-flex {
                        margin-top: 15%;
                    }
                    .row-2{
                        margin-top: 0;
                        margin-bottom: 0;
                        margin-left: 0; 
                    }
                                       
                    .flex-item-selection {
                        height: 100px;
                        width: 100%;
                        margin-right: 0%;
                        margin-bottom: 6%;
                        line-height: 1;
                    }
                    .flex-row-selection{
                        flex-direction: column;
                    }
                    .first {
                         margin-left: 0; 
                    }
                    .flex-item-selection div {
                        font-size: 50px;
                        line-height: 1.7;
                        border: 3px solid white;
                        border-radius: 50%;
                        float: left;
                        margin-left: 5%;
                        margin-top: 0.5%;
                        margin-bottom: 0;
                        width: 17%;
                        height: 92%;
                    }
                    .flex-item-selection .lines {
                        font-size: 0px;
                        line-height: 1;
                        border: none;
                        border-right: 2px solid white;
                        border-radius: 0;
                        clear: right;
                        margin-left: 0;
                        margin-top: 0;
                        margin-bottom: 0;
                        height: 100%;
                        width: 8%;
                    }
                    .flex-item-selection p {
                        clear: right;
                        line-height: 5;
                        text-align: left;
                        text-indent: 25%;
                    }
                }
                /*CSS For successful transactions*/
                .display{
                    border-radius: 4px;
                    background: linear-gradient(to top right, #f7e2d4 12%, #ffffff 180%);
                    width: 100%;
                    height: 200px;
                    padding: 40px 0 50px 50px;
                    box-shadow: 0 2px 4px 1px rgba(0,0,0,0.16);
                    margin-top: 15%;
                }
                .display p{
                    text-align: center;
                    font-size: 25px;
                }
                .display a{
                    text-decoration: none;
                    text-align: center;
                }
                .button-class{
                    text-align: center;
                }
                .okay {                            
                    background: #cb6a67;
                    color: #8F1710;
                    border: none;
                    outline: none;
                    cursor: pointer;
                    padding: 10px;
                    width: 10%;
                    border-radius: 4px;
                    font-weight: bold;
                    box-shadow: 0px 0px 3px 2px #B3CEFB;
                }
                @media screen and (max-width:767px){
                    .okay{
                        width:70px;
                    }
                }
                
                /*Some CSS For Withdraw*/
                .entry {
                    width: 75%;
                    margin-left: 0;
                    padding: 17px;
                    line-height: 0.159;
                    text-align: left;
                    text-indent: 2%;
                    color: #962218;
                    font-size: 19px;
                }
            </style>
        </head>
        
        <body>
            <!--Header Section-->
            <div class="top-header">
                <h4>MBADIFA SACCO RECORDS MANAGEMENT SYSTEM</h4>    
            </div>
            <!--End of Header Section-->
            
            <!--Navigation Section-->            
            <ul class="nav-section">
                <li><a href="dashboard.php" class="nav-buttons home">Home</a></li>    
                <li><div class="current-section"><?php echo $_SESSION['currentSection']; ?></div></li>
                <li><a href="end.php" class="nav-buttons logout">Logout</a></li>
                
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <!--Selection-->
                <?php if ($perform == "selection") { ?>
                    <div class="selection-flex">
                        <div class="flex-row-selection">
                            <a href="?action=authenticateDeposit" class="first flex-item-selection">
                                <div>D</div>
                                <div class="lines"></div>
                                <p>Deposit</p>
                                <?php  $_SESSION['currentSection'] = "Authenticate" ; ?>
                            </a>
                                      
                            <a href="?action=authenticateWithdraw" class="flex-item-selection">
                                <div>W</div>
                                <div class="lines"></div>
                                <p>Withdraw</p>
                                <?php  $_SESSION['currentSection'] = "Authenticate" ; ?>
                            </a>
                        </div>
                    </div>
                <!--End of Selection-->
                
                <!--Member Authentication-->
                <?php }elseif ($perform == "authenticateDeposit") {?>
                    <form name="authenticate" action="" method="post" onsubmit="return validateForm();">
                        <div class="fieldset">
                            <p class="teller">Member Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Mobile Number</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="checkPhone" size="20">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="smaller">
                                        <label class="label">User ID</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="checkID" size="20" >
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="submit" value="Confirm" name="submit">
                                    </td>                               
                                </tr>
                            </table>
                                <!--PHP to handle the authentication form-->
                                <?php
                                    $_SESSION['confirmation'] = $_SESSION['userError'] = ""; /*Declaration of confirmation and error messages for authentication*/
                                    
                                    //PHP executes after the submit button has been pressed
                                    if(isset($_POST['submit'])){
                                        
                                        //Making a conection
                                        $conn = mysqli_connect("localhost","root","","saccos");
                                        
                                        //Incase of connection error
                                        if (!$conn)
                                            die("Connection Error: " .mysqli_connect_error());
                                            
                                        //Variables to pick the form values
                                        $_SESSION['memberID'] = $_SESSION['memberTel'] = $checkID = $checkTel = "";
                                        $_SESSION['memberTel'] = $checkTel = $_POST['checkPhone'];
                                        $_SESSION['memberID'] = $checkID = $_POST['checkID'];
                                        
                                        //SQL query to pick a user following the entered credentials
                                        
                                        if ( $checkTel != "" && $checkID != ""){  //When both $checkTel and $checkID are filled
                                            $query = mysqli_query($conn, "SELECT * FROM all_clients WHERE Telephone = '$checkTel' AND User_ID = '$checkID' ");
                                        }
                                        //When $checkTel is filled
                                        elseif ( $checkTel != "" ){ 
                                            $query = mysqli_query($conn, "SELECT * FROM all_clients WHERE Telephone = '$checkTel' ");
                                        }
                                        //When $checkID is filled
                                        elseif ( $checkID != "" ){ 
                                            $query = mysqli_query($conn, "SELECT * FROM all_clients WHERE User_ID = '$checkID' ");
                                        }
                                        
                                        //Counting the number of fetched rows from the database
                                        $count=mysqli_num_rows($query);
                                        if($count == 1){
                                            $_SESSION['confirmation'] = "Loading...";
                                            $_SESSION['currentSection'] = "Deposit";
                                            $userdetails = mysqli_fetch_assoc($query); /*stores the fetched array*/
                                            
                                            //Storing user values in global variables
                                            $userID = $_SESSION['userID'] = $userdetails['User_ID'];
                                            $firstname = $_SESSION['firstname'] = $userdetails['First_Name'];
                                            $othernames = $_SESSION['othernames'] = $userdetails['Other_Names'];
                                            $phone = $_SESSION['phone'] = $userdetails['Telephone'];

                                            //Selecting the authorizing staff's details
                                            $username = $_SESSION['username']; //Assigning the value contained in $_SESSION['username'] to $username which is usable in the query
                                            $password = $_SESSION['password']; //Same as above
                                            
                                            //Query to do the above task
                                            $sql = "SELECT First_Name,Staff_ID FROM staff WHERE Staff_ID ='$username' and Password = '$password' or User_Name ='$username' and Password = '$password'";
                                            if($result = mysqli_query($conn,$sql)){
                                                $resultArray = mysqli_fetch_assoc($result); /*resultArray stores the fetched array*/
                                                $_SESSION['staffname'] = $staffname = $resultArray["First_Name"];
                                                $_SESSION['staffid'] = $staffid = $resultArray["Staff_ID"];
                                                
                                            }else{
                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                            }
                                ?>
                                            <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -10%;"><?php echo $_SESSION['confirmation']; ?></p>
                                            <meta http-equiv="refresh" content="1;?action=deposit" >
                                <?php
                                        }else{
                                            $_SESSION['userError']="User does not exist";
                                ?>
                                            <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -12%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                        }
                                    }
                                ?>
                            
                        </div>  
                    </form>
                <!--End of Member Authentication Form-->
                
                <!--Actual Deposit Form-->
                <?php }elseif ($perform == "deposit"){ ?>
                    <form action="" method="post">                
                        <div class="fieldset">
                            <p class="teller">Deposit Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Amount Deposited</label>
                                    </td>
                                    
                                    <td>
                                        <input type="number" min="10000" required name="amount">
                                    </td>
                                </tr>
                                    
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="submit" value="Confirm" name="submit">
                                    </td>                               
                                </tr>
                                    
                                    
                            </table>
                        </div>  
                    </form>
                <?php
                    //Connection to the database
                    $conn = mysqli_connect("localhost","root","","saccos");
                                    
                    //Incase of connection error
                    if (!$conn)
                        die("Connection Error: " .mysqli_connect_error());
                        
                    //Picking the values from the form after submit button 
                    if (isset($_POST['submit'])){
                        function refine_input($data){
                            $data = trim($data); //strip unnecessary characters like spaces, newlines and tabs
                            $data = stripslashes($data); //remove backslashes 
                            $data = htmlspecialchars($data); //encrypt html symbols
                            return $data;
                        }
                        //Results from collected values while authenticating
                        $userID = $_SESSION['userID'];
                        $firstname = $_SESSION['firstname'];
                        $othernames = $_SESSION['othernames'];
                        $phone = $_SESSION['phone'];
                        
                        //Amount Submitted
                        $amount = "";
                        $amount = refine_input($_POST['amount']);
                        
                        //Selecting the authorizing staff's details
                        $staffname = $_SESSION['staffname'];
                        $staffid = $_SESSION['staffid'];
                        
                        //echo $staffid."<br>".$staffname."<br>".$phone."<br>".$othernames."<br>".$firstname."<br>".$userID;
                        
                        $sql2 = "INSERT INTO deposits (User_ID, First_Name, Other_Names, Telephone, Amount, Date_Deposited, Staff_No, Staff_Name) VALUES ('$userID', '$firstname', '$othernames', '$phone', '$amount', NOW(), '$staffid', '$staffname')";
                        if ($result2 = mysqli_query($conn,$sql2)){
                            if ($query = mysqli_query($conn,"SELECT * FROM deposits WHERE User_ID = '$userID' ")){/*Selecting how many occurences of a user exist*/
                                $count = mysqli_num_rows($query);/*Counting the number of occurences*/
                                if ($result2 = mysqli_query($conn,"SELECT MAX(User_No) AS User_No FROM deposits WHERE User_ID = '$userID' ")){
                                    $userArray = mysqli_fetch_assoc($result2); //userNumberArray stores fetched array
                                    $userNumber =  $userArray['User_No'];
                                    $altered = "";
                                    if($userNumber > 1 && $count > 1){/*For all the next maximum user numbers after '1' there will be a previous total amount provided the user exists more than once (count > 1) that is the one to use!*/
                                        if ($result2 = mysqli_query($conn,"SELECT MAX(User_No) AS User_No FROM deposits WHERE User_No NOT IN (SELECT MAX(User_No) FROM deposits) AND User_ID = '$userID' ")){
                                            $compoundArray = mysqli_fetch_assoc($result2);
                                            $olduserNumber = $userNumber;
                                            $userNumber =  $compoundArray['User_No'];
                                            $altered = "True";
                                        }else{
                                            echo "Error making inner Selection". mysqli_error($conn);
                                        }
                                    }
                                    if ($result2 = mysqli_query($conn,"SELECT Total_Amount FROM deposits WHERE User_ID = '$userID' AND User_No = $userNumber ")){
                                        $userArray2 = mysqli_fetch_assoc($result2);
                                        $totalAmount = $userArray2['Total_Amount'];
                                        $totalAmount += $amount;
                                        if($altered == "True"){/*Returning the alteration back to normal*/
                                            $userNumber = $olduserNumber;
                                        }
                                        $_SESSION['transactionID'] = $transactionID = $userID."TRANSDEP".$userNumber;
                                        $sql3 = "UPDATE deposits SET Transaction_ID = '$transactionID', Total_Amount = '$totalAmount' WHERE User_No = '$userNumber' ";
                                        if ($result3 = mysqli_query($conn,$sql3)){
                                            mysqli_free_result($result2);
                                            mysqli_close($conn);
                                            echo '<meta http-equiv="refresh" content="0;?action=successDeposit" >';
                                        }else{
                                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                        }
                                    }else{
                                        echo "Error: <br>" . mysqli_error($conn);
                                    }
                                }else{
                                    echo "Error: <br>" . mysqli_error($conn);
                                }
                            }else{
                                echo "Error with selecting all after insertion" . mysqli_error($conn);
                            }
                        }else{
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        }
                    }
                }elseif ($perform == "successDeposit") { ?>
                    <div class="display">
                        <p style="color: #008000;margin-bottom: 6px;">Success :)</p>
                        <p>Transaction ID is <span style="color: #8F1710; font-weight: bold;"><?php echo $_SESSION['transactionID']; ?></span></p><br>
                        <div class="button-class"><a href="dashboard.php"><button type="button" class="okay">Finish</button></a></div>
                    </div>            
                <?php }elseif ($perform ==  "authenticateWithdraw") {?>
                    <form name="authenticate2" action="" method="post" onsubmit="return validateForm2();">
                        <div class="fieldset">
                            <p class="teller">Member Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Mobile Number</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="checkPhone2" size="20">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="smaller">
                                        <label class="label">User ID</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="checkID2" size="20" >
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="submit" value="Confirm" name="submit2">
                                    </td>                               
                                </tr>
                            </table>
                                <!--PHP to handle the authentication form-->
                                <?php       
                                    //PHP executes after the submit button has been pressed
                                    if(isset($_POST['submit2'])){
                                        
                                        //Making a conection
                                        $conn = mysqli_connect("localhost","root","","saccos");
                                        
                                        //Incase of connection error
                                        if (!$conn)
                                            die("Connection Error: " .mysqli_connect_error());
                                            
                                        //Variables to pick the form values
                                        $_SESSION['memberTel'] = $checkTel = $_POST['checkPhone2'];
                                        $_SESSION['memberID'] = $checkID = $_POST['checkID2'];
                                        
                                        //SQL query to pick a user following the entered credentials
                                        
                                        if ( $checkTel != "" && $checkID != ""){  //When both $checkTel and $checkID are filled
                                            $query = mysqli_query($conn, "SELECT * FROM deposits WHERE Telephone = '$checkTel' AND User_ID = '$checkID' ");
                                        }
                                        //When $checkTel is filled
                                        elseif ( $checkTel != "" ){ 
                                            $query = mysqli_query($conn, "SELECT * FROM deposits WHERE Telephone = '$checkTel' ");
                                        }
                                        //When $checkID is filled
                                        elseif ( $checkID != "" ){ 
                                            $query = mysqli_query($conn, "SELECT * FROM deposits WHERE User_ID = '$checkID' ");
                                        }
                                        
                                        //Counting the number of fetched rows from the database
                                        $count=mysqli_num_rows($query);
                                        if($count >= 1){
                                            $_SESSION['confirmation'] = "Loading...";
                                            $_SESSION['currentSection'] = "Withdraw";
                                            $userdetails = mysqli_fetch_assoc($query); /*stores the fetched array*/
                                            
                                            //Storing user balance and deposite date in global variable
                                            $_SESSION['userID_wdrw'] = $userdetails['User_ID'];
                                            $_SESSION['Amount'] = $userdetails['Amount'];
                                            $_SESSION['Date_Deposited'] = $userdetails['Date_Deposited'];
                                            mysqli_close($conn);
                                            
                                ?>
                                            <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -10%;"><?php echo $_SESSION['confirmation']; ?></p>
                                            <meta http-equiv="refresh" content="1;?action=withdraw" >
                                <?php
                                        }else{
                                            $_SESSION['userError']="Invalid User Details";
                                ?>
                                            <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -12%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                        }
                                    }
                                ?>
                            
                        </div>  
                    </form>
                
                <?php }elseif ($perform == "withdraw"){
                        //Making a conection
                        $conn = mysqli_connect("localhost","root","","saccos");
                        
                        //Incase of connection error
                        if (!$conn)
                            die("Connection Error: " .mysqli_connect_error());
                            
                        //Picking deposit details
                        $userID = $_SESSION['userID_wdrw'];
                        $sql1 = "SELECT MAX(User_No) AS User_No FROM deposits WHERE User_ID = '$userID' ";
                        if ($result1 = mysqli_query($conn,$sql1)){
                            $userArray = mysqli_fetch_assoc($result1);
                            $_SESSION['userNo'] = $userNo = $userArray['User_No'];
                            
                            if ($result1 = mysqli_query($conn,"SELECT * FROM deposits WHERE User_No = '$userNo' AND User_ID = '$userID'")){
                                $userArray2 = mysqli_fetch_assoc($result1);
                                $_SESSION['currentBal'] = $currentBal = $userArray2['Total_Amount'];
                                $_SESSION['depID'] = $userArray2['Transaction_ID'];
                                if ($currentBal == 10000){
                                    $_SESSION['availableCash'] = $availableCash = 0;
                                }elseif ($currentBal > 10000){
                                    $_SESSION['availableCash'] = $availableCash = $currentBal - 10000;
                                }
                                mysqli_close($conn);
                            }else{
                                echo"Error: Selecting with user number <br>" . mysqli_error($conn);
                            }
                        }else{
                            echo"Error: ".$sql1. "<br>" . mysqli_error($conn);
                        }
                ?>
                    <form action="" method="post">                
                        <div class="fieldset">
                            <p class="teller">Withdraw Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Amount Available</label>
                                    </td>
                                    
                                    <td>
                                        <div class="entry"><?php echo $_SESSION['currentBal']; ?></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Maximum Withdraw Amount</label>
                                    </td>
                                    
                                    <td>
                                        <div class="entry"><?php echo $_SESSION['availableCash']; ?></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Withdraw Amount</label>
                                    </td>
                                    
                                    <td>
                                        <input type="number" min="<?php if ($_SESSION['availableCash'] > 5000 ){echo"5000";}else{echo "0";} ?>" max="<?php echo $_SESSION['availableCash']; ?>" required name="amount">
                                    </td>
                                </tr>
                                 
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="submit" value="Confirm" name="submit">
                                    </td>                               
                                </tr>
                                    
                                    
                            </table>
                        </div>  
                    </form>
                <?php
                    //After the submission button is pressed
                    if (isset($_POST['submit'])){
                        $conn = mysqli_connect("localhost","root","","saccos");
                        
                        if (!$conn)
                            die("Connection Error: ".mysqli_connect_error());
                            
                        //Making the deduction
                        function refine_input($data){
                            $data = trim($data); //strip unnecessary characters like spaces, newlines and tabs
                            $data = stripslashes($data); //remove backslashes 
                            $data = htmlspecialchars($data); //encrypt html symbols
                            return $data;
                        }
                        $amount = "";
                        $amount = refine_input($_POST['amount']);
                        $userNo = $_SESSION['userNo'];
                        $userID = $_SESSION['userID_wdrw'];
                        $staffname = $_SESSION['staffname'];
                        $staffid = $_SESSION['staffid'];
                        $currentBal = $_SESSION['currentBal'];
                        $newBal = $_SESSION['currentBal'] - $amount;
                        
                        //Query to change the current user's amount in deposits table
                        $sql = "UPDATE deposits SET Total_Amount = '$newBal',Withdraw_Applied = 'Yes',Withdraw_Amount = '$amount' WHERE User_ID = '$userID' AND User_No = '$userNo' ";
                        if ($result = mysqli_query($conn,$sql)){
                            //Query to make a record in a withdraw table
                            $sql_I = "INSERT INTO withdraws (User_ID,Withdraw_Amount,Old_Balance,New_Balance,Withdraw_Date,Staff_No,Staff_Name) VALUES ('$userID','$amount','$currentBal','$newBal',NOW(),'$staffid','$staffname')";
                            if ($result = mysqli_query($conn,$sql_I)){
                                if ($result2 = mysqli_query($conn,"SELECT MAX(User_No) AS User_No FROM withdraws WHERE User_ID = '$userID' ")){
                                    $resultArray2 = mysqli_fetch_assoc($result2);
                                    $userNo = $resultArray2['User_No'];
                                    $_SESSION['transactionID'] = $transactionID = $_SESSION['depID']."TRANSWDRW".$userNo;
                                    if ($result2 = mysqli_query($conn,"UPDATE withdraws SET Transaction_ID = '$transactionID' WHERE User_No = '$userNo' ")){
                                        echo '<meta http-equiv="refresh" content="0;?action=successWithdraw" >';
                                    }else{
                                        echo "Error: Updating <br>" . mysqli_error($conn);   
                                    }
                                }else{
                                    echo "Error: Picking User Number <br>" . mysqli_error($conn);
                                }
                            }else{
                                echo"Error: ".$sql_I. "<br>" . mysqli_error($conn);
                            }
                        }else{
                            echo"Error: ".$sql. "<br>" . mysqli_error($conn);
                        }
                    }
                }elseif ($perform == "successWithdraw") { ?>
                    <div class="display">
                        <p style="color: #008000;margin-bottom: 6px;">Success :)</p>
                        <p>Transaction ID is <span style="color: #8F1710; font-weight: bold;"><?php echo $_SESSION['transactionID']; ?></span></p><br>
                        <div class="button-class"><a href="dashboard.php"><button type="button" class="okay">Finish</button></a></div>
                    </div>            
                <?php } ?>
            </div>
            <!--End of Body Container-->
        </body>
        
    </html>
<?php
    }
    else{ ?>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>First Login</title>
                <link rel="stylesheet" type="text/css" href="css/main.css">
                <style>
                    body{
                        background-color: rgb(243, 211, 190);
                    }
                    .display{
                        border-radius: 4px;
                        background: linear-gradient(to top right, #f7e2d4 -36%, #ffffff 100%);
                        width: 100%;
                        height: 200px;
                        padding: 65px 0 50px 50px;
                        box-shadow: 0 2px 4px 1px rgba(0,0,0,0.16);
                        margin-top: 15%;
                    }
                    .display p{
                        text-align: center;
                        font-size: 25px;
                    }
                </style>
            </head>
            
            <body>
                <!--Header Section-->
                <div class="top-header">
                    <h4>MBADIFA SACCO RECORDS MANAGEMENT SYSTEM</h4>    
                </div>
                <!--End of Header Section-->
                
                <div class="container">
                    <div class="display">
                        <p>User not logged in!<br>Please Login to continue</p>
                    </div>
                </div>
            </body>
        </html>
<?php 
        header("refresh:2;url=index.php");
    }
    //If the last activity performed happened more than 300 seconds/5 minutes ago, destroy that session variable(login)
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)){
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST_ACTIVITY'] = time(); /*Update last activity time stamp*/
?>