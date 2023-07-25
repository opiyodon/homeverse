<?php include('partials/nav.php'); ?>

	<!--===========================================================MANAGE ORDER SECTION START====================================================-->
	<section id="manage_order">

		<a name="manage_order">

            <div class="MAIN_CONTENT">

                <div class="ROW2">

                    <div class="HEADER">Manage Order</div>

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
                        
                        if(isset($_SESSION['delete'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['delete']; //displaying session message
                            unset($_SESSION['delete']); //removing session message
                        }

                        if(isset($_SESSION['order'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['order']; //displaying session message
                            unset($_SESSION['order']); //removing session message
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
                    ?>

                    <table class="TBL_FULL">
                        <tr>
                            <th class="TH">S.N.</th>
                            <th class="TH">Name</th>
                            <th class="TH">Background</th>
                            <th class="TH">Price</th>
                            <th class="TH">Status</th>
                            <th class="TH">Tenant</th>
                            <th class="TH">Phone</th>
                            <th class="TH">Email</th>
                            <th class="TH text_left">Actions</th>
                        </tr>

                        <?php
                            //query to get all admin
                            $sql = "SELECT * FROM orders ORDER BY id DESC";
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
                                        $propertyName=$rows['propertyName'];
                                        $backgroundName=$rows['backgroundName'];
                                        $propertyPrice=$rows['propertyPrice'];
                                        $status=$rows['status'];
                                        $full_name=$rows['full_name'];
                                        $phone=$rows['phone'];
                                        $email=$rows['email'];

                                        //displaying the values in our table
                                        ?>

                                            <tr>
                                                <td class="text_center"><?php echo $sn++ ?>.</td>
                                                <td class="text_center"><?php echo $propertyName ?></td>

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

                                                <td class="text_center">Ksh.<?php echo $propertyPrice ?></td>
                                                <td class="text_center">
                                                    <?php 
                                                        // Ordered, Bought, Cancelled

                                                        if($status=="Ordered")
                                                        {
                                                            echo "<label style='color: orange;'>$status</label>";
                                                        }
                                                        elseif($status=="Bought")
                                                        {
                                                            echo "<label style='color: var(--primary);'>$status</label>";
                                                        }
                                                        elseif($status=="Cancelled")
                                                        {
                                                            echo "<label style='color: red;'>$status</label>";
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text_center"><?php echo $full_name ?></td>
                                                <td class="text_center"><?php echo $phone ?></td>
                                                <td class="text_center"><?php echo $email ?></td>
                                                <td>
                                                    <div class="ACTION_BOX">
                                                        <a href="<?php echo SITEURL_ADMIN; ?>update_order.php?id=<?php echo $id; ?>">
                                                            <p class="btn2 BTN_SEC">Update Order</p>
                                                        </a>
                                                        <a href="<?php echo SITEURL_ADMIN; ?>delete_order.php?id=<?php echo $id; ?>">
                                                            <p class="btn2 BTN_DAN">Delete Order</p>
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
	<!--===========================================================MANAGE ORDER SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>