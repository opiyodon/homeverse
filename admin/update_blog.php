<?php include('partials/nav.php'); ?>

	<!--===========================================================UPDATE BLOG SECTION START====================================================-->
	<section id="update_blog">

		<a name="update_blog">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER2">Update Blog</div>

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
                            $sql2 = "SELECT * FROM property WHERE id=$id";

                            //execute query
                            $res2 = mysqli_query($conn, $sql2);

                            //count the rows to check whether the id is valid or not
                            $count2 = mysqli_num_rows($res2);

                            if($count2==1)
                            {
                                $row2 = mysqli_fetch_assoc($res2);
                                //get all the data
                                $id=$row2['id'];
                                $name=$row2['name'];
                                $type=$row2['type'];
                                $backgroundName=$row2['backgroundName'];
                                $featured_blog=$row2['featured_blog'];
                                $active_blog=$row2['active_blog'];
                                $comment=$row2['comment'];
                                $date=$row2['date'];
                            }
                            else
                            {
                                //redirect to manage_blog with session message
                                $_SESSION['blog'] = "<div class='ERROR2'>No Blog Found</div>";
                                header('location:'.SITEURL_ADMIN.'manage_blog.php');
                                ob_end_flush();
                            }
                        }
                        else
                        {
                            //redirect to manage_blog
                            header('location:'.SITEURL_ADMIN.'manage_blog.php');
                            ob_end_flush();
                        }

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="form_center">

                        <div class="TBL">

                            <div class="TBL_BOX">

                                <table class="TBL_30">
                                    
                                    <tr>
                                        <td class="w_44">Name :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="name" value="<?php echo $name ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Type :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="type" value="<?php echo $type ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                                <td class="w_44">Background :</td>
                                                <td>

                                                    <?php

                                                        //check whether image is availabele or not
                                                        if($backgroundName!="")
                                                        {
                                                            //display image
                                                            ?>

                                                            <img src="../images/property/background/<?php echo $backgroundName ?>" class="PROP_IMG">

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
                                        <td class="w_44">Featured :</td>
                                        <td>
                                            <div class="RADIO_BOX">
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($featured_blog=='Yes'){echo "checked";} ?> name="featured_blog" value="Yes">
                                                    <p>Yes</p>
                                                </div>
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($featured_blog=='No'){echo "checked";} ?> name="featured_blog" value="No">
                                                    <p>No</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Date :</td>
                                        <td>
                                            <input type="date" class="INPUT" name="date" value="<?php echo $date ?>">
                                        </td>
                                    </tr>


                                </table>

                                <table class="TBL_30">
                                    
                                    <tr >
                                        <td>Comment :</td>
                                    </tr>
                                    
                                    <tr >
                                        <td>
                                            <textarea type="text" class="INPUT" name="comment" id="" cols="30" rows="10"><?php echo $comment ?></textarea>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="ROW">

                            <table class="TBL_30">
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" value="Update Blog" class="btn BTN_SEC">
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
                            $comment = $_POST['comment'];
                            $featured_blog = $_POST['featured_blog'];
                            $date = $_POST['date'];

                            //2. SQL Query to Save the data into database
                            //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
                            $sql = "UPDATE property SET
                                comment = '$comment',
                                featured_blog = '$featured_blog',
                                active_blog = 'Yes',
                                date = '$date',
                                blog = 'Yes'
                                WHERE id=$id
                            ";

                            //3. Executing query and inserting data into database
                            $res = mysqli_query($conn, $sql);

                            //5. Check whether the (query is executed) data is inserted or not and display approriate message
                            if($res==TRUE)
                                {
                                    //Blog updateed
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='SUCCESS2'>Blog Updated Successfully</div>";
                                    //redirect to Manage Admin Page
                                    header('location:'.SITEURL_ADMIN.'manage_blog.php');
                                    ob_end_flush();
                                }
                            else
                                {
                                    //failed to update Blog
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='ERROR2'>Failed to Update Blog</div>";
                                    //redirect to Manage Admin Page
                                    header('location:'.SITEURL_ADMIN.'manage_blog.php');
                                    ob_end_flush();
                                }

                        }

                    ?>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================UPDATE BLOG SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>