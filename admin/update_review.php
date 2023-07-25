<?php include('partials/nav.php'); ?>

	<!--===========================================================UPDATE REVIEW SECTION START====================================================-->
	<section id="update_review">

		<a name="update_review">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER2">Update Review</div>

                    <?php
                        if(isset($_SESSION['update'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['update']; //displaying session message
                            unset($_SESSION['update']); //removing session message
                        }
                    ?>

                    <?php

                        //check whether the id is set or not
                        if(isset($_GET['id']))
                        {
                            //get id and all other details
                            $id = $_GET['id'];

                            //sql query to get all other details
                            $sql2 = "SELECT * FROM reviews WHERE id=$id";

                            //execute query
                            $res2 = mysqli_query($conn, $sql2);

                            //count the rows to check whether the id is valid or not
                            $count2 = mysqli_num_rows($res2);

                            if($count2==1)
                            {
                                $row2 = mysqli_fetch_assoc($res2);
                                //get all the data
                                $id=$row2['id'];
                                $property_id=$row2['property_id'];
                                $username=$row2['username'];
                                $profileName=$row2['profileName'];
                                $review=$row2['review'];
                                $active=$row2['active'];
                            }
                            else
                            {
                                //redirect to manage_review with session message
                                $_SESSION['review'] = "<div class='ERROR2'>No Review Found</div>";
                                header('location:'.SITEURL_ADMIN.'manage_review.php');
                                ob_end_flush();
                            }
                        }
                        else
                        {
                            //redirect to manage_review
                            header('location:'.SITEURL_ADMIN.'manage_review.php');
                            ob_end_flush();
                        }

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="form_center">

                        <div class="TBL">

                            <div class="TBL_BOX">

                                <table class="TBL_30">
                                    
                                    <tr>
                                        <td class="w_44">Username :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="username" value="<?php echo $username ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Property Id :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="property_id" value="<?php echo $property_id ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                                <td class="w_44">Profile :</td>
                                                <td>

                                                    <?php

                                                        //check whether image is availabele or not
                                                        if($profileName!="")
                                                        {
                                                            //display image
                                                            ?>

                                                            <img src="../images/user/profileName/<?php echo $profileName ?>" class="PROP_IMG">

                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            //display message
                                                            echo "<div class='ERROR'>Image Not updated</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Active :</td>
                                        <td>
                                            <div class="RADIO_BOX">
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($active=='Yes'){echo "checked";} ?> name="active" value="Yes">
                                                    <p>Yes</p>
                                                </div>
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($active=='No'){echo "checked";} ?> name="active" value="No">
                                                    <p>No</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                </table>

                                <table class="TBL_30">
                                    
                                    <tr >
                                        <td>Review :</td>
                                    </tr>
                                    
                                    <tr >
                                        <td>
                                            <textarea type="text" class="INPUT w_80" name="review" id="" cols="30" rows="10"><?php echo $review ?></textarea>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="ROW">

                            <table class="TBL_30">
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" value="Update Review" class="btn BTN_SEC">
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                    </form>

                    

                    <?php 

                        //Process the Value from Form and Save in Database

                        //Check whether the Submit button is clicked or not

                        if(isset($_POST['submit']))
                        {
                            //Button Clicked

                            //1. Get the data from Form
                            $review = $_POST['review'];
                            $active = $_POST['active'];


                            //3. SQL Query to Save the data into database
                            //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
                            $sql = "UPDATE reviews SET
                                review = '$review',
                                active = '$active'
                                WHERE id=$id
                            ";

                            //4. Executing query and inserting data into database
                            $res = mysqli_query($conn, $sql);

                            //5. Check whether the (query is executed) data is inserted or not and display approriate message
                            if($res==TRUE)
                                {
                                    //Review updateed
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='SUCCESS2'>Review Updated Successfully</div>";
                                    //redirect to Manage Admin Page
                                    header('location:'.SITEURL_ADMIN.'manage_review.php');
                                    ob_end_flush();
                                }
                            else
                                {
                                    //failed to update Review
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='ERROR2'>Failed to Update Review</div>";
                                    //redirect to Manage Admin Page
                                    header('location:'.SITEURL_ADMIN.'manage_review.php');
                                    ob_end_flush();
                                }

                        }

                    ?>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================UPDATE REVIEW SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>