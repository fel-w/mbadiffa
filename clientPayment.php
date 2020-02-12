<?php
    session_start();
    if(isset($_SESSION['login'])){
        $action = @$_REQUEST['q'];
        if (empty($action)){
            $action = "authenticate";
            $_SESSION['currentSection'] = "Authenticate";
        }
?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Payment Form</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            
            <style>
                .label {
                    font-size: 20px;
                    margin-top: 0;
                }
                .spacing{
                    margin-right: 10%;
                }
                .fieldset {
                    padding: 50px 0 30px 50px;
                    box-shadow: 0px 0px 3px 1px rgba(229, 181, 179, 1);
                    margin-bottom: 10px;
                    margin-top: 5%;
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
                td.smaller,td.extrasmaller {
                    width: 28%;
                }
                .extrasmaller{
                    padding-left: 9%;
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
                    .extrasmaller{
                        padding-left: 0;
                    }
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
                <li><div class="current-section">Payment Form</div></li>
                <li><a href="end.php" class="nav-buttons logout">Logout</a></li>
                
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <?php if ($action == "authenticate"){?>
                    <!--Member Authentication Form-->
                    <form action="" method="post">
                        <div class="fieldset">
                            <p class="teller">Member Credentials</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="smaller">
                                        <label class="label">Mobile Number/ID</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" name="checkinput" required size="20">
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
                                    $checkinput = "";
                                    $checkinput = $_POST['checkinput'];
                                    
                                    //Checking if the user whose details exists in loaners' table
                                    $query = mysqli_query($conn, "SELECT * FROM loaned WHERE Telephone = '$checkinput' OR User_ID = '$checkinput' ");
                                    //Counting the number of fetched rows from the database
                                    $count=mysqli_num_rows($query);
                                    if($count == 1){
                                        $_SESSION['confirmation'] = "Loading...";
                                        $_SESSION['currentSection'] = "Clear Debt";
                                        $userdetails = mysqli_fetch_assoc($query); /*stores the fetched array*/
                                        
                                        //Storing user balance and deposite date in global variable
                                        $_SESSION['userID_clear'] = $userdetails['User_ID'];
                                        $_SESSION['totalDebt'] = $userdetails['Amount'];
                                        $_SESSION['phone'] = $userdetails['Telephone'];
                                        
                                        //Selecting the authorizing staff's details
                                        $username = $_SESSION['username']; //Assigning the value contained in $_SESSION['username'] to $username which is usable in the query
                                        $password = $_SESSION['password']; //Same as above
                                
                                        //Query to do the above task
                                        $sql = "SELECT First_Name,Staff_ID FROM staff WHERE Staff_ID ='$username' and Password = '$password' or User_Name ='$username' and Password = '$password'";
                                        if($result = mysqli_query($conn,$sql)){
                                            $resultArray = mysqli_fetch_assoc($result); /*resultArray stores the fetched array*/
                                            $_SESSION['staffname'] =  $resultArray["First_Name"];
                                            $_SESSION['staffid'] =  $resultArray["Staff_ID"];
                                    
                                        }else{
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                        
                                        mysqli_close($conn);
                                ?>
                                        <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -10%;"><?php echo $_SESSION['confirmation']; ?></p>
                                        <meta http-equiv="refresh" content="1;?q=clear" >
                                <?php
                                    }else{
                                        $_SESSION['userError'] = "User not found! Please Check details.";
                                ?>
                                        <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -13%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                    }
                                }
                            ?>
                        </div>
                    </form>
                <?php }elseif ($action == "clear"){?>
                    <form action="" method="post">                
                        <div class="fieldset">
                            <p class="teller">Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="extrasmaller">
                                        <label class="label">Current Debt</label>
                                    </td>
                                    
                                    <td>
                                        <div class="entry"><?php echo $_SESSION['totalDebt']; ?></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="extrasmaller">
                                        <label class="label">Payment</label>
                                    </td>
                                    
                                    <td>
                                        <input type="number" min="1000" max="<?php echo $_SESSION['totalDebt']; ?>" required name="deduction">
                                    </td>
                                </tr>
                                 
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <input type="submit" value="Confirm" name="submit3">
                                    </td>                               
                                </tr>
                                    
                                    
                            </table>
                        </div>  
                    </form>
                    <!--PHP to handle the form data-->
                    <?php
                        //Connection to the database
                    $conn = mysqli_connect("localhost","root","","saccos");
                                    
                    //Incase of connection error
                    if (!$conn)
                        die("Connection Error: " .mysqli_connect_error());
                        
                    //Picking the values from the form after submit button 
                    if (isset($_POST['submit3'])){
                        function refine_input($data){
                            $data = trim($data); //strip unnecessary characters like spaces, newlines and tabs
                            $data = stripslashes($data); //remove backslashes 
                            $data = htmlspecialchars($data); //encrypt html symbols
                            return $data;
                        }
                        //User details from Authentication
                        $userID = $_SESSION['userID_clear'];
                        $phone =$_SESSION['phone'];
                        $totalDebt = $_SESSION['totalDebt'];
                        $staffname = $_SESSION['staffname'];
                        $staffid = $_SESSION['staffid'];
                        date_default_timezone_set("Africa/Kampala");
                        $_SESSION['transactionID'] =  $clearanceID = $userID."TRANSCLR-".date("Y/m/d")."-".date("H:i");
                        
                        //Amount Submitted
                        $deduction = "";
                        $deduction = refine_input($_POST['deduction']);
                        
                        //If just some of the debt has been cleared
                        if($totalDebt > $deduction){
                            //New balance
                            $newBal = $totalDebt - $deduction;
                            
                            //Updating the loaned database
                            $result1 = mysqli_query($conn,"UPDATE loaned SET Amount='$newBal', Amount_Cleared = '$deduction', Clearance_ID ='$clearanceID' WHERE User_ID = '$userID' ");
                            
                            //Adding information to loan_payments table
                            $result2 = mysqli_query($conn,"INSERT INTO loan_payments (User_ID, Telephone, Amount_Cleared, Date_Cleared, Clearance_ID, Staff_No, Staff_Name) VALUES ('$userID', '$phone', '$deduction', NOW(), '$clearanceID', '$staffid', '$staffname')");
                            
                            mysqli_close($conn);
                            echo '<meta http-equiv="refresh" content="0;?q=successful" >';

                        }
                        //If all debt has been cleared
                        elseif ($totalDebt == $deduction){
                            //Removing the client from the loaned database
                            $result1 = mysqli_query($conn,"DELETE FROM loaned WHERE User_ID = '$userID' ");
                            
                            //Adding information to loan_payments table
                            $result2 = mysqli_query($conn,"INSERT INTO loan_payments (User_ID, Telephone, Amount_Cleared, Date_Cleared, Clearance_ID, Staff_No, Staff_Name) VALUES ('$userID', '$phone', '$deduction', NOW(), '$clearanceID', '$staffid', '$staffname')");
                            
                            mysqli_close($conn);
                            echo '<meta http-equiv="refresh" content="0;?q=successful" >';
                        }
                    }
                    ?>
                    <!--End of PHP-->
                <?php } elseif ($action == "successful") { ?>
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