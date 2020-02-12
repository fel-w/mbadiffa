<?php
    session_start();
    if(isset($_SESSION['login'])){
?>
    <!--PHP for the form-->
    <?php
        $connect = mysqli_connect("localhost","root","","saccos");
        //Checking the connection can also use if (mysqli_connect_errno())
        if (!$connect){
            die("Connection failed: " .mysqli_connect_error());
        }
        
        //Function to check all input and refine and secure it(strip unnecessary characters, remove backslashes and encrypt html symbols)
        function refine_input($data){
            $data = trim($data); //strip unnecessary characters like spaces, newlines and tabs
            $data = stripslashes($data); //remove backslashes 
            $data = htmlspecialchars($data); //encrypt html symbols
            return $data;
        }
        
        //Variables to pick form values initialized
        $dos = $residence = $gender = $religion = $dob = $email = $contact = $othernames = $firstname = "";
        IF ($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = refine_input($_POST["fname"]);
            $othernames = refine_input($_POST["othernames"]);
            $contact = refine_input($_POST["phone"]);
            $email = refine_input($_POST["email"]);
            $dob = refine_input($_POST["dob"]);
            $religion = refine_input($_POST["religion"]);
            $gender = refine_input($_POST["gender"]);
            $residence = refine_input($_POST["residence"]);
        }
                
        //Selecting the authorizing staff's details
        $username = $_SESSION['username']; //Assigning the value contained in $_SESSION['username'] to $username which is usable in the query
        $password = $_SESSION['password']; //Same as above
        
        $sql = "SELECT First_Name,Staff_ID FROM staff WHERE Staff_ID ='$username' and Password = '$password' or User_Name ='$username' and Password = '$password'";
        
        if($result = mysqli_query($connect,$sql)){
            
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
        $resultArray = mysqli_fetch_assoc($result); /*resultArray stores the fetched array*/
        $staffname = $resultArray["First_Name"];
        $staffid = $resultArray["Staff_ID"];
        
        //Inserting current Client Details into database
        if (mysqli_query($connect, "INSERT INTO all_clients (First_Name,Other_Names,Telephone,Email,Date_of_birth,Religion,Gender,Residence,Date_Added,Staff_No,Staff_Name) VALUES ('$firstname','$othernames','$contact','$email','$dob','$religion','$gender','$residence',NOW(),'$staffid','$staffname')")) {
            /*echo "Successful <br>";*/ //Successfully Adding the new record
             
            //Picking the User_No from the database
            $sql2 = "SELECT User_No FROM all_clients WHERE Other_Names = '$othernames' AND Telephone = '$contact' ";
            if ($result2 = mysqli_query($connect, $sql2)){
                /*echo "Successful Selection";*/    //No need to display this
            }else{
                echo "Error: " . $sql2 . "<br>" . mysyqli_error($connect);
            }
            $userNumberArray = mysqli_fetch_assoc($result2); //userNumberArray stores fetched array
            $userNumber =  $userNumberArray["User_No"]; 
            
            //Updating the User_ID to a concatenation with the User_No
            $sql3 = "UPDATE all_clients SET User_ID = 'MBAM-$userNumber' WHERE User_No = '$userNumber' ";
            if (mysqli_query($connect,$sql3)){
    ?>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Finished</title>
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
                            <p style="color: #008000;margin-bottom: 6px;">Success :)</p>
                            <p>Client User ID is <span style="color: #8F1710; font-weight: bold;"><?php echo "MBAM-$userNumber"; ?></span></p><br>
                            <div class="button-class"><a href="dashboard.php"><button type="button" class="okay">Finish</button></a></div>
                        </div>
                    </div>
                </body>
            </html>        
                    
    <?php   }else{
                echo "Error: " . $sql3 . "<br>" . mysyqli_error($connect);
            }
            
            
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
        // Free assigned result sets
        mysqli_free_result($result);
        mysqli_free_result($result2);
        
        mysqli_close($connect);
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
?>