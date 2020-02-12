
<?php
    session_start();
    if(isset($_SESSION['login'])){
        $action = @$_REQUEST['a'];
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
            <title>Borrowing Form</title>
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
                    padding-left: 10%;
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
                .count-box{
                    border:2px solid #8B110C;
                    padding: 20px;
                    border-radius: 6px;
                    background-color: #F3D3BE;
                    color: #8B110C;
                    margin: 2% auto;
                    line-height: 2;
                }
                .count-box ul{
                    margin-left: 3%;
                }
                .header{
                    font-size: 24px;
                }
                .items{
                    font-size: 18px;
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
                <li><div class="current-section"><?php echo $_SESSION['currentSection']; ?></div></li>
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
                                        
                                        //Date Difference function to calculate number of days from time of deposit 
                                        function date_difference($date){
                                            $today = date("Y-m-d");
                                            $today = strtotime($today);
                                            $date = strtotime($date);
                                            $difference = floor(($today - $date)/(86400*365));
                                            return $difference;
                                        }
                                        
                                        //Checking whether the user exists in the saccos system
                                        if ($result = mysqli_query($conn,"SELECT * FROM all_clients WHERE User_ID = '$checkinput' OR Telephone = '$checkinput' ")){
                                            if (mysqli_num_rows($result) == 0 ){
                                                $_SESSION['userError']="User does not exist";
                                ?>
                                                <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -12%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                            }else{
                                                $valuearray = mysqli_fetch_assoc($result);
                                                $initialDate = $valuearray['Date_Added'];
                                                $userID = $_SESSION['userID'] = $valuearray['User_ID'];
                                                $firstname = $_SESSION['firstname'] = $valuearray['First_Name'];
                                                $othernames = $_SESSION['othernames'] = $valuearray['Other_Names'];
                                                $phone = $_SESSION['phone'] = $valuearray['Telephone'];
                                                $_SESSION['numYrs'] = $numYrs = date_difference($initialDate);
                                                
                                                //Checking whether user already has a pending loan
                                                if ($resultExists = mysqli_query($conn,"SELECT * FROM loaned WHERE User_ID = '$userID' ")){
                                                    //If the user does not exist
                                                    if(mysqli_num_rows($resultExists) == 0){
                                                        //Getting the number of transactions 
                                                        if ($result2 = mysqli_query($conn,"SELECT Transaction_ID FROM deposits WHERE User_ID = '$userID' UNION ALL SELECT Transaction_ID FROM withdraws WHERE User_ID = '$userID' ")){
                                                            $no_transactions = mysqli_num_rows($result2);
                                                            
                                                            //User to qualify getting a loan must have a membership of atleast 1 year and carried out at least 5 transactions
                                                            if ($numYrs >= 1 && $no_transactions >= 5){
                                                                $_SESSION['confirmation'] = "Loading...";
                                                                $_SESSION['currentSection'] = "Loan";
                                                                
                                                                //Getting the total amount of money deposited by the user
                                                                $total = mysqli_query($conn,"SELECT SUM(Amount) AS Sum_Amount FROM deposits WHERE User_ID = '$userID' ");
                                                                $totalArray = mysqli_fetch_assoc($total);
                                                                $_SESSION['maxLoan'] = $totalArray['Sum_Amount'] * 2;
                                                                
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
                                                                <meta http-equiv="refresh" content="1;?a=loan" >
                                <?php
                                                            }
                                                            //When user does not qualify
                                                            else{
                                                                $_SESSION['userError']="User does not meet loan qualification";
                                ?>
                                                            <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -12%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                                            }
                                                        }
                                                        else{
                                                            echo "Error getting number of transactions " .mysqli_error($conn);
                                                        }
                                                    }
                                                    //If User Already Has a Loan
                                                    else{
                                                        $_SESSION['userError']="User already has pending loan!";
                                ?>
                                                        <p style="font-size: 25px;text-align: center;color: #921A13;margin-left: -12%;"><?php echo $_SESSION['userError']; ?></p>
                                <?php
                                                    }
                                                }else{
                                                    echo "Error checking whether user already has a loan ". mysqli_error($conn);
                                                }
                                            }
                                        }else{
                                            echo "Error getting the first deposit " . mysqli_error($conn);
                                        }
                                    }
                                ?>
                            
                        </div>  
                    </form>
                    <!--End of Member Authentication Form-->
                    
                    <!--Qualification Information-->
                    <div class="count-box">
                        <p class="header">Qualifications for a Loan:</p>
                        <ul>
                            <li class="items">Membership period of at least a year.</li>
                            <li class="items">At least five transactions (Deposit or Withdraw or both).</li>
                        </ul>
                        <p class="header">Cash Details:</p>
                        <ul>
                            <li class="items">Maximum acquirable amount is equivalent to twice the total deposited amount.</li>
                            <li class="items">A 10% interest is immediately added for whichever period of borrowing</li>
                        </ul>
                    </div>
                    <!--End of Qualification Information-->
                <?php } elseif ($action == "loan"){ ?>
                    <form action="" method="post">                
                        <div class="fieldset">
                            <p class="teller">Loan Details</p>
                            <hr>
                            <table border="0">
                                <tr>
                                    <td class="extrasmaller">
                                        <label class="label">Amount</label>
                                    </td>
                                    
                                    <td>
                                        <input type="number" min="10000" max = "<?php echo $_SESSION['maxLoan'] ; ?>" placeholder="Max <?php echo $_SESSION['maxLoan'] ; ?>" required name="amount">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="extrasmaller">
                                        <label class="label">Security</label>
                                    </td>
                                    
                                    <td>
                                        <input type="text" required name="security">
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
                            $numYrs = $_SESSION['numYrs'];
                            
                            //Amount Submitted
                            $security = $amount = "";
                            $amount = refine_input($_POST['amount']);
                            
                            //Adding Interest
                            $amount *= 1.1; 
                            $security = refine_input($_POST['security']);
                            
                            //Selecting the authorizing staff's details
                            $staffname = $_SESSION['staffname'];
                            $staffid = $_SESSION['staffid'];
                            
                            //echo $staffid."<br>".$staffname."<br>".$phone."<br>".$othernames."<br>".$firstname."<br>".$userID;
                            
                            $sql2 = "INSERT INTO loaned (User_ID, First_Name, Other_Names, Telephone, Membership_in_Years, Amount, Security, Date_Loaned, Staff_No, Staff_Name) VALUES ('$userID', '$firstname', '$othernames', '$phone', '$numYrs', '$amount', '$security', NOW(), '$staffid', '$staffname')";
                            if ($result2 = mysqli_query($conn,$sql2)){
                                if ($result2 = mysqli_query($conn,"SELECT MAX(User_No) AS User_No FROM loaned WHERE User_ID = '$userID' ")){
                                    $userArray = mysqli_fetch_assoc($result2); //userNumberArray stores fetched array
                                    $userNumber =  $userArray['User_No'];
                                    $_SESSION['transactionID'] = $transactionID = $userID."TRANSLOAN".$userNumber;
                                    $sql3 = "UPDATE loaned SET Transaction_ID = '$transactionID' WHERE User_No = '$userNumber' ";
                                    if ($result3 = mysqli_query($conn,$sql3)){
                                        echo '<meta http-equiv="refresh" content="0;?a=successLoan" >';
                                    }else{
                                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                                    }
                                }else{
                                    echo "Error: " . "<br>" . mysqli_error($conn);
                                }
                            }else{
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                            }
                        }
                }elseif ($action == "successLoan") { ?>
                        <div class="display">
                            <p style="color: #008000;margin-bottom: 6px;">Success :)</p>
                            <p>Transaction ID is <span style="color: #8F1710; font-weight: bold;"><?php echo $_SESSION['transactionID']; ?></span></p><br>
                            <div class="button-class"><a href="dashboard.php"><button type="button" class="okay">Finish</button></a></div>
                        </div>            
                <?php }?>
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