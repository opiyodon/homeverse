<?php

    //include contants.php file here
    include('../config/constants.php');

    //check whether the id and backgroundName value is set or not
    if(isset($_GET['id']) AND isset($_GET['backgroundName']) AND isset($_GET['pictureName']))
    {
        //get the values and delete
        $id=$_GET['id'];
        $backgroundName=$_GET['backgroundName'];
        $pictureName=$_GET['pictureName'];

        //A:::remove the physical image file is avilable
        if($backgroundName != "")
        {
            //image is available. so remove it
            $path = "../images/property/background/".$backgroundName;
            //remove the image
            $remove = unlink($path);

            //IF Failed to remove image then add an error and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='ERROR2'>Failed to Remove Background</div>";
                //redirect to Manage Property Page
                header('location:'.SITEURL_ADMIN.'manage_property.php');
                ob_end_flush();
                //stop the process
                die();
            }
        }

        //B:::remove the physical image file is avilable
        if($pictureName != "")
        {
            //image is available. so remove it
            $path = "../images/property/picture/".$pictureName;
            //remove the image
            $remove = unlink($path);

            //IF Failed to remove image then add an error and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove2'] = "<div class='ERROR2'>Failed to Remove Picture</div>";
                //redirect to Manage Property Page
                header('location:'.SITEURL_ADMIN.'manage_property.php');
                ob_end_flush();
                //stop the process
                die();
            }
        }

        //2. Get SQL query to Delete Property
        $sql= "DELETE FROM property WHERE id=$id";

        //Executing query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==TRUE)
        {
            //Property Deleted
            //create session message variable to display message
            $_SESSION['delete'] = "<div class='SUCCESS2'>Property Deleted Successfully</div>";
            //redirect to Manage Property Page
            header('location:'.SITEURL_ADMIN.'manage_property.php');
            ob_end_flush();
        }
        else
        {
            //failed to Delete Property
            $_SESSION['delete'] = "<div class='ERROR2'>Failed to Delete Property</div>";
            //redirect to Manage Property Page
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