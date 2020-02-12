<?php
    session_start();
    if(isset($_SESSION['login'])){
?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Client Registration</title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <script src="js/password.js"></script>
            
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
                }
                .teller {
                    font-size: 30px;
                    font-family: Comic Sans MS;
                    color: #8A0F0B;
                }
                table{
                    width: 70%;
                    margin: auto;
                }
                
                td,th {
                    padding: 10px;
                }
                input[type="text"], input[type="date"], input[type="email"]{    
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
                    width: 20%;
                    border-radius: 4px;
                    font-weight: bold;
                    letter-spacing: 1px;
                    margin-top: 10px;
                    margin-left: 12%;
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
                <li><div class="current-section">Client Registration</div></li>
                <li><a href="end.php" class="nav-buttons logout">Logout</a></li>
                
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <!--Sign Up Form-->
                <form action="memberAccount.php" method="post">                
                    <div class="fieldset">
                        <p class="teller">Member Sign Up </p>
                        <hr>
                        <table border="0">
                            <tr>
                                <td>
                                    <label class="label" >First Name</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="fname" size="20" >
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label">Other names</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="othernames" size="40">
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">Mobile Number</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="phone" size="20">
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">E-mail</label>
                                </td>
                                
                                <td>
                                    <input type="email" name="email" size="20" >
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">Date of birth</label>
                                </td>
                                
                                <td>
                                    <input type="date" required name="dob">
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">Religion</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="religion" size="20" >
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">Gender</label>
                                </td>
                                
                                <td>
                                    Male <input type="radio" class="spacing" required name="gender" value="Male">   Female <input type="radio" name="gender" value="Female">
                                </td>
                            </tr>
                                
                                
                            <tr>
                                <td>
                                    <label class="label">Residence </label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="residence" size="20" >
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
                   
                <!--End of Sign Up Form-->
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