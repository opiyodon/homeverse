<?php include('partials/nav.php'); ?>

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
            All News Feeds
        </p>
    </div>

    <a class="HIDE" href="<?php echo SITEURL_USER; ?>blog.php">
        <div class="MORE">
            <div>
                <button class="btn">All News Feeds</button>
            </div>
        </div>
    </a>

    <div class="CARD_BOX">

                <?php
                    //query to get all admin
                    $sql2 = "SELECT * FROM property WHERE blog='Yes' ORDER BY id DESC";
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
                                $name=$rows2['name'];
                                $type=$rows2['type'];
                                $backgroundName=$rows2['backgroundName'];
                                $comment=$rows2['comment'];
                                $date=$rows2['date'];
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