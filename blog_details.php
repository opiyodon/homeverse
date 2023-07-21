<?php include('partials/nav.php'); ?>

<!--===========================================================SELECTED PROPERTY SECTION START====================================================-->
<section id="Selected_Property">


    <div class="SELECTED_PROPERTY">

        <div class="ROW">
            <div>
                <p class="SECTION_TITLE">Selected</p>
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

        <?php
            if(isset($_SESSION['add'])) //checking wether session message is set or not
            {
                echo $_SESSION['add']; //displaying session message
                unset($_SESSION['add']); //removing session message
            }

            if(isset($_SESSION['upload'])) //checking wether session message is set or not
            {
                echo $_SESSION['upload']; //displaying session message
                unset($_SESSION['upload']); //removing session message
            }
        ?>

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
                                $type=$rows['type'];
                                $status=$rows['status'];
                                $city=$rows['city'];
                                $backgroundName=$rows['backgroundName'];
                                $pictureName=$rows['pictureName'];
                                $pictureName2=$rows['pictureName2'];
                                $oldPrice=$rows['oldPrice'];
                                $discount=$rows['discount'];
                                $price=$rows['price'];
                                $discountPercent=$rows['discountPercent'];
                                $bedrooms=$rows['bedrooms'];
                                $bathrooms=$rows['bathrooms'];
                                $squareFt=$rows['squareFt'];
                                $description=$rows['description'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];
                                $owner=$rows['owner'];
                                $phone=$rows['phone'];
                                $whatsapp=$rows['whatsapp'];
                                $email=$rows['email'];

                                //displaying the values in our table
                                ?>

                                    <div class="PROPERTY_CARD_BOX">
                                        <div class="PROPERTY_CARD">

                                            <div class="PROPERTY_CARD_ROW">

                                                <div class="ROW1">

                                                    <div class="BACKGROUND_IMAGE">
                                                        <div id="B_cad" class="B_cad" name="B_cad">
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

                                                    <ul class="PICTURES">

                                                        <li class="S_cad ///// active_s_cad">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($backgroundName!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img id="S_img1" src="images/property/background/<?php echo $backgroundName ?>">

                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    //display message
                                                                    echo "<div class='ERROR'>Image Not Added</div>";
                                                                }

                                                            ?>
                                                            
                                                        </li>

                                                        <li class="S_cad ///// ">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($pictureName!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img id="S_img2" src="images/property/picture/<?php echo $pictureName ?>">

                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    //display message
                                                                    echo "<div class='ERROR'>Image Not Added</div>";
                                                                }

                                                            ?>

                                                        </li>

                                                        <li class="S_cad ///// ">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($pictureName2!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img id="S_img3" src="images/property/picture/<?php echo $pictureName2 ?>">

                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    //display message
                                                                    echo "<div class='ERROR'>Image Not Added</div>";
                                                                }

                                                            ?>

                                                        </li>

                                                    </ul>

                                                </div>

                                                <div class="ROW2">

                                                    <div class="ROW2_NAME">
                                                        <p><?php echo $name; ?> | <?php echo $description; ?></p>
                                                    </div>

                                                    <div class="ROW2_PRICE">
                                                        <div class="PRICE_BOX">
                                                            <p>Price : </p>
                                                            <p>Ksh.<?php echo $price; ?></p>
                                                            <span><p>Ksh.<?php echo $oldPrice ; ?></p> </span>
                                                            <div class="BUBBLE">
                                                                <div class="BUBBLE_ITEM">
                                                                    <p><?php echo $discountPercent ?>%<br>off</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="ROW3_DETAILS">
                                                        <div class="SECTION_TITLE_2">Owner Details</div>
                                                        <div class="ROW3_TXT">
                                                            <p>Owner : </p>
                                                            <p class="ROW3_TXT_P"><?php echo $owner; ?></p>
                                                        </div>
                                                        <div class="ROW3_TXT">
                                                            <p>Phone : </p>
                                                            <p><a href="" class="ROW3_TXT_P"><?php echo $phone; ?></a></p>
                                                        </div>
                                                        <div class="ROW3_TXT">
                                                            <p>Whatsapp : </p>
                                                            <p><a href="" class="ROW3_TXT_P"><?php echo $whatsapp; ?></a></p>
                                                        </div>
                                                        <div class="ROW3_TXT">
                                                            <p>Email : </p>
                                                            <p><a href="" class="ROW3_TXT_P"><?php echo $email; ?></a></p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="BTN_ROW">
                                                <a href="<?php echo SITEURL_USER; ?>selected_property.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>" class="btn2">View Property</a>
                                            </div>
                                            
                                        </div>
                                    </div>

                                <?php

                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td>
                                    <div class="ERROR">We do not have such data in our database!</div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
  
        </div>
        
    </div>


</section>
<!--===========================================================SELECTED PROPERTY SECTION END====================================================-->

<?php include('partials/footer.php'); ?>