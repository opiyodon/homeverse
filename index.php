<?php include('partials/nav.php'); ?>

	<!--===========================================================HOME SECTION START====================================================-->
	<section id="Home">

		<a name="Home">

			<div class="HOME">
						
				<div class="submit">
					<a href="<?php echo SITEURL_USER; ?>add_property.php" class="btn btn-submit">Submit Property</a>
				</div>

                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['profile']))
                    {
                        echo $_SESSION['profile'];
                        unset($_SESSION['profile']);
                    }

                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>
			
				<div class="home-text">

                    <div>
                        <p class="TXT1">Let Us</p>
                        <p class="TXT2">Guide You Home</p>
                    </div>

                    <div>
    
                        <form action="<?php echo SITEURL_USER; ?>property_search.php" method="POST" class="SEARCH-FORM">
                            <div class="SEARCH_GROUP">

                                <div class="BACK">
                                    <p class="text-primary">Search Property By Type</p>
                                </div>

                                <select required name="type" id="type" class="SEARCH_CONTROL bg-light_bg_bright2">

                                    <option disabled selected value="Select_Type">-- Select Type --</option>

                                    <?php
                                        //query to get all admin
                                        $sql3 = "SELECT DISTINCT type FROM property ORDER BY id DESC";
                                        //execute the query
                                        $res3 = mysqli_query($conn, $sql3);

                                        //check whether the query is executed or not
                                        if($res3==TRUE)
                                        {
                                            //Count rows to check whether we have data in database or not
                                            $count3 = mysqli_num_rows($res3);//function to get all rows in the database

                                            //check the num of rows
                                            if($count3>0)
                                            {
                                                //we have data in database
                                                while($rows3=mysqli_fetch_assoc($res3))
                                                {
                                                    //using while loop to get all the data from database
                                                    //and while loop will run as long as theres data in database

                                                    //get individual data
                                                    $type=$rows3['type'];

                                                    //displaying the values in our table
                                                    ?>

                                                        <option><?php echo $type ?></option>

                                                    <?php

                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <option><div class="ERROR">We Do Not Have Data in Database.</div></option>
                                                <?php
                                            }
                                        }
                                    ?>

                                </select>

                                <div class="SEARCH_BUTTON py-5">
                                    <input type="submit" name="submit" class="btn" value="Search Property">
                                </div>

                            </div>

                        </form>
                        
                    </div>

                </div>
				
			</div>
		</a>

	</section>
	<!--===========================================================HOME SECTION END====================================================-->

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
                Featured Listings
            </p>
        </div>

        <a href="<?php echo SITEURL_USER; ?>property.php">
            <div class="MORE">
                <div>
                    <button class="btn">All Listings</button>
                </div>
            </div>
        </a>

        <div class="CARD_BOX2">


                <?php
                    //query to get all admin
                    $sql = "SELECT * FROM property WHERE featured='Yes' ORDER BY id DESC LIMIT 3";
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

<!--===========================================================BLOG SECTION START====================================================-->
<section id="Blog">

<a name="Blog">
<div class="BLOG">

    <div class="ROW">
        <div>
            <p class="SECTION_TITLE">News & Blogs</p>
        </div>
    </div>

    <div class="BLOG_TITLE">
        <p>
            Latest News Feeds
        </p>
    </div>

    <a href="<?php echo SITEURL_USER; ?>blog.php">
        <div class="MORE">
            <div>
                <button class="btn">All News Feeds</button>
            </div>
        </div>
    </a>

    <div class="CARD_BOX2">

                <?php
                    //query to get all admin
                    $sql2 = "SELECT * FROM property WHERE blog='Yes' AND featured_blog='Yes' ORDER BY id DESC LIMIT 3";
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
                                $id=$rows2['id'];
                                $type=$rows2['type'];
                                $backgroundName=$rows2['backgroundName'];
                                $comment=$rows2['comment'];
                                $dates=$rows2['dates'];
                                $featured_blog=$rows2['featured_blog'];
                                $active_blog=$rows2['active_blog'];

                                //displaying the values in our table
                                ?>

                                    <a href="<?php echo SITEURL_USER; ?>blog_details.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>">

                                        <div class="cadz">
                                            <div class="CARD_IMG">
                                                <img src="images/property/background/<?php echo $backgroundName; ?>" alt="<?php echo $backgroundName; ?>">
                                            </div>

                                            <div class="CARD_TXT CARD_TXT2">

                                                <div class="ROW">
                                                    <div class="TEXT">
                            
                                                        <p class="HOV_RED">Admin</p>
                                                    
                                                        <div>
                                                                    
                                                            <i class="fa-solid fa-user-lock CITY_ICON_ITEM"></i>                              

                                                        </div>
                            
                                                    </div>

                                                    <div class="TEXT">
                                                    
                                                        <div>
                                                                    
                                                            <i class="fa-solid fa-city CITY_ICON_ITEM"></i>                              
                            
                                                        </div>
                            
                                                        <p class="HOV_RED"><?php echo $type ?></p>
                            
                                                    </div>
                                                </div>

                                                <div class="HOUSE">
                                                    <p class="HOV_RED"><?php echo $comment ?></p>
                                                </div>

                                                <div class="ROW">
                                                    <div class="TEXT">
                                                    
                                                        <div>
                                                                    
                                                            <i class="fa-solid fa-calendar-days CITY_ICON_ITEM"></i>                              
                            
                                                        </div>
                            
                                                        <p class="HOV_RED"><?php echo $dates ?></p>
                            
                                                    </div>

                                                        <div class="TEXT">
                                                    
                                                            <p class="RED PRI">READ MORE</p>
                                
                                                        </div>
                                                </div>

                                            </div>

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
                                    <div class="ERROR">No Blog has been added yet.</div>
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
<!--===========================================================BLOG SECTION END====================================================-->
    
<?php include('partials/footer.php'); ?>