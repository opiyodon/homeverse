<?php include('partials/nav.php'); ?>

	<!--===========================================================UPDATE ORDER SECTION START====================================================-->
	<section id="update_order">

		<a name="update_order">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER2">Update Order</div>

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
                            $sql2 = "SELECT * FROM orders WHERE id=$id";

                            //execute query
                            $res2 = mysqli_query($conn, $sql2);

                            //count the rows to check whether the id is valid or not
                            $count2 = mysqli_num_rows($res2);

                            if($count2==1)
                            {
                                $row2 = mysqli_fetch_assoc($res2);
                                //get all the data
                                $id=$row2['id'];
                                $propertyName=$row2['propertyName'];
                                $backgroundName=$row2['backgroundName'];
                                $propertyPrice=$row2['propertyPrice'];
                                $status=$row2['status'];
                                $full_name=$row2['full_name'];
                                $phone=$row2['phone'];
                                $email=$row2['email'];
                            }
                            else
                            {
                                //redirect to manage_order with session message
                                $_SESSION['order'] = "<div class='ERROR2'>No Order Found</div>";
                                header('location:'.SITEURL_ADMIN.'manage_order.php');
                                ob_end_flush();
                            }
                        }
                        else
                        {
                            //redirect to manage_order
                            header('location:'.SITEURL_ADMIN.'manage_order.php');
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
                                            <input type="text" class="INPUT" name="propertyName" value="<?php echo $propertyName ?>">
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
                                        <td class="w_44">Price :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="propertyPrice" value="<?php echo $propertyPrice ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Status :</td>
                                        <td>
                                            <select required class="INPUT2" name="status">
                                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>

                                                <option <?php if($status=="Bought"){echo "selected";} ?> value="Bought">Bought</option>

                                                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Tenant :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="full_name" value="<?php echo $full_name ?>">
                                        </td>
                                    </tr>


                                </table>

                                <table class="TBL_30">
                                    
                                    <tr>
                                        <td class="w_44">Phone :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="phone" value="<?php echo $phone ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="w_44">Email :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="email" value="<?php echo $email ?>">
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="ROW">

                            <table class="TBL_30">
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" value="Update Order" class="btn BTN_SEC">
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
                            $status = $_POST['status'];

                            //2. SQL Query to Save the data into database
                            //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
                            $sql = "UPDATE orders SET
                                status = '$status'
                                WHERE id=$id
                            ";

                            //3. Executing query and inserting data into database
                            $res = mysqli_query($conn, $sql);

                            //5. Check whether the (query is executed) data is inserted or not and display approriate message
                            if($res==TRUE)
                                {
                                    //Order updateed
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='SUCCESS2'>Order Updated Successfully</div>";
                                    //redirect to Manage Admin Page
                                    header('location:'.SITEURL_ADMIN.'manage_order.php');
                                    ob_end_flush();
                                }
                            else
                                {
                                    //failed to update Order
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='ERROR2'>Failed to Update Order</div>";
                                    //redirect to Manage Order Page
                                    header('location:'.SITEURL_ADMIN.'manage_order.php');
                                    ob_end_flush();
                                }

                        }

                    ?>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================UPDATE ORDER SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>