<?php include('partials/nav.php'); ?>

	<!--===========================================================MANAGE REVIEW SECTION START====================================================-->
	<section id="manage_review">

		<a name="manage_review">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER">Manage Review</div>

                    <?php
                        if(isset($_SESSION['delete'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['delete']; //displaying session message
                            unset($_SESSION['delete']); //removing session message
                        }

                        if(isset($_SESSION['update'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['update']; //displaying session message
                            unset($_SESSION['update']); //removing session message
                        }

                        if(isset($_SESSION['review'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['review']; //displaying session message
                            unset($_SESSION['review']); //removing session message
                        }
                    ?>

                    <table class="TBL_FULL">
                        <tr>
                            <th class="TH">S.N.</th>
                            <th class="TH">Username</th>
                            <th class="TH">Profile</th>
                            <th class="TH">Property Id</th>
                            <th class="TH">Active</th>
                            <th class="TH">Review</th>
                            <th class="TH text_left">Actions</th>
                        </tr>

                        <?php
                            //query to get all admin
                            $sql = "SELECT * FROM reviews ORDER BY id DESC";
                            //execute the query
                            $res = mysqli_query($conn, $sql);

                            //check whether the query is executed or not
                            if($res==TRUE)
                            {
                                //Count rows to check whether we have data in database or not
                                $count = mysqli_num_rows($res);//function to get all rows in the database

                                $sn=1;//create a variable and assign the value

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
                                        $property_id=$rows['property_id'];
                                        $username=$rows['username'];
                                        $profileName=$rows['profileName'];
                                        $review=$rows['review'];
                                        $active=$rows['active'];

                                        //displaying the values in our table
                                        ?>

                                            <tr>
                                                <td class="text_center"><?php echo $sn++ ?>.</td>
                                                <td class="text_center"><?php echo $username ?></td>

                                                <td class="text_center">

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
                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>
                                                
                                                <td class="text_center"><?php echo $property_id ?></td>
                                                <td class="text_center"><?php echo $active ?></td>
                                                <td class="text_center"><?php echo $review ?></td>
                                                <td>
                                                    <div class="ACTION_BOX">
                                                        <a href="<?php echo SITEURL_ADMIN; ?>update_review.php?id=<?php echo $id; ?>">
                                                            <p class="btn2 BTN_SEC">Update Review</p>
                                                        </a>
                                                        <a href="<?php echo SITEURL_ADMIN; ?>delete_review.php?id=<?php echo $id; ?>&profileName=<?php echo $profileName; ?>">
                                                            <p class="btn2 BTN_DAN">Delete Review</p>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php

                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="ERROR">We Do Not Have Data in Database.</div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>

                    </table>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================MANAGE REVIEW SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>