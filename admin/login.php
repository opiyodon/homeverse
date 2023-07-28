<?php include('../config/constants.php'); ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Homeverse - Admin
        </title>
        <link  href="../images/bg5.jpg"  type="image/x-icon" rel="icon">
        <link  href="css2/style2.css"  type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    
    <body>
        
    <div class="login">
            
            
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="MyLoginForm">

                <?php 
                    if(isset($_SESSION['login2']))
                    {
                        echo $_SESSION['login2'];
                        unset($_SESSION['login2']);
                    }

                    if(isset($_SESSION['no-login-message2']))
                    {
                        echo $_SESSION['no-login-message2'];
                        unset($_SESSION['no-login-message2']);
                    }

                    if(isset($_SESSION['update'])) //checking wether session message is set or not
                    {
                        echo $_SESSION['update']; //displaying session message
                        unset($_SESSION['update']); //removing session message
                    }
                ?>
            
                <h1>Login</h1>
    
                <div>
                    <input required class="INPUT" type="text" name="username" placeholder="Enter Username...">
                </div>
                
                <div>
                    <input required class="INPUT" type="password" name="password" placeholder="Enter Password...">
                </div>
                
                <div class="BTN_BOX2">
                    <input type="submit" name="submit" value="Login" class="btn BTN_PRI">
                </div>
                
                <div>
                    <a class="LOGIN_LINK_ITEM" href="<?php echo SITEURL_ADMIN; ?>forgot_password.php">
                        Forgot password?
                    </a>
                </div>

            </form>
            <!-- Login Form Ends HEre -->
        

    </div>



        <!--===========================================================JS FILES====================================================-->

        <script src="https://kit.fontawesome.com/2820328d2c.js" crossorigin="anonymous"></script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!--=========================MAIN JS=========================-->

        <script src="../js/script.js"></script>

        <!--=========================MAIN JS=========================-->

        <!--=========================EMAIL JS=========================-->

        <script src="../js/email.js" data-cfasync="false" type="text/javascript"></script>

        <!--=========================EMAIL JS=========================-->




    </body>
</html>

<?php
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process data from Login form
        //1. Get the data from login form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //2. SQL to check whether the user with that username and password exist
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' AND admin='Yes'";
                                        
    

        //3. Execute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // User available and login successful
            $row = mysqli_fetch_assoc($res);
            $user_id2 = $row['id'];
            $_SESSION['login2'] = "<div class='SUCCESSBOX2'><div class='SUCCESS2'>Welcome back $username.</div></div>";
            $_SESSION['user2'] = $username; // To check whether the user is logged in or not and logout unsets it
            $_SESSION['user_id2'] = $user_id2; // Store the user_id in the session

            //redirect to Manage Admin Page
            header('location:'.SITEURL_ADMIN.'index.php');
            ob_end_flush();
        }
        else
        {
            //failed to Delete Admin
            $_SESSION['login2'] = "<div class='ERROR'>Username and Password<br>did not match</div>";
            //redirect to Manage Admin Page
            header('location:'.SITEURL_ADMIN.'login.php');
            ob_end_flush();
        }
    }
?>