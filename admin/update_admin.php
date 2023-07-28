<?php include('partials/nav.php'); ?>

	<!--===========================================================UPDATE ADMIN SECTION START====================================================-->
	<section id="update_admin">

		<a name="update_admin">

            <div class="MAIN_CONTENT">

                <div class="ROW2">

                    <div class="HEADER2">Update Admin</div>

                    <?php
                        if(isset($_SESSION['update'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['update']; //displaying session message
                            unset($_SESSION['update']); //removing session message
                        }
                    ?>

                    <?php

                        //1. Get the ID of selected Admin
                        $id=$_GET['id'];

                        //2. Create sql query to get the details
                        $sql="SELECT * FROM user WHERE id=$id";

                        //3.Execute query
                        $res=mysqli_query($conn, $sql);

                        //check whether the query is executed or not
                        if($res==TRUE)
                        {
                            //check whether data is available or not
                            $count = mysqli_num_rows($res);
                            //check whether we have admin data or not
                            if($count==1)
                            {
                                //get the details
                                $row=mysqli_fetch_assoc($res);

                                $full_name=$row['full_name'];
                                $username=$row['username'];
                                $email=$row['email'];
                                $phone=$row['phone'];
                                $admin=$row['admin'];
                            }
                            else
                            {
                                //redirect to manage admin page
                                header('location:'.SITEURL_ADMIN.'manage_admin.php');
                                ob_end_flush();
                            }
                        }

                    ?>

                    <form action="" method="POST" class="form_center">

                        <table class="TBL_30">
                                                        
                            <tr>
                                <td class="hide_it">Full Name</td>
                                <td>
                                    <input type="text" class="INPUT" name="full_name" value="<?php echo $full_name; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="hide_it">Username</td>
                                <td>
                                    <input type="text" class="INPUT" name="username" value="<?php echo $username; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="hide_it">Email</td>
                                <td>
                                    <input type="text" class="INPUT" name="email" value="<?php echo $email; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="hide_it">Phone</td>
                                <td>
                                    <input type="text" class="INPUT" name="phone" value="0<?php echo $phone; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td class="hide_it">Admin</td>
                                <td>
                                    <p class="hide2">Admin :</p>
                                    <div class="RADIO_BOX">
                                        <div class="RADIO_BOX_ITEM">
                                            <input type="radio" <?php if($admin=='Yes'){echo "checked";} ?> name="admin" value="Yes">
                                            <p>Yes</p>
                                        </div>
                                        <div class="RADIO_BOX_ITEM">
                                            <input type="radio" <?php if($admin=='No'){echo "checked";} ?> name="admin" value="No">
                                            <p>No</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Update Admin" class="btn BTN_SEC">
                                </td>
                            </tr>

                        </table>

                    </form>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================UPDATE ADMIN SECTION END====================================================-->
	
	<?php

        //check whether button is clicked or not
        if(isset($_POST['submit']))
        {
            //get all values from form and save in database
            $id=$_POST['id'];
            $full_name=$_POST['full_name'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $admin=$_POST['admin'];

            //create sql to update admin
            $sql = "UPDATE user SET
            username='$username',
            email='$email',
            phone='$phone',
            admin='$admin'
            WHERE id='$id'
            ";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //check whether query is executed successfully or not
            if($res==true)
            {
                //query executed and admin updated
                $_SESSION['update'] = "<div class='SUCCESS2'>Admin Updated Successfully</div>";
                //redirect to Manage Admin Page
                header('location:'.SITEURL_ADMIN.'manage_admin.php');
                ob_end_flush();
            }
            else
            {
                //Failed to update Admin
                $_SESSION['update'] = "<div class='ERROR2'>Failed to Update Admin</div>";
                //redirect to Manage Admin Page
                header('location:'.SITEURL_ADMIN.'manage_admin.php');
                ob_end_flush();
            }
        }

    ?>
    
    
<?php include('partials/footer.php'); ?>