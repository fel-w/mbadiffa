
<?php
    session_start();
    if(isset($_SESSION['login'])){
?>
    <!DOCTYPE HTML>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                <title>Dashboard</title>
                <link rel="stylesheet" type="text/css" href="css/main.css">
                <style>
                    body{
                        background: linear-gradient(to top left, #f3d3be 3%, #efc5a9 97%);
                    }
                    .container{
                        margin-top: 0;
                    }
                    .welcome{
                        background: linear-gradient(to bottom left, #f7e2d4 -385%, #ffffff 251%);
                        width: 100%;
                        height: 90px;
                        line-height: 2.5;
                        box-shadow: 0 1px 3px 1px rgba(0,0,0,0.16);
                        margin-top: 2%;
                        font-size: 35px;
                        text-align: center;
                    }
                    .dashboard-flex{
                        margin-top: 6%;
                    }
                    .flex-row-1,.flex-row-2{
                        display: flex;
                        margin: 60px 0;
                    }
                    .first{
                        margin-left: 3%;
                    }
                    .flex-item-row-1, .flex-item-row-2{
                        height: 100px;
                        border-radius: 8px;
                        width: 30%;
                        box-shadow: 0px 0px 2px 1px rgba(37, 37, 37, 0.39);
                        margin-right: 20px;
                        text-align: center;
                        line-height: 5;
                        text-decoration: none;
                        color: white;
                        font-size: 19px;
                        background: linear-gradient(to top right, #800000 5%, #f7b580 256%);
                        text-transform: uppercase;
                    }
                    a:hover{
                        background:#e2766a;
                    }
                    a:active{
                        background:linear-gradient(to top right, #800000 -55%, #f7b580 210%);
                    }
                    
                    @media screen and (max-width:924px){
                        .flex-item-row-1{
                            padding-top: 5%;
                            line-height: 1.3;
                        }
                    }
                    @media screen and (max-width:599px){
                        .flex-item-row-2{
                            padding-top: 7%;
                            line-height: 1.3;
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
                
                <!--Welcome Section-->
                
                
                <!--End of Welcome Section-->
                <div class="welcome">
                    <p>Hello <span style="color: #9D2C26;"><?php echo $_SESSION['username']; ?></span>,&nbsp; Welcome!</p>
                </div>
                <!--Body Container-->
                <div class="container">
                    <div class="dashboard-flex">
                        <div class="flex-row-1">
                            <a href="clientReg.php" class="first flex-item-row-1">
                                <div>Member Registration</div>
                            </a>
                                      
                            <a href="clientDep-Wdrw.php" class="flex-item-row-1">
                                <div>Deposits and Withdraws</div>
                            </a>
                        
                            <a href="clientLoan.php" class="flex-item-row-1">
                                <div>Loan Acquisation</div>
                            </a>
                        </div>
                        
                        
                        <div class="flex-row-2">
                            <a href="clientPayment.php" class="first flex-item-row-2">
                                <div>Loan Payment</div>
                            </a>
                            <a href="report.php" class="flex-item-row-2">
                                <div>Reports</div>
                            </a>
                            <a href="end.php" class="flex-item-row-2">
                                <div>Logout</div>
                            </a>
                        </div>
                    </div>
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