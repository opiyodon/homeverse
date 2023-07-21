<?php include('partials/nav.php'); ?>

	<!--============================================================HOME SECTION START====================================================-->
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

        <div class="CARD_BOX">


                <?php
                    //query to get all admin
                    $sql = "SELECT * FROM property WHERE featured='Yes' AND active='Yes' ORDER BY id DESC LIMIT 3";
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

                                //displaying the values in our table
                                ?>

                                    <a href="<?php echo SITEURL_USER; ?>selected_property.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>">

                                    <!-- ===============UPDATE CARD THEN DELETE ||| START============ -->
                                    <div class="cadz">
                                        <div class="CARD_IMG">
                                            <img src="../images/property/background/<?php echo $backgroundName; ?>" alt="<?php echo $backgroundName; ?>">
                                                
                                                <div class="STATUS">
                                                    <div class="BADGE">
                                                        <p><?php echo $status; ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="CITY">
                                                    <div class="ROW">
                                                        <div class="CITY_ICON">
                                                            <div>
                                                                
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                                </svg>                              
                                        
                                                            </div>
                                                            <p><?php echo $city; ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="ROW">
                                                        <div></div>
                                                        <div class="CITY_ICON">
                                                            <div>
                                                                
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                                </svg>                              
                                        
                                                            </div>
                                                            <p>2</p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="CARD_TXT">

                                            <div class="AMOUNT">
                                                <p class="PRICE">Ksh. <?php echo $price; ?></p>
                                                <p class="MONTH">/Month</p>
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
                                                            
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                        
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
                                                            
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                        
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
                                                            
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                        
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

    <div class="CARD_BOX">

                <?php
                    //query to get all admin
                    $sql2 = "SELECT * FROM property WHERE blog='Yes' ORDER BY id DESC LIMIT 3";
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
                                $date=$rows2['date'];
                                $featured_blog=$rows2['featured_blog'];
                                $active_blog=$rows2['active_blog'];

                                //displaying the values in our table
                                ?>

                                    <a href="<?php echo SITEURL_USER; ?>blog_details.php?id=<?php echo $id; ?>">

                                        <div class="cadz">
                                            <div class="CARD_IMG">
                                                <img src="../images/property/background/<?php echo $backgroundName; ?>" alt="<?php echo $backgroundName; ?>">
                                            </div>

                                            <div class="CARD_TXT CARD_TXT2">

                                                <div class="ROW">
                                                    <div class="TEXT">
                                                    
                                                        <div>
                                                                    
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                            
                                                        </div>
                            
                                                        <p class="HOV_RED">By: Admin</p>
                            
                                                    </div>

                                                    <div class="TEXT">
                                                    
                                                        <div>
                                                                    
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                            
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
                                                                    
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="CITY_ICON_ITEM">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                            </svg>                              
                            
                                                        </div>
                            
                                                        <p class="HOV_RED"><?php echo $date ?></p>
                            
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