<?php
    session_start();
    if(isset($_SESSION['login'])){
        $perform = @$_REQUEST['do'];
        if (empty($perform)){
            $perform = "report";
        }
?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <title>Reports</title>
            
            <style>
                .report-flex{
                    margin-top: 5%;
                }
                .flex-row-report-1,.flex-row-report-2{
                    display: flex;
                }
                .first{
                    margin-left: 4%;
                }
                .flex-item-report {
                    height: 320px;
                    border-radius: 4px;
                    width: 45%;
                    box-shadow: 0px 0px 2px 1px rgba(37, 37, 37, 0.39);
                    margin-right: 3%;
                    text-align: center;
                    line-height: 1.6;
                    text-decoration: none;
                    color: white;
                    font-size: 19px;
                    background: linear-gradient(to top right, #800000 5%, #f7b580 256%);
                    text-transform: uppercase;
                    margin-bottom: 5%;
                }
                .flex-row-report-1 a:hover,.flex-row-report-2 a:hover{
                    background:#e2766a;
                }
                .flex-row-report-1 a:active,.flex-row-report-2 a:active{
                    background:linear-gradient(to top right, #800000 -55%, #f7b580 210%);
                }
                .flex-item-report .init {
                    font-size: 120px;
                    line-height: 1.6;
                    margin: auto;
                    margin: 5% auto;
                }
                .flex-item-report p {
                    line-height: 1.5;
                    text-align: center;
                    font-size: 22px;
                }
                .count-box{
                    border:2px solid #8B110C;
                    padding: 20px;
                    border-radius: 6px;
                    background-color: #F3D3BE;
                    color: #8B110C;
                    font-size: 17px;
                    width: 90%;
                    margin: 2% auto;
                }
                .new-container{
                    background-color: white;
                    width: 100%;
                    overflow-x: auto;
                }
                table {
                    border-collapse: collapse;
                    width: 90%;
                    margin: auto;
                }
                tr:nth-child(odd){
                    background-color: #f2f2f2;
                }
                th{
                    background: #F3D3BE;
                    color: rgb(157, 44, 31);
                }
                
                th, td {
                    padding: 15px;
                    text-align: left;
                }
                @media screen and (max-width:799px){
                    .flex-row-report-1,.flex-row-report-2{
                        flex-direction: column;
                    }
                    .report-flex{
                        padding-left: 0;
                    }
                    .flex-item-report {
                        height: 100px;
                        width: 100%;
                        margin-right: 0%;
                        margin-bottom: 6%;
                        line-height: 1;
                    }
                    .first {
                         margin-left: 0; 
                   }
                    .flex-item-report .init {
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
                    
                    .flex-item-report p {
                        clear: right;
                        line-height: 5;
                        text-align: left;
                        text-indent: 10%;
                    }
                    .flex-item-report {
                        width: 100%;
                        height: 100px;
                    }
                    .flex-item-report p {
                        font-size: 20px;
                    }
                }
                @media screen and (max-width:536px){
                    .flex-item-report p {
                        font-size: 17px;
                        line-height: 1;
                        padding-top: 10%;
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
                <li><div class="current-section">Reports</div></li>
                <li><a href="end.php" class="nav-buttons logout">Logout</a></li>
                
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            <?php if ($perform == "report") { ?>
            <!--Body Container-->
            <div class="container">
                <div class="report-flex">
                    <div class="flex-row-report-1">
                        <a href="?do=allClients" class="first flex-item-report">
                            <div class="init">R</div>
                            <p>All Registered Clients</p>
                        </a>
                                  
                        <a href="?do=activeClients" class="flex-item-report">
                            <div class="init">A</div>
                            <p>Clients with Active Accounts</p>
                        </a>
                    </div>
                    <div class="flex-row-report-2">
                        <a href="?do=loanedClients" class="first flex-item-report">
                            <div class="init">L</div>
                            <p>Clients with Loans</p>
                        </a>
                        <a href="?do=transactions" class="flex-item-report">
                            <div class="init">T</div>
                            <p>All Transactions</p>
                        </a>
                    </div>
                </div>
            </div>
            <!--End of Body Container-->
            
            <?php }elseif ($perform == "allClients"){ ?>
                <div class="count-box">
                    <p>This table shows all members registered with the saccos.</p>
                </div>
                <div class="new-container">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Email</th> 
                            <th>Date of birth</th>
                            <th>Religion</th>
                            <th>Gender</th>
                            <th>Residence</th>
                            <th>Date Joined</th>
                            <th>Issued by</th>
                        </tr>
            <?php
                //Connection to database
                $connect = mysqli_connect("localhost","root","","saccos");
                
                //Conection Failure
                if(!$connect)
                    die("Connection Error: ".mysqli_connect_error());
                    
                //Picking all Users from database
                $sql_all = "SELECT * FROM all_clients";
                $query = mysqli_query($connect,$sql_all);
                while ($row = mysqli_fetch_assoc($query)){          
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td><?php echo $row['First_Name']." ".$row['Other_Names']; ?></td>
                            <td><?php echo $row['Telephone']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo $row['Date_of_birth']; ?></td>
                            <td><?php echo $row['Religion']; ?></td>
                            <td><?php echo $row['Gender']; ?></td>
                            <td><?php echo $row['Residence']; ?></td>
                            <td><?php echo $row['Date_Added']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                }
                mysqli_close($connect);
            ?>
                    </table>
                </div>
            
            <?php }elseif ($perform == "activeClients"){ ?>
            <div class="count-box">
                    <p>This table shows all members whose accounts have an active balance.</p>
                </div>
                <div class="new-container">
                    
            <?php
                //Connection to database
                $connect = mysqli_connect("localhost","root","","saccos");
                
                //Conection Failure
                if(!$connect)
                    die("Connection Error: ".mysqli_connect_error());
                
                //Picking Users whose accounts have usable balances from database
                $sql_active = "SELECT DISTINCT User_ID,First_Name,Other_Names,Telephone,Staff_Name,Staff_No FROM deposits WHERE Total_Amount > 10000";
                $query = mysqli_query($connect,$sql_active);
                if (mysqli_num_rows($query) >= 1){
            ?>
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Issued by</th>
                            <th>Current Balance</th>
                        </tr>
            <?php
                    while ($row = mysqli_fetch_assoc($query)){
                        //Getting an individual's ID
                        $currentID = $row['User_ID'];
                        
                        //Selecting the most recent transaction through the User Number
                        if($new_query = mysqli_query($connect,"SELECT MAX(User_No) AS User_No FROM deposits WHERE User_ID = '$currentID' ")){
                            $userArray = mysqli_fetch_assoc($new_query);
                            $currentNo = $userArray['User_No'];
                            
                            //Picking the corresponding Total amount
                            if($new_query = mysqli_query($connect,"SELECT Total_Amount FROM deposits WHERE User_No = '$currentNo' ")){
                                $userArray2 = mysqli_fetch_assoc($new_query);
                                $currentBal = $userArray2['Total_Amount'];
                            }else{
                                echo "There is another problem <br>".mysqli_error($connect);
                            }
                        }else{
                            echo "There is a problem <br>".mysqli_error($connect);
                        }
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td><?php echo $row['First_Name']." ".$row['Other_Names']; ?></td>
                            <td><?php echo $row['Telephone']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                            <td>shs. <?php echo $currentBal; ?></td>
                        </tr>
            <?php
                    }
                }else{
                    echo "<p class='count-box'>There is no active account</p>";
                }
                mysqli_close($connect);
            ?>
                    </table>
                </div>
            
            <?php }elseif ($perform == "loanedClients"){ ?>
                <div class="count-box">
                    <p>This table shows all members who applied for loans.</p>
                </div>
                <div class="new-container">
                    
            <?php
                //Connection to database
                $connect = mysqli_connect("localhost","root","","saccos");
                
                //Conection Failure
                if(!$connect)
                    die("Connection Error: ".mysqli_connect_error());
                
                //Picking Users whose accounts have loans from database
                $sql = "SELECT User_ID,First_Name,Other_Names,Telephone,Membership_in_Years,Amount,Amount_Cleared,Security,Date_Loaned,Transaction_ID,Staff_Name,Staff_No FROM loaned";
                $query = mysqli_query($connect,$sql);
                if (mysqli_num_rows($query) >= 1){
            ?>
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Membership(Years)</th>
                            <th>Amount Lended</th>
                            <th>Amount Cleared</th>
                            <th>Security</th>
                            <th>Date Loaned</th>
                            <th>Transaction ID</th>
                            <th>Issued by</th>
                        </tr>
            <?php
                    while ($row = mysqli_fetch_assoc($query)){
                        $amountLended = $row['Amount'] + $row['Amount_Cleared'];
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td><?php echo $row['First_Name']." ".$row['Other_Names']; ?></td>
                            <td><?php echo $row['Telephone']; ?></td>
                            <td><?php echo $row['Membership_in_Years']; ?></td>
                            <td>shs. <?php echo $amountLended ;?></td>
                            <td>shs. <?php echo $row['Amount_Cleared']; ?></td>
                            <td><?php echo $row['Security']; ?></td>
                            <td><?php echo $row['Date_Loaned']; ?></td>
                            <td><?php echo $row['Transaction_ID']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                    }
                }else{
                    echo "<p class='count-box'>There is no loaned client at the moment</p>";
                }
                mysqli_close($connect);
            ?>
                    </table>
                </div>
            
            <?php }elseif ($perform == "transactions"){ ?>
                <div class="count-box">
                    <p>This table shows all the transations made with the system.</p>
                </div>
                <div class="new-container">
                    
            <?php
                //Connection to database
                $connect = mysqli_connect("localhost","root","","saccos");
                
                //Conection Failure
                if(!$connect)
                    die("Connection Error: ".mysqli_connect_error());
                
                //Picking all records from transaction tables                
                $sql = "SELECT User_ID,Amount,Date_Deposited,Transaction_ID,Staff_No,Staff_Name FROM deposits"; 
                $sql2 = "SELECT User_ID,Withdraw_Amount,Withdraw_Date,Transaction_ID,Staff_No,Staff_Name FROM withdraws";
                $sql3 = "SELECT User_ID,Amount,Date_Loaned,Transaction_ID,Staff_No,Staff_Name FROM loaned"; 
                $sql4 = "SELECT User_ID,Amount_Cleared,Date_Cleared,Clearance_ID,Staff_No,Staff_Name FROM loan_payments";
                $query = mysqli_query($connect,$sql);
                $query2 = mysqli_query($connect,$sql2);
                $query3 = mysqli_query($connect,$sql3);
                $query4 = mysqli_query($connect,$sql4);
                if (mysqli_num_rows($query) >= 1 || mysqli_num_rows($query2) >= 1 || mysqli_num_rows($query3) >= 1 || mysqli_num_rows($query4) >= 1){
            ?>
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Nature of Transaction</th>
                            <th>Amount</th>
                            <th>Date Transacted</th>
                            <th>Transaction ID</th>
                            <th>Issued by</th>
                        </tr>
            <?php
                    while ($row = mysqli_fetch_assoc($query)){
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td>Deposit</td>
                            <td>shs. <?php echo $row['Amount']; ?></td>
                            <td><?php echo $row['Date_Deposited']; ?></td>
                            <td><?php echo $row['Transaction_ID']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                    }
                    while ($row = mysqli_fetch_assoc($query2)){
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td>Withdraw</td>
                            <td>shs. <?php echo $row['Withdraw_Amount']; ?></td>
                            <td><?php echo $row['Withdraw_Date']; ?></td>
                            <td><?php echo $row['Transaction_ID']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                    }
                    while ($row = mysqli_fetch_assoc($query3)){
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td>Loan</td>
                            <td>shs. <?php echo $row['Amount']; ?></td>
                            <td><?php echo $row['Date_Loaned']; ?></td>
                            <td><?php echo $row['Transaction_ID']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                    }
                    while ($row = mysqli_fetch_assoc($query3)){
            ?>
                        <tr>
                            <td><?php echo $row['User_ID']; ?></td>
                            <td>Loan Payment</td>
                            <td>shs. <?php echo $row['Amount_Cleared']; ?></td>
                            <td><?php echo $row['Date_Cleared']; ?></td>
                            <td><?php echo $row['Clearance_ID']; ?></td>
                            <td><?php echo $row['Staff_Name']." ".$row['Staff_No']; ?></td>
                        </tr>
            <?php
                    }
                }else{
                    echo "<p class='count-box'>There is no recorded transaction at the moment</p>";
                }
                mysqli_close($connect);
            ?>
                    </table>
                </div>
            <?php } ?>
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