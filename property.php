<?php include('partials/nav.php'); ?>

<!--===========================================================PROPERTY SECTION START====================================================-->
<section id="Property">

<a name="Property">
    <div class="PROPERTY">

        <div class="ROW">
            <div>
                <p class="SECTION_TITLE">Properties</p>
            </div>
        </div>

        <div class="PROPERTY_TITLE">
            <p>
                All Listings
            </p>
        </div>

        <?php
            if(isset($_SESSION['order'])) //checking wether session message is set or not
            {
                echo $_SESSION['order']; //displaying session message
                unset($_SESSION['order']); //removing session message
            }

            if(isset($_SESSION['add'])) //checking wether session message is set or not
            {
                echo $_SESSION['add']; //displaying session message
                unset($_SESSION['add']); //removing session message
            }
        ?>

        <a class="HIDE" href="<?php echo SITEURL_USER; ?>property.php">
            <div class="MORE">
                <div>
                    <button class="btn">All Listings</button>
                </div>
            </div>
        </a>

        <div class="CARD_BOX2">


                <?php
                    //query to get all admin
                    $sql = "SELECT * FROM property WHERE active='Yes' ORDER BY id DESC";
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
                                $type=$rows['type'];
                                $status=$rows['status'];
                                $city=$rows['city'];
                                $backgroundName=$rows['backgroundName'];
                                $pictureName=$rows['pictureName'];
                                $price=$rows['price'];
                                $bedrooms=$rows['bedrooms'];
                                $bathrooms=$rows['bathrooms'];
                                $squareFt=$rows['squareFt'];
                                $description=$rows['description'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];
                                $duration=$rows['duration'];

                                //displaying the values in our table
                                ?>

                                    <a href="<?php echo SITEURL_USER; ?>selected_property.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>">

                                    <!-- ===============UPDATE CARD THEN DELETE ||| START============ -->
                                    <div class="cadz">
                                        <div class="CARD_IMG">
                                            <img src="images/property/background/<?php echo $backgroundName; ?>" alt="<?php echo $backgroundName; ?>">
                                                
                                                <div class="STATUS">
                                                    <?php 
                                                        // status

                                                        if($status=="For Rent")
                                                        {
                                                            echo "<div class='BADGE' style='background: var(--primary);'>$status</div>";
                                                        }
                                                        elseif($status=="For Sale")
                                                        {
                                                            echo "<div class='BADGE' style='background: var(--red);'>$status</div>";
                                                        }
                                                    ?>
                                                </div>
                                                
                                                <div class="CITY">
                                                    <div class="ROW">
                                                        <div class="CITY_ICON">
                                                            <div>
                                                                
                                                                <i class="fa-solid fa-city CITY_ICON_ITEM"></i>                              
                                        
                                                            </div>
                                                            <p><?php echo $city; ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="ROW">
                                                        <div></div>
                                                        <div class="CITY_ICON">
                                                            <p>2</p>
                                                            <div>
                                                                
                                                                <i class="fa-solid fa-image CITY_ICON_ITEM"></i>                              
                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="CARD_TXT">

                                            <div class="AMOUNT">
                                                <p class="PRICE">Ksh. <?php echo $price; ?></p>
                                                <p class="MONTH">
                                                    <?php 
                                                        // per month

                                                        if($status=="For Rent")
                                                        {
                                                            echo "<label style='color: red;'>$duration</label>";
                                                        }
                                                        else
                                                        {
                                                            echo "<label></label>";
                                                        }
                                                    ?>
                                                </p>
                                            </div>

                                            <div class="HOUSE">
                                                <p><?php echo $name; ?></p>
                                            </div>

                                            <div class="TEXT">
                                                <p><?php echo $description; ?></p>
                                            </div>

                                            <div class="ROW_TEXT">
                                                <div class="ROW_TEXT_ITEM">

                                                    <div class="CITY_ICON">

                                                        <p><?php echo $bedrooms; ?></p>

                                                        <div>
                                                            
                                                            <i class="fa-solid fa-bed CITY_ICON_ITEM"></i>                             
                        
                                                        </div>
                                            
                                                    </div>
                                                    <div>
                                                        <p>Bedrooms</p>
                                                    </div>
                                                </div>
                                                <div class="ROW_TEXT_ITEM">
                                                    <div class="CITY_ICON">

                                                        <p><?php echo $bathrooms; ?></p>

                                                        <div>
                                                            
                                                            <i class="fa-solid fa-bath CITY_ICON_ITEM"></i>                              
                        
                                                        </div>
                                            
                                                    </div>
                                                    <div>
                                                        <p>Bathrooms</p>
                                                    </div>
                                                </div>
                                                <div class="ROW_TEXT_ITEM">
                                                    <div class="CITY_ICON">

                                                        <p><?php echo $squareFt; ?></p>

                                                        <div>
                                                            
                                                            <i class="fa-solid fa-ruler-combined CITY_ICON_ITEM"></i>                             
                        
                                                        </div>
                                            
                                                    </div>
                                                    <div>
                                                        <p>Square Ft</p>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <!-- ===============UPDATE CARD THEN DELETE ||| END============ -->

                                        </div>

                                    </a>

                                <?php

                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td>
                                    <div class="ERROR">No Property has been listed yet.</div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>



            


            
        </div>
        
    </div>
</a>

</section>
<!--===========================================================PROPERTY SECTION END====================================================-->

<?php include('partials/footer.php'); ?>