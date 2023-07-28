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

                                                    <div class="RATINGS">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="RATING_STAR">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="RATING_STAR">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="RATING_STAR">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="RATING_STAR">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg>

                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="RATING_STAR">
                                                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                                            </svg>


                                                            <p>5.0</p>
                                                            <p>|</p>
                                                            <?php
                                                                //get property id
                                                                $p_id=$_GET['id'];
                                                                
                                                                //query to get all admin
                                                                $sql1 = "SELECT * FROM reviews WHERE property_id=$p_id AND active='Yes' ORDER BY id DESC";
                                                                //execute the query
                                                                $res1 = mysqli_query($conn, $sql1);

                                                                //check whether the query is executed or not
                                                                if($res1==TRUE)
                                                                {
                                                                    //Count rows to check whether we have data in database or not
                                                                    $count1 = mysqli_num_rows($res1);//function to get all rows in the database

                                                                    //check the num of rows
                                                                    if($count1>0)
                                                                    {
                                                                        //we have data in database

                                                                            //displaying the values in our card
                                                                            ?>

                                                                                <p>Reviews(<?php echo $count1 ?>)</p>

                                                                            <?php

                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                            <p>Reviews(0)</p>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>

                                                    </div>

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

                                            <section id="Reviews">
                                                
                                                    <div>
                                                        <div class="SECTION_TITLE_2">Reviews</div>
                                                    </div>
                                                    <div class="MORE">
                                                        <div>
                                                            <button class="R_TOGGLER btn2">View All</button>
                                                        </div>
                                                    </div>

                                                    <div class="R_CONTAINER ////// ">

                                                    <?php
                                                        //get property id
                                                        $p_id=$_GET['id'];
                                                        
                                                        //query to get all admin
                                                        $sql2 = "SELECT reviews.*, user.userProfile 
                                                            FROM reviews 
                                                            INNER JOIN user ON reviews.username = user.username 
                                                            WHERE reviews.property_id=$p_id AND reviews.active='Yes'
                                                            ORDER BY reviews.id DESC";
                                                        //execute the query
                                                        $res2 = mysqli_query($conn, $sql2);

                                                        //check whether the query is executed or not
                                                        if($res2==TRUE)
                                                        {
                                                            //Count rows to check whether we have data in database or not
                                                            $count2 = mysqli_num_rows($res2);//function to get all rows in the database

                                                            $sn=1;//create a variable and assign the value

                                                            //check the num of rows
                                                            if($count2>0)
                                                            {
                                                                //we have data in database
                                                                while($rows2=mysqli_fetch_assoc($res2))
                                                                {
                                                                    //using while loop to get all the data from database
                                                                    //and while loop will run as long as theres data in database

                                                                    //get individual data
                                                                    $username=$rows2['username'];
                                                                    $review=$rows2['review'];
                                                                    $active=$rows2['active'];
                                                                    $userProfile = $rows2['userProfile'];

                                                                    //displaying the values in our card
                                                                    ?>

                                                                        <div class="REVIEW_CARD">
                                                                            <div class="REVIEW_CARD_ITEM">

                                                                                <div class="REVIEW_ROW">

                                                                                    <div class="PIC w-10">
                                                                                        <?php

                                                                                            //check whether image is availabele or not
                                                                                            if($userProfile!="")
                                                                                            {
                                                                                                //display image
                                                                                                ?>

                                                                                                    <img src="images/user/userProfile/<?php echo $userProfile ?>" alt="<?php echo $userProfile ?>">

                                                                                                <?php
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                //display message
                                                                                                echo "<div class='ERROR'>Image Not Added</div>";
                                                                                            }

                                                                                        ?>
                                                                                    </div>
                                                                                    
                                                                                    <div class="NAME">
                                                                                        <p><?php echo $username ?></p>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="REVIEW_TXT">
                                                                                    <p><?php echo $review ?></p>
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
                                                                        <div class="ERROR">No Review has been made on this property yet.</div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    ?>

                                                    </div>
                                                
                                            </section>

                                            <section id="Add_Review">
                                                
                                                    <div>
                                                        <div class="SECTION_TITLE_2">Add Review</div>
                                                    </div>
                                                    <div class="ADD_REVIEW">
                                                        <form action="" method="POST" enctype="multipart/form-data" class="ADD_REVIEW_FORM">

                                                            <table class="ADD_REVIEW_TABLE">
                                                                
                                                                <tr class="REVIEW_TABLE_ITEMS">
                                                                    <td class="w_44">Username :</td>
                                                                    <td>
                                                                        <input type="text" class="INPUT2 w_50" name="username" placeholder="Enter Your Username">
                                                                    </td>
                                                                </tr>

                                                                <tr class="REVIEW_TABLE_ITEMS">
                                                                    <td class="w_44">Review :</td>
                                                                    <td>
                                                                        <textarea type="text" class="INPUT2 w_50" name="review" placeholder="Enter Your Review Here..."></textarea>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <input type="submit" name="submit" value="Add Review" class="btn2">
                                                                    </td>
                                                                </tr>

                                                            </table>

                                                        </form>

                                                        <?php 

                                                            //Process the Value from Form and Save in Database

                                                            //Check whether the Submit button is clicked or not

                                                            if(isset($_POST['submit']))
                                                            {
                                                                //Button Clicked

                                                                //1. Get the data from Form
                                                                $username = $_POST['username'];
                                                                $review = $_POST['review'];
                                                                
                                                                //3. SQL Query to Save the data into database
                                                                //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
                                                                $sql3 = "INSERT INTO reviews SET
                                                                    property_id = '$p_id',
                                                                    username = '$username',
                                                                    review = '$review',
                                                                    active = 'Yes'
                                                                ";

                                                                //4. Executing query and inserting data into database
                                                                $res3 = mysqli_query($conn, $sql3);

                                                                //5. Check whether the (query is executed) data is inserted or not and display approriate message
                                                                if($res3==TRUE)
                                                                    {
                                                                        //Review Submitted
                                                                        //create session message variable to display message
                                                                        $_SESSION['add'] = "<div class='SUCCESS'>Review Submitted Successfully</div>";
                                                                        //redirect to Manage Admin Page
                                                                        header('location:'.SITEURL_USER.'property.php');
                                                                        ob_end_flush();
                                                                    }
                                                                else
                                                                    {
                                                                        //failed to add Admin
                                                                        //create session message variable to display message
                                                                        $_SESSION['add'] = "<div class='ERROR'>Failed to Submit Review</div>";
                                                                        //redirect to Manage Admin Page
                                                                        header('location:'.SITEURL_USER.'property.php');
                                                                        ob_end_flush();
                                                                    }

                                                            }

                                                        ?>

                                                    </div>
                                                
                                            </section>

                                            <section id="Property_Description">
                                                
                                                    <div class="Property_Description_title">
                                                        <div class="SECTION_TITLE_2">Description</div>
                                                    </div>
                                                    <div class="Property_Description_txt">
                                                        <p>Type : <?php echo $type; ?></p>
                                                        <p> Status : <?php echo $status; ?></p>
                                                        <p> Location : <?php echo $city; ?></p>
                                                        <p> Description : <?php echo $description; ?></p>
                                                        <p> Old Price : Ksh.<?php echo $oldPrice; ?></p>
                                                        <p> Discount : Ksh.<?php echo $discount; ?></p>
                                                        <p> Percent : <?php echo $discountPercent; ?>%</p>
                                                        <p> Price : Ksh.<?php echo $price; ?></p>
                                                        <p> Bedrooms : <?php echo $bedrooms; ?></p>
                                                        <p> Bathrooms : <?php echo $bathrooms; ?></p>
                                                        <p> Square Ft : <?php echo $squareFt; ?> ft</p>
                                                    </div>
                                                
                                            </section>

                                            <section id="Images">
                                                
                                                    <div class="Images_title">
                                                        <div class="SECTION_TITLE_2">Images</div>
                                                    </div>
                                                    <div class="Images_txt"><!--============ custom this width to have nice view of photos ==========-->
                                                        <div class="pic_box">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($backgroundName!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img src="images/property/background/<?php echo $backgroundName ?>" class="pic_box_img">

                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    //display message
                                                                    echo "<div class='ERROR'>Image Not Added</div>";
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                        <div class="pic_box">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($pictureName!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img src="images/property/picture/<?php echo $pictureName ?>" class="pic_box_img">

                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    //display message
                                                                    echo "<div class='ERROR'>Image Not Added</div>";
                                                                }

                                                            ?>

                                                        </div>
                                                        <div class="pic_box">

                                                            <?php

                                                                //check whether image is availabele or not
                                                                if($pictureName2!="")
                                                                {
                                                                    //display image
                                                                    ?>

                                                                    <img src="images/property/picture/<?php echo $pictureName2 ?>" class="pic_box_img">

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
                                                
                                            </section>

                                            <div class="BTN_ROW">
                                                <a href="<?php echo SITEURL_USER; ?>order_property.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>" class="btn2">Order</a>
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