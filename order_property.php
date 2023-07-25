<?php include('partials/nav.php'); ?>

<!--===========================================================ORDER PROPERTY SECTION START====================================================-->
<section id="Selected_Property">


    <div class="SELECTED_PROPERTY">

        <div class="ROW">
            <div>
                <p class="SECTION_TITLE">Order</p>
            </div>
        </div>

        <div class="SELECTED_PROPERTY_TITLE">
            <?php

                //get property name
                $name=$_GET['name'];
                //display property name in result
                ?>
                    <p>
                        You Selected <span class="text-primary">"<?php echo $name ?>"</span>
                    </p>
                <?php
                
            ?>
        </div>

        <div class="CARD_BOX">


                <?php
                
                    $id=$_GET['id'];
                    //query to get all admin
                    $sql = "SELECT * FROM property WHERE id=$id";
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
                                $name=$rows['name'];
                                $backgroundName=$rows['backgroundName'];
                                $price=$rows['price'];
                                $description=$rows['description'];

                                //displaying the values in our table
                                ?>

                                    <div class="ORDER_CARD_BOX">
                                        <div class="ORDER_CARD">

                                            <form action="" method="POST" enctype="multipart/form-data" class="ordeform">
                                                <fieldset>
                                                    <legend>Selected Property</legend>

                                                    <div class="ORDER_CARD_ROW">

                                                        <div class="ORDER_ROW1">

                                                            <div class="BACKGROUND_IMAGE">
                                                                <div id="B_cad2" class="B_cad2" name="B_cad2">
                                                                    <?php

                                                                        //check whether image is availabele or not
                                                                        if($backgroundName!="")
                                                                        {
                                                                            //display image
                                                                            ?>

                                                                            <img id="B_img" src="images/property/background/<?php echo $backgroundName ?>">

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

                                                            <div class="ORDER_TXT">
                                                                <div class="order_name">
                                                                    <p><?php echo $name; ?></p>
                                                                </div>
                                                                <div class="order_price">
                                                                    <p class="PRICE">Ksh. <?php echo $price; ?></p>
                                                                    <p class="MONTH">/Month</p>
                                                                </div>
                                                                <div class="order_description">
                                                                    <p><?php echo $description; ?></p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </fieldset>
                                                
                                                <fieldset>
                                                    <legend>Order Details</legend>
                                                    <table class="TBL_30">
                                    
                                                        <tr class="T_ROW">
                                                            <td class="w_44 hide_it">Full Name :</td>
                                                            <td>
                                                                <input type="text" class="INPUT" name="full_name" placeholder="Enter Full Name">
                                                            </td>
                                                        </tr>

                                                        <tr class="T_ROW">
                                                            <td class="w_44 hide_it">Phone :</td>
                                                            <td>
                                                                <input type="number" class="INPUT" name="phone" placeholder="Enter Phone Number">
                                                            </td>
                                                        </tr>

                                                        <tr class="T_ROW">
                                                            <td class="w_44 hide_it">Email :</td>
                                                            <td>
                                                                <input type="email" class="INPUT" name="email" placeholder="Enter Your Email">
                                                            </td>
                                                        </tr>

                                                    </table>

                                                    <div class="BTN_ROW">
                                                        <input type="submit" name="submit" value="Confirm Order" class="btn2">
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

    //1. Get the data from Form
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //get property id
    //$p_id=$_GET['id'];
    //$backgroundName=$_GET['backgroundName'];
    //$name=$_GET['name'];
    //$price=$_GET['price'];
    
    //2. SQL Query to Save the data into database
    //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
    $sql2 = "INSERT INTO orders SET
        backgroundName = '$backgroundName',
        propertyName = '$name',
        propertyPrice = '$price',
        status = 'Ordered',
        full_name = '$full_name',
        phone = $phone,
        email = '$email'
    ";

    //4. Executing query and inserting data into database
    $res2 = mysqli_query($conn, $sql2);

    //5. Check whether the (query is executed) data is inserted or not and display approriate message
    if($res2==TRUE)
        {
            //Property Submitted
            //create session message variable to display message
            $_SESSION['order'] = "<div class='SUCCESS'>Order Confirmed Successfully</div>";
            //redirect to Manage Admin Page
            header('location:'.SITEURL_USER.'property.php');
            ob_end_flush();
        }
    else
        {
            //failed to add Admin
            //create session message variable to display message
            $_SESSION['order'] = "<div class='ERROR'>Failed to Confirm Order</div>";
            //redirect to Manage Admin Page
            header('location:'.SITEURL_USER.'property.php');
            ob_end_flush();
        }
    }

?>