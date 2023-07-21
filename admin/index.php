<?php include('partials/nav.php'); ?>

	<!--===========================================================HOME SECTION START====================================================-->
	<section id="Home">

		<a name="Home">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER">Dashboard</div>

                    <?php
                        if(isset($_SESSION['login2'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['login2']; //displaying session message
                            unset($_SESSION['login2']); //removing session message
                        }
                    ?>

                    <div class="DASH_BOX">

                        <div class="COL_4">

                            <?php 
                                //Sql Query 
                                $sql = "SELECT * FROM property";
                                //Execute Query
                                $res = mysqli_query($conn, $sql);
                                //Count Rows
                                $count = mysqli_num_rows($res);
                            ?>

                            <p class="NUM">
                                <?php echo $count; ?>
                            </p>
                            
                            <p class="TXT">Properties</p>
                        </div>

                        <div class="COL_4">

                            <?php 
                                //Sql Query 
                                $sql1 = "SELECT * FROM property WHERE blog='Yes'";
                                //Execute Query
                                $res1 = mysqli_query($conn, $sql1);
                                //Count Rows
                                $count1 = mysqli_num_rows($res1);
                            ?>

                            <p class="NUM">
                                <?php echo $count1; ?>
                            </p>
                            
                            <p class="TXT">Blogs</p>
                        </div>

                        <div class="COL_4">

                            <?php 
                                //Sql Query 
                                $sql4 = "SELECT * FROM reviews";
                                //Execute Query
                                $res4 = mysqli_query($conn, $sql4);
                                //Count Rows
                                $count4 = mysqli_num_rows($res4);
                            ?>

                            <p class="NUM">
                                <?php echo $count4; ?>
                            </p>
                            
                            <p class="TXT">Reviews</p>
                        </div>

                        <div class="COL_4">

                            <?php 
                                //Sql Query 
                                $sql2 = "SELECT * FROM orders";
                                //Execute Query
                                $res2 = mysqli_query($conn, $sql2);
                                //Count Rows
                                $count2 = mysqli_num_rows($res2);
                            ?>

                            <p class="NUM">
                                <?php echo $count2; ?>
                            </p>
                            
                            <p class="TXT">Orders</p>
                        </div>

                        <div class="COL_4">

                            <?php 
                                //Sql Query 
                                $sql3 = "SELECT SUM(propertyPrice) AS Total FROM orders WHERE status='Bought'";
                                //Execute Query
                                $res3 = mysqli_query($conn, $sql3);

                                //Get the VAlue
                                $row3 = mysqli_fetch_assoc($res3);
                                
                                //GEt the Total REvenue
                                $total_revenue = $row3['Total'];
                            ?>

                            <p class="NUM">
                                Ksh.<?php echo $total_revenue; ?>
                            </p>
                            
                            <p class="TXT">Revenue Generated</p>
                        </div>

                    </div>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================HOME SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>