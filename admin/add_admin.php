<?php include('partials/nav.php'); ?>

	<!--===========================================================HOME SECTION START====================================================-->
	<section id="add_admin">

		<a name="add_admin">

            <div class="MAIN_CONTENT">

                <div class="ROW2">

                    <div class="HEADER2">Add Admin</div>

                    <?php
                        if(isset($_SESSION['add'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['add']; //displaying session message
                            unset($_SESSION['add']); //removing session message
                        }
                    ?>

                    <form action="" method="POST" class="form_center">

                        <div class="TBL">

                            <div class="TBL_BOX">

                                <table class="TBL_30">
                                    
                                    <tr>
                                        <td class="hide_it">Full Name</td>
                                        <td>
                                            <input type="text" class="INPUT" name="full_name" placeholder="Enter Full Name">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="hide_it">Username</td>
                                        <td>
                                            <input type="text" class="INPUT" name="username" placeholder="Enter Username">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="hide_it">Email</td>
                                        <td>
                                            <input type="text" class="INPUT" name="email" placeholder="Enter Email">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="hide_it">Phone</td>
                                        <td>
                                            <input type="text" class="INPUT" name="phone" placeholder="Enter Phone">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="hide_it">Password</td>
                                        <td>
                                            <input type="password" class="INPUT" name="password" placeholder="Enter Password">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" value="Add Admin" class="btn BTN_PRI">
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                    </form>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================HOME SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>

    <?php 

        //Process the Value from Form and Save in Database

        //Check whether the Submit button is clicked or not

        if(isset($_POST['submit']))
        {
            //Button Clicked

            //1. Get the data from Form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = md5($_POST['password']); //password encryption with md5

            //2. SQL Query to Save the data into database
            $sql = "INSERT INTO user SET
                full_name = '$full_name',
                username = '$username',
                userProfile = 'No-Profile.jpg',
                email = '$email',
                phone = '$phone',
                password = '$password',
                admin = 'Yes'
            ";

            //3. Executing query and inserting data into database
            $res = mysqli_query($conn, $sql);

            //4. Check whether the (query is executed) data is inserted or not and display approriate message
            if($res==TRUE)
                {
                    //Admin Added
                    //create session message variable to display message
                    $_SESSION['add'] = "<div class='SUCCESS2'>Admin Added Successfully</div>";
                    //redirect to Manage Admin Page
                    header('location:'.SITEURL_ADMIN.'manage_admin.php');
                    ob_end_flush();
                }
            else
                {
                    //failed to add Admin
                    //create session message variable to display message
                    $_SESSION['add'] = "<div class='ERROR2'>Failed to add Admin</div>";
                    //redirect to Manage Admin Page
                    header('location:'.SITEURL_ADMIN.'manage_admin.php');
                    ob_end_flush();
                }

        }

    ?>