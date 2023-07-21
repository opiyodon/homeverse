<?php include('partials/nav.php'); ?>

	<!--===========================================================UPDATE PROPERTY SECTION START====================================================-->
	<section id="update_property">

		<a name="update_property">

            <div class="MAIN_CONTENT">

                <div class="ROW">

                    <div class="HEADER2">Update Property</div>

                    <?php
                        if(isset($_SESSION['add'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['add']; //displaying session message
                            unset($_SESSION['add']); //removing session message
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

                        if(isset($_SESSION['upload3'])) //checking wether session message is set or not
                        {
                            echo $_SESSION['upload3']; //displaying session message
                            unset($_SESSION['upload3']); //removing session message
                        }
                    ?>

                    <?php

                        //check whether the id is set or not
                        if(isset($_GET['id']))
                        {
                            //get id and all other details
                            $id = $_GET['id'];

                            //sql query to get all other details
                            $sql2 = "SELECT * FROM property WHERE id=$id";

                            //execute query
                            $res2 = mysqli_query($conn, $sql2);

                            //count the rows to check whether the id is valid or not
                            $count2 = mysqli_num_rows($res2);

                            if($count2==1)
                            {
                                $row2 = mysqli_fetch_assoc($res2);
                                //get all the data
                                $name = $row2['name'];
                                $type = $row2['type'];
                                $status = $row2['status'];
                                $city = $row2['city'];
                                $backgroundName = $row2['backgroundName'];
                                $pictureName = $row2['pictureName'];
                                $pictureName2 = $row2['pictureName2'];
                                $oldPrice = $row2['oldPrice'];
                                $discount = $row2['discount'];
                                $bedrooms = $row2['bedrooms'];
                                $bathrooms = $row2['bathrooms'];
                                $squareFt = $row2['squareFt'];
                                $description = $row2['description'];
                                $featured = $row2['featured'];
                                $active = $row2['active'];
                                $blog = $row2['blog'];
                                $owner = $row2['owner'];
                                $phone = $row2['phone'];
                                $whatsapp = $row2['whatsapp'];
                                $email = $row2['email'];
                            }
                            else
                            {
                                //redirect to manage_property with session message
                                $_SESSION['property'] = "<div class='ERROR2'>No Property Found</div>";
                                header('location:'.SITEURL_ADMIN.'manage_property.php');
                                ob_end_flush();
                            }
                        }
                        else
                        {
                            //redirect to manage_property
                            header('location:'.SITEURL_ADMIN.'manage_property.php');
                            ob_end_flush();
                        }

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="ADD_P_FORM">

                        <div class="ROW">

                            <div class="ROW_BOX">

                                <table class="TBL_30">
                                    
                                    <tr class="T_ROW">
                                        <td class="w_442">Name :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="name" value="<?php echo $name ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Type :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="type" value="<?php echo $type ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Status :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="status" value="<?php echo $status ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">City :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="city" value="<?php echo $city ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Current Background :</td>
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
                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Select New Background :</td>
                                        <td>
                                            <input type="file" class="INPUT w-80" name="backgroundName">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Current Picture 1 :</td>
                                                <td>

                                                    <?php

                                                        //check whether image is availabele or not
                                                        if($pictureName!="")
                                                        {
                                                            //display image
                                                            ?>

                                                            <img src="../images/property/picture/<?php echo $pictureName ?>" class="PROP_IMG">

                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            //display message
                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Select New Picture 1 :</td>
                                        <td>
                                            <input type="file" class="INPUT w-80" name="pictureName">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Current Picture 2 :</td>
                                                <td>

                                                    <?php

                                                        //check whether image is availabele or not
                                                        if($pictureName2!="")
                                                        {
                                                            //display image
                                                            ?>

                                                            <img src="../images/property/picture/<?php echo $pictureName2 ?>" class="PROP_IMG">

                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            //display message
                                                            echo "<div class='ERROR'>Image Not Added</div>";
                                                        }
                                                    
                                                    ?>
                                                    
                                                </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Select New Picture 2 :</td>
                                        <td>
                                            <input type="file" class="INPUT w-80" name="pictureName2">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Old Price :</td>
                                        <td>
                                            <input type="number" class="INPUT" name="oldPrice" value="<?php echo $oldPrice ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Discount :</td>
                                        <td>
                                            <input type="number" class="INPUT" name="discount" value="<?php echo $discount ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Bedrooms :</td>
                                        <td>
                                            <input type="number" class="INPUT w-80" name="bedrooms" value="<?php echo $bedrooms ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Bathrooms :</td>
                                        <td>
                                            <input type="number" class="INPUT w-80" name="bathrooms" value="<?php echo $bathrooms ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Square Ft :</td>
                                        <td>
                                            <input type="number" class="INPUT w-80" name="squareFt" value="<?php echo $squareFt ?>">
                                        </td>
                                    </tr>

                                </table>
                                
                                <table class="TBL_30">
                                    
                                    <tr  class="T_ROW">
                                        <td>Description :</td>
                                    </tr>
                                    
                                    <tr  class="T_ROW">
                                        <td>
                                            <textarea type="text" class="INPUT" name="description" id="" cols="30" rows="10"><?php echo $description ?></textarea>
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Featured :</td>
                                        <td>
                                            <div class="RADIO_BOX">
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($featured=='Yes'){echo "checked";} ?> name="featured" value="Yes">
                                                    <p>Yes</p>
                                                </div>
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($featured=='No'){echo "checked";} ?> name="featured" value="No">
                                                    <p>No</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Active :</td>
                                        <td>
                                            <div class="RADIO_BOX">
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($active=='Yes'){echo "checked";} ?> name="active" value="Yes">
                                                    <p>Yes</p>
                                                </div>
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($active=='No'){echo "checked";} ?> name="active" value="No">
                                                    <p>No</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Blog :</td>
                                        <td>
                                            <div class="RADIO_BOX">
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($blog=='Yes'){echo "checked";} ?> name="blog" value="Yes">
                                                    <p>Yes</p>
                                                </div>
                                                <div class="RADIO_BOX_ITEM">
                                                    <input type="radio" <?php if($blog=='No'){echo "checked";} ?> name="blog" value="No">
                                                    <p>No</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Owner :</td>
                                        <td>
                                            <input type="text" class="INPUT" name="owner" value="<?php echo $owner ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Phone :</td>
                                        <td>
                                            <input type="number" class="INPUT" name="phone" value="<?php echo $phone ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Whatsapp :</td>
                                        <td>
                                            <input type="number" class="INPUT w-72" name="whatsapp" value="<?php echo $whatsapp ?>">
                                        </td>
                                    </tr>

                                    <tr class="T_ROW">
                                        <td class="w_442">Email :</td>
                                        <td>
                                            <input type="email" class="INPUT" name="email" value="<?php echo $email ?>">
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="ROW">

                            <table class="TBL_30">
                                    
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit" value="Update Property" class="btn BTN_SEC">
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
                            $name = $_POST['name'];
                            $type = $_POST['type'];
                            $status = $_POST['status'];
                            $city = $_POST['city'];
                            $backgroundName = $_POST['backgroundName'];
                            $pictureName = $_POST['pictureName'];
                            $pictureName2 = $_POST['pictureName2'];
                            $oldPrice = $_POST['oldPrice'];
                            $discount = $_POST['discount'];
                            $bedrooms = $_POST['bedrooms'];
                            $bathrooms = $_POST['bathrooms'];
                            $squareFt = $_POST['squareFt'];
                            $description = $_POST['description'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];
                            $blog = $_POST['blog'];
                            $owner = $_POST['owner'];
                            $phone = $_POST['phone'];
                            $whatsapp = $_POST['whatsapp'];
                            $email = $_POST['email'];

                            //2. Upload the image if selected

                            //CHeck whether upload button is clicked or not
                            if(isset($_FILES['backgroundName']['name']))
                            {
                                //Upload BUtton Clicked
                                $image_name = $_FILES['backgroundName']['name']; //New Image NAme

                                //CHeck whether th file is available or not
                                if($image_name!="")
                                {
                                    //IMage is Available
                                    //A. Uploading New Image

                                    //REname the Image
                                    $ext = end(explode('.', $image_name)); //Gets the extension of the image

                                    //create new name for image
                                    $image_name = "Background-Name-".rand(0000,9999).".".$ext; //new image name may be "Background-Name-8462.jpg"

                                    //B.UPload the image
                                    //get the SRC path and Destination path

                                    //Source path is the current location of image to be uploaded
                                    $src_path = $_FILES['backgroundName']['tmp_name'];

                                    //Destination path is the location uploaded image will be stored
                                    $dest_path = "../images/property/background/".$image_name;

                                    //Upload the image
                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    /// CHeck whether the image is uploaded or not
                                    if($upload==false)
                                    {
                                        //failed to upload the image
                                        //redirect to home page with error
                                        $_SESSION['upload1'] = "<div class='ERROR'>Failed to Upload Background</div>";
                                        header('location:'.SITEURL_ADMIN.'manage_property.php');
                                        ob_end_flush();
                                        //stop the process
                                        die();
                                    }
                                    //C. Remove the image if new image is uploaded and current image exists
                                    //Remove current Image if Available
                                    if($backgroundName != "")
                                    {
                                        //Current Image is Available
                                        //REmove the image
                                        $remove_path = "../images/property/background/".$backgroundName;

                                        //remove the image
                                        $remove = unlink($remove_path);

                                        //Check whether the image is removed or not
                                        if($remove==false)
                                        {
                                            //set the session message
                                            $_SESSION['remove'] = "<div class='ERROR'>Failed to Remove Background</div>";
                                            //redirect to Manage Property Page
                                            header('location:'.SITEURL_ADMIN.'manage_property.php');
                                            ob_end_flush();
                                            //stop the process
                                            die();
                                        }
                                    }
                                }
                                else
                                {
                                    $image_name = $backgroundName; //Default Image when Image is Not Selected
                                }
                            }
                            else
                            {
                                $image_name = $backgroundName; //Default Image when Button is not Clicked
                            }
                            
                            
                            
                            //3. Upload the image if selected

                            //CHeck whether upload button is clicked or not
                            if(isset($_FILES['pictureName']['name']))
                            {
                                //Upload BUtton Clicked
                                $image_name2 = $_FILES['pictureName']['name']; //New Image NAme

                                //CHeck whether th file is available or not
                                if($image_name2!="")
                                {
                                    //IMage is Available
                                    //A. Uploading New Image

                                    //REname the Image
                                    $ext = end(explode('.', $image_name2)); //Gets the extension of the image

                                    //create new name for image
                                    $image_name2 = "Picture-Name-".rand(0000,9999).".".$ext; //new image name may be "Picture-Name-8462.jpg"

                                    //B.UPload the image
                                    //get the SRC path and Destination path

                                    //Source path is the current location of image to be uploaded
                                    $src_path = $_FILES['pictureName']['tmp_name'];

                                    //Destination path is the location uploaded image will be stored
                                    $dest_path = "../images/property/picture/".$image_name2;

                                    //finally upload the image
                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    /// CHeck whether the image is uploaded or not
                                    if($upload==false)
                                    {
                                        //failed to upload the image
                                        //redirect to home page with error
                                        $_SESSION['upload2'] = "<div class='ERROR'>Failed to Upload Picture</div>";
                                        header('location:'.SITEURL_ADMIN.'manage_property.php');
                                        ob_end_flush();
                                        //stop the process
                                        die();
                                    }
                                    //C. Remove the image if new image is uploaded and current image exists
                                    //Remove current Image if Available
                                    if($pictureName != "")
                                    {
                                        //Current Image is Available
                                        //REmove the image
                                        $remove_path = "../images/property/picture/".$pictureName;

                                        //remove the image
                                        $remove = unlink($remove_path);

                                        //Check whether the image is removed or not
                                        if($remove==false)
                                        {
                                            //set the session message
                                            $_SESSION['remove2'] = "<div class='ERROR'>Failed to Remove Picture</div>";
                                            //redirect to Manage Property Page
                                            header('location:'.SITEURL_ADMIN.'manage_property.php');
                                            ob_end_flush();
                                            //stop the process
                                            die();
                                        }
                                    }
                                }
                                else
                                {
                                    $image_name2 = $pictureName; //Default Image when Image is Not Selected
                                }
                            }
                            else
                            {
                                $image_name2 = $pictureName; //Default Image when Button is not Clicked
                            }
                            
                            
                            
                            //4. Upload the image if selected

                            //CHeck whether upload button is clicked or not
                            if(isset($_FILES['pictureName2']['name']))
                            {
                                //Upload BUtton Clicked
                                $image_name3 = $_FILES['pictureName2']['name']; //New Image NAme

                                //CHeck whether th file is available or not
                                if($image_name3!="")
                                {
                                    //IMage is Available
                                    //A. Uploading New Image

                                    //REname the Image
                                    $ext = end(explode('.', $image_name3)); //Gets the extension of the image

                                    //create new name for image
                                    $image_name3 = "Picture-Name2-".rand(0000,9999).".".$ext; //new image name may be "Picture-Name2-8462.jpg"

                                    //B.UPload the image
                                    //get the SRC path and Destination path

                                    //Source path is the current location of image to be uploaded
                                    $src_path = $_FILES['pictureName2']['tmp_name'];

                                    //Destination path is the location uploaded image will be stored
                                    $dest_path = "../images/property/picture/".$image_name3;

                                    //finally upload the image
                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    /// CHeck whether the image is uploaded or not
                                    if($upload==false)
                                    {
                                        //failed to upload the image
                                        //redirect to home page with error
                                        $_SESSION['upload3'] = "<div class='ERROR'>Failed to Upload Picture2</div>";
                                        header('location:'.SITEURL_ADMIN.'manage_property.php');
                                        ob_end_flush();
                                        //stop the process
                                        die();
                                    }
                                    //C. Remove the image if new image is uploaded and current image exists
                                    //Remove current Image if Available
                                    if($pictureName2 != "")
                                    {
                                        //Current Image is Available
                                        //REmove the image
                                        $remove_path = "../images/property/picture/".$pictureName2;

                                        //remove the image
                                        $remove = unlink($remove_path);

                                        //Check whether the image is removed or not
                                        if($remove==false)
                                        {
                                            //set the session message
                                            $_SESSION['remove3'] = "<div class='ERROR'>Failed to Remove Picture2</div>";
                                            //redirect to Manage Property Page
                                            header('location:'.SITEURL_ADMIN.'manage_property.php');
                                            ob_end_flush();
                                            //stop the process
                                            die();
                                        }
                                    }
                                }
                                else
                                {
                                    $image_name3 = $pictureName2; //Default Image when Image is Not Selected
                                }
                            }
                            else
                            {
                                $image_name3 = $pictureName2; //Default Image when Button is not Clicked
                            }



                            //5. SQL Query to Save the data into database
                            //for numerical values we do not need to pass value inside quotes "" but for string values it is compulsory
                            $sql = "UPDATE property SET
                                name = '$name',
                                type = '$type',
                                status = '$status',
                                city = '$city',
                                backgroundName = '$image_name',
                                pictureName = '$image_name2',
                                pictureName2 = '$image_name3',
                                oldPrice = $oldPrice,
                                discount = $discount,
                                price = ($oldPrice-$discount),
                                discountPercent = ($discount/$oldPrice*100),
                                bedrooms = $bedrooms,
                                bathrooms = $bathrooms,
                                squareFt = $squareFt,
                                description = '$description',
                                featured = '$featured',
                                active = '$active',
                                blog = '$blog',
                                owner = '$owner',
                                phone = $phone,
                                whatsapp = $whatsapp,
                                email = '$email'
                                WHERE id=$id
                            ";

                            //6. Executing query and inserting data into database
                            $res = mysqli_query($conn, $sql);

                            //7. Check whether the (query is executed) data is inserted or not and display approriate message
                            if($res==TRUE)
                                {
                                    //Property Updated
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='SUCCESS2'>Property Updated Successfully</div>";
                                    //redirect to Manage Property Page
                                    header('location:'.SITEURL_ADMIN.'manage_property.php');
                                    ob_end_flush();
                                }
                            else
                                {
                                    //failed to update property
                                    //create session message variable to display message
                                    $_SESSION['update'] = "<div class='ERROR2'>Failed to Update Property</div>";
                                    //redirect to Manage Property Page
                                    header('location:'.SITEURL_ADMIN.'manage_property.php');
                                    ob_end_flush();
                                }

                        }

                    ?>
                    
                </div>

            </div>
			
	    </a>
	
	</section>
	<!--===========================================================UPDATE PROPERTY SECTION END====================================================-->
	
<?php include('partials/footer.php'); ?>