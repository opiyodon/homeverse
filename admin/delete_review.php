<?php

    //include contants.php file here
    include('../config/constants.php');

    //check whether the id and profileName value is set or not
    if(isset($_GET['id']))
    {
        //get the values and delete
        $id=$_GET['id'];

        //2. Get SQL query to Delete review
        $sql= "DELETE FROM reviews WHERE id=$id";

        //Executing query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==TRUE)
        {
            //review Deleted
            //create session message variable to display message
            $_SESSION['delete'] = "<div class='SUCCESS2'>Review Deleted Successfully</div>";
            //redirect to Manage review Page
            header('location:'.SITEURL_ADMIN.'manage_review.php');
            ob_end_flush();
        }
        else
        {
            //failed to Delete review
            $_SESSION['delete'] = "<div class='ERROR2'>Failed to Delete Review</div>";
            //redirect to Manage review Page
            header('location:'.SITEURL_ADMIN.'manage_review.php');
            ob_end_flush();
        }
    }
    else
    {
        //redirect to manage_review
        header('location:'.SITEURL_ADMIN.'manage_review.php');
        ob_end_flush();
    }

?>