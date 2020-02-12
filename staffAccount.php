<?php
    session_start();
?>
    <!--PHP for the form-->
    <?php
        $connect = mysqli_connect("localhost","root","","saccos");
        //Checking the connection
        if (!$connect){
            die("Connection failed: " .mysqli_connect_error());
        }
        
        //Variables to pick form values initialized
        $username = $password = $gender = $othernames = $firstname = "";
        IF ($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = refine_input($_POST["fname"]);
            $othernames = refine_input($_POST["onames"]);
            $gender = refine_input($_POST["gender"]);
            $password = md5(refine_input($_POST["password"]));
            $username = refine_input($_POST["username"]);
        }
        
        //Function to check all input and refine and secure it(strip unnecessary characters, remove backslashes and encrypt html symbols)
        function refine_input($data){
            $data = trim($data); //strip unnecessary characters like spaces, newlines and tabs
            $data = stripslashes($data); //remove backslashes 
            $data = htmlspecialchars($data); //encrypt html symbols
            return $data;
        }
        
        $sql = "INSERT INTO staff (First_Name,Other_Names,Gender,Password,User_Name) VALUES ('$firstname', '$othernames', '$gender', '$password', '$username')";
        
        if (mysqli_query($connect, $sql)) {
            /*echo "Successful <br>";*/ //Successfully Adding the new record
            
            //Picking the Staff_No from the database
            $sql2 = "SELECT Staff_No FROM staff WHERE Password = '$password' AND Other_Names = '$othernames'";
            if ($result = mysqli_query($connect, $sql2)){
                /*echo "Successful Selection";*/    //No need to display this
            }else{
                echo "Error: " . $sql2 . "<br>" . mysyqli_error($connect);
            }
            $staffNumberArray = mysqli_fetch_array($result); //staffNumberArray stores fetched array
            $staffNumber =  $staffNumberArray['0']; //staffNumber picks the first value which is the only value
            
            //Updating the Staff ID to a concatenation with the Staff_No
            $sql3 = "UPDATE staff SET Staff_ID = 'MBAS-$staffNumber' WHERE  Staff_No = '$staffNumber' ";
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
                            padding: 32px 0 50px 50px;
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
                            <p style="color: #008000;">Success :)</p><br>
                            <p>Your Staff ID is <span style="color: #8F1710; font-weight: bold;"><?php echo "MBAS-$staffNumber"; ?></span></p><br>
                            <p>Take Note of it before the page reloads!</p>
                        </div>
                        <?php header("refresh:5;url=index.php"); ?>
                    </div>
                </body>
            </html>        
                    
    <?php   }else{
                echo "Error: " . $sql3 . "<br>" . mysyqli_error($connect);
            }
            
            
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
        // Free result set
        mysqli_free_result($result);

        mysqli_close($connect);
    ?>
    <?php
        session_destroy();
    ?>