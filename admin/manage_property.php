<?php include('partials/nav.php'); ?>

	<!--===========================================================MANAGE PROPERTY SECTION START====================================================-->
	<section id="manage_property">

		<a name="manage_property">

            <div class="MAIN_CONTENT">

                <div class="ROW2">

                    <div class="HEADER">Manage Property</div>

                    <?php
                        if(isset($_SESSION['add'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['add']; //displaying session message
                            unset($_SESSION['add']); //removing session message
                        }

                        if(isset($_SESSION['remove'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['remove']; //displaying session message
                            unset($_SESSION['remove']); //removing session message
                        }

                        if(isset($_SESSION['remove2'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['remove2']; //displaying session message
                            unset($_SESSION['remove2']); //removing session message
                        }

                        if(isset($_SESSION['remove3'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['remove3']; //displaying session message
                            unset($_SESSION['remove3']); //removing session message
                        }
                        
                        if(isset($_SESSION['delete'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['delete']; //displaying session message
                            unset($_SESSION['delete']); //removing session message
                        }

                        if(isset($_SESSION['property'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['property']; //displaying session message
                            unset($_SESSION['property']); //removing session message
                        }

                        if(isset($_SESSION['update'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['update']; //displaying session message
                            unset($_SESSION['update']); //removing session message
                        }

                        if(isset($_SESSION['upload'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['upload']; //displaying session message
                            unset($_SESSION['upload']); //removing session message
                        }

                        if(isset($_SESSION['upload1'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['upload1']; //displaying session message
                            unset($_SESSION['upload1']); //removing session message
                        }

                        if(isset($_SESSION['upload2'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['upload2']; //displaying session message
                            unset($_SESSION['upload2']); //removing session message
                        }

                        if(isset($_SESSION['upload3'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['upload3']; //displaying session message
                            unset($_SESSION['upload3']); //removing session message
                        }
                    ?>

                    <table class="TBL_FULL">
                        <tr>
                            <th class="TH">S.N.</th>
                            <th class="TH">Name</th>
                            <th class="TH">Background</th>
                            <th class="TH">Featured</th>
                            <th class="TH">Active</th>
                            <th class="TH">Blog</th>
                            <th class="TH text_left">Actions</th>
                        </tr>

                        <?php
                            //query to get all admin
                            $sql = "SELECT * FROM property ORDER BY id DESC";
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
                                        $name=$rows['name'];
                                        $backgroundName=$rows['backgroundName'];
                                        $pictureName=$rows['pictureName'];
                                        $featured=$rows['featured'];
                                        $active=$rows['active'];
                                        $blog=$rows['blog'];

                                        //displaying the values in our table
                                        ?>

                                            <tr>
                                                <td class="text_center"><?php echo $sn++ ?>.</td>
                                                <td class="text_center"><?php echo $name ?></td>

                                                <td class="text_center">

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
                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>

                                                <td class="text_center"><?php echo $featured ?></td>
                                                <td class="text_center"><?php echo $active ?></td>
                                                <td class="text_center"><?php echo $blog ?></td>
                                                <td>
                                                    <div class="ACTION_BOX">
                                                        <a href="<?php echo SITEURL_ADMIN; ?>add_blog.php?id=<?php echo $id; ?>">
                                                            <p class="btn2 BTN_PRI">Add Blog</p>
                                                        </a>
                                                        <a href="<?php echo SITEURL_ADMIN; ?>update_property.php?id=<?php echo $id; ?>">
                                                            <p class="btn2 BTN_SEC">Update Property</p>
                                                        </a>
                                                        <a href="<?php echo SITEURL_ADMIN; ?>delete_property.php?id=<?php echo $id; ?>&backgroundName=<?php echo $backgroundName; ?>&pictureName=<?php echo $pictureName; ?>">
                                                            <p class="btn2 BTN_DAN">Delete Property</p>
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
	<!--===========================================================MANAGE PROPERTY SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>