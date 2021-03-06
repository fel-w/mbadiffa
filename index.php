
<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Staff Login</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            
            <style>
                .label {
                    font-size: 20px;
                    margin-top: 0px;
                }
                .spacing{
                    margin-right: 10%;
                }
                .fieldset {
                    padding: 50px 0 30px 50px;
                    box-shadow: 0px 0px 3px 1px rgba(229, 181, 179, 1);
                    margin-bottom: 5px;
                    margin-top: 10%;
                }
                .teller {
                    font-size: 30px;
                    font-family: Comic Sans MS;
                    color: #8A0F0B;
                    text-align: center;
                }
                table{
                    width: 70%;
                    margin: auto;
                }
                
                td,th {
                    padding: 10px;
                }
                td.smaller {
                    width: 30%;
                }
                input[type="text"], input[type="date"], input[type="password"]{    
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
                    margin:3px 42px 23px 0;
                    border-color: rgba(140, 18, 13,0.5);
                    border-width: 2px;
                }
                .createStaff {
                    font-size: 18px;
                    color: #8F1710;
                }
                .createStaff:hover {
                    color: rgba(143,23,16,0.7);
                }
                .createStaff_column{
                    padding-top: 4%;
                }
            </style>
        </head>
        
        <body>
            <!--Header Section-->
            <div class="top-header">
                <h4>MBADIFA SACCO RECORDS MANAGEMENT SYSTEM</h4>    
            </div>
            <!--End of Header Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <!--Sign Up Form-->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="fieldset">
                        <p class="teller">Sign In</p>
                        <hr>
                        <table border="0">
                            <tr>
                                <td class="smaller">
                                    <label class="label" >Staff ID/Username</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="sID" size="20" >
                                </td>
                                
                            </tr>
                            
                            
                            <tr>
                                <td class="smaller">
                                    <label class="label">Password</label>
                                </td>
                                
                                <td>
                                    <input type="password" required name="password" size="20" >
                                </td>
                            </tr>
                                    
                            <tr>
                                <td class="createStaff_column">
                                    <a href="createStaff.php" class="createStaff">
                                        Create Staff Acount
                                    </a>
                                </td>
                                <td>
                                    <input type="submit" value="Confirm" name="submit">
                                </td>                               
                            </tr>
                        
                        <!--PHP to handle authentication from the database-->
                        <?php
                            $_SESSION['loading'] = $_SESSION['error'] = ""; /*Declaration of loading and error messages to be used incase of incorrect credentials*/
                            
                            //PHP executes after the submit button has been pressed
                            if(isset($_POST['submit'])){
                                
                                //Making a conection
                                $conn = mysqli_connect("localhost","root","","saccos");
                                
                                //Incase of connection error
                                if (!$conn)
                                    die("Connection Error: " .mysqli_connect_error());
                                    
                                //Variables to pick the form values
                                $_SESSION['username']  = $_SESSION['password'] = $login = $password = "";
                                $_SESSION['username'] = $login = $_POST['sID'];
                                $_SESSION['password'] = $password = md5($_POST['password']);
                                
                                //SQL query to pick a user following the entered credentials
                                $query = mysqli_query($conn, "SELECT * FROM staff WHERE User_Name = '$login' and Password = '$password' or Staff_ID = '$login' and Password = '$password'");
                                
                                //Counting the number of fetched rows from the database
                                $count=mysqli_num_rows($query);
                                if($count == 1){
                                    $_SESSION['login']=1;     /*Session Variable to be used through out a login is set*/
                                    $_SESSION['loading'] = "Loading...";
                                    echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
                                }else{
                                    $_SESSION['error']="Incorrect Username or Password!";
                                }
                            }
                        ?>
                        
                            <!--Error Message Display-->
                            <p style="font-size: 25px;text-align: center;color: #921A13;"><?php echo $_SESSION['error']; echo $_SESSION['loading'];?></p>
                        </table>
                    </div>  
                </form>
                
                <!--End of Sign Up Form-->
            </div>
            <!--End of Body Container-->
        </body>
        
    </html>
    