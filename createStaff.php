
<!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up Staff</title>
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
                }
                
                td,th {
                    padding: 10px;
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
                .current-section {
                    margin-left: 35%;
                }
                #passwordError{
                    color: #CB6A67;
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
                <li><div class="current-section">Staff Sign Up</div></li>
            </ul>
            <div class="clr"></div>
            <!--End of Navigation Section-->
            
            
            <!--Body Container-->
            <div class="container">
                <!--Sign Up Form-->    
                <form name="staffForm" action="staffAccount.php" method="post"  onsubmit="return formValidate();">
                    <div class="fieldset">
                        <p class="teller">Staff Sign Up </p>
                        <hr>
                        <table border="0">
                                                       
                            <tr>
                                <td>
                                    <label class="label" >First Name</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="fname" size="20" required>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label">Other names</label>
                                </td>
                                
                                <td>
                                    <input type="text" required name="onames" size="40" required>
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
                                    <label class="label">Password</label>
                                </td>
                                
                                <td>
                                    <input type="password" name="password" size="20" required>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label">Confirm Password</label>
                                </td>
                                
                                <td>
                                    <input type="password" name="passwordConfirm" size="20" onchange="passwordValidate();" required>
                                    <div id="passwordError"></div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label class="label">Username</label>
                                </td>
                                
                                <td>
                                    <input type="text" name="username" placeholder="Example: 'wfelix'" size="20" >
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
    