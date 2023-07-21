<?php

    //include contants.php file here
    include('../config/constants.php');

    //1. Get id of Admin to be Deleted
    $id=$_GET['id'];

    //2. Get SQL query to Delete Admin
    $sql= "DELETE FROM user WHERE id=$id";

    //Executing query
    $res = mysqli_query($conn, $sql);

    //Check whether the query is executed or not
    if($res==TRUE)
    {
        //Admin Deleted
        //create session message variable to display message
        $_SESSION['delete'] = "<div class='SUCCESS2'>Admin Deleted Successfully</div>";
        //redirect to Manage Admin Page
        header('location:'.SITEURL_ADMIN.'manage_admin.php');
        ob_end_flush();
    }
    else
    {
        //failed to Delete Admin
        $_SESSION['delete'] = "<div class='ERROR2'>Failed to Delete Admin</div>";
        //redirect to Manage Admin Page
        header('location:'.SITEURL_ADMIN.'manage_admin.php');
        ob_end_flush();
    }

?>