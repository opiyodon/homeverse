<?php include('partials/nav.php'); ?>

<!--===========================================================ORDER PROPERTY SECTION START====================================================-->
<section id="Profile">
            <div class="PROFILE">

                <div class="ROW">
                    <div>
                        <p class="SECTION_TITLE">Profile</p>
                    </div>
                </div>

        <div class="CARD_BOX">


                <?php
                
                    $id=$_GET['id'];
                    //query to get all admin
                    $sql = "SELECT * FROM user WHERE id=$id";
                    //execute the query
                    $res = mysqli_query($conn, $sql);

                    //check whether the query is executed or not
                    if($res==TRUE)
                    {
                        //Count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res);//function to get all rows in the database

                        //check the num of rows
                        if($count>0)
                        {
                            //we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the data from database
                                //and while loop will run as long as theres data in database

                                //get individual data
                                $id=$rows['id'];
                                $username=$rows['username'];
                                $userProfile=$rows['userProfile'];
                                $email=$rows['email'];
                                $phone=$rows['phone'];
                                $password2=$rows['password'];

                                //displaying the values in our table
                                ?>

                                <div class="PROFILE_CARD_BOX">
                                        <div class="PROFILE_CARD">

                                            <form action="" method="POST" enctype="multipart/form-data" class="profileform">
                                                <fieldset>
                                                    <legend>User Profile</legend>

                                                    <div class="PROFILE_CARD_ROW">

                                                        <div class="PROFILE_ROW1">

                                                            <div class="BACKGROUND_IMAGE">
                                                                <div id="B_cad2" class="B_cad2" name="B_cad2">
                                                                    <?php

                                                                        //check whether image is availabele or not
                                                                        if($userProfile!="")
                                                                        {
                                                                            //display image
                                                                            ?>

                                                                            <img id="B_img" src="../images/user/userProfile/<?php echo $userProfile ?>">

                                                                            <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            //display message
                                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                                        }

                                                                    ?>
                                                                </div>
                                                            </div>

                                                            <div class="PROFILE_TXT">
                                                                <div class="profile_username">
                                                                    <p><?php echo $username; ?></p>
                                                                </div>
                                                                <div class="profile_email">
                                                                    <p><?php echo $email; ?></p>
                                                                </div>
                                                                <div class="profile_phone">
                                                                    <p>0<?php echo $phone; ?></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </fieldset>
                                                
                                                <fieldset>
                                                    <legend>User Details</legend>
                                                    <table class="PROFILE_ROW2">
                                    
                                                        <tr class=T_ROW2>
                                                            <td class="w_44 hide_it">New Password :</td>
                                                            <td>
                                                                <input type="password" class="INPUT w_50" name="password1" placeholder="Enter New Password">
                                                            </td>
                                                        </tr>

                                                        <tr class=T_ROW2>
                                                            <td class="w_44 hide_it">Confirm Password :</td>
                                                            <td>
                                                                <input type="password" class="INPUT w_50" name="password" placeholder="Confirm New Password">
                                                            </td>
                                                        </tr>

                                                    </table>

                                                    <table class="PROFILE_ROW2">
                                    
                                                        <tr class=T_ROW2>
                                                            <td class="w_44 hide_it">Change Profile :</td>
                                                            <td>
                                                                <input class="INPUT w_50" type="file" name="userProfile">
                                                            </td>
                                                        </tr>

                                                    </table>

                                                    <div class="BTN_ROW">
                                                        <input type="submit" name="submit" value="Update Profile" class="btn2 BTN_SEC">
                                                    </div>
                                                </fieldset>

                                            </form>

                                            <?php 
                                                        }
                                                    }
                                                }
                                            ?>

                                </div>
        
    </div>


</section>
<!--===========================================================ORDER PROPERTY SECTION END====================================================-->

<?php include('partials/footer.php'); ?>



<?php 

//Process the Value from Form and Save in Database

//Check whether the Submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button Clicked

    // check whether password is updated or not and update if there is a new password
    $newPassword = $_POST['password'];
    if ($newPassword != "") {
        $password = md5($newPassword); // password encryption with md5
    } else {
        // If no new password is provided, keep the existing password
        $password = $password2;
    }

            //2a. Upload images if selected
            //check whether Select Image is clicked or not and upload image only if selected
            if(isset($_FILES['userProfile']['name']))
            {
                //get the details of the selected image
                $image_name = $_FILES['userProfile']['name'];

                //check whether the image is selected or not and upload image only if selected
                if($image_name!="")
                {
                    //image is selected
                    //A.REname the image
                    //get the extension of selected image
                    $ext = end(explode('.', $image_name));

                    //create new name for image
                    $image_name = "User-Profile-".rand(0000,9999).".".$ext; //new image name may be "User-Profile-8462.jpg"

                    //B.UPload the image
                    //get the SRC path and Destination path

                    //Source path is the current location of image to be uploaded
                    $src = $_FILES['userProfile']['tmp_name'];

                    //Destination path is the location uploaded image will be stored
                    $dst = "../images/user/userProfile/".$image_name;

                    //finally upload the image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded or not
                    if($upload==false)
                    {
                        //failed to upload the image
                        //redirect to home page with error
                        $_SESSION['upload'] = "<div class='ERROR'>Failed to Upload Image</div>";
                        header('location:'.SITEURL_ADMIN.'index.php');
                        ob_end_flush();
                        //stop the process
                        die();
                    }
                }
                else
                {
                    $image_name = $userProfile; //setting default value
                }
            }

            //3. SQL Query to Save the data into database
            $sql2 = "UPDATE user SET
                userProfile = '$image_name',
                password = '$password'
                WHERE id=$id
            ";

    //4. Executing query and inserting data into database
    $res2 = mysqli_query($conn, $sql2);

    //5. Check whether the (query is executed) data is inserted or not and display approriate message
    if($res2==TRUE)
        {
            //Property Submitted
            //create session message variable to display message
            $_SESSION['profile'] = "<div class='SUCCESS2'>Profile Updated Successfully</div>";
            //redirect to Manage Admin Page
            header('location:'.SITEURL_ADMIN.'index.php');
            ob_end_flush();
        }
    else
        {
            //failed to add Admin
            //create session message variable to display message
            $_SESSION['profile'] = "<div class='ERROR2'>Failed to Update Profile</div>";
            //redirect to Manage Admin Page
            header('location:'.SITEURL_ADMIN.'index.php');
            ob_end_flush();
        }
    }

?>