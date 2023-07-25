<?php

    //include contants.php file here
    include('../config/constants.php');

    //1. Get id of Blog to be Deleted
    $id=$_GET['id'];

    //2. Get SQL query to Delete Blog by updating particular values to empty
    $sql = "UPDATE property SET
        comment = '',
        featured_blog = '',
        active_blog = '',
        dates = '00/00/0000',
        blog = 'No'
        WHERE id=$id
    ";

    //Executing query
    $res = mysqli_query($conn, $sql);

    //Check whether the query is executed or not
    if($res==TRUE)
    {
        //Blog Deleted
        //create session message variable to display message
        $_SESSION['delete'] = "<div class='SUCCESS2'>Blog Deleted Successfully</div>";
        //redirect to Manage Blog Page
        header('location:'.SITEURL_ADMIN.'manage_blog.php');
        ob_end_flush();
    }
    else
    {
        //failed to Delete Admin
        $_SESSION['delete'] = "<div class='ERROR2'>Failed to Delete Blog</div>";
        //redirect to Manage Admin Page
        header('location:'.SITEURL_ADMIN.'manage_blog.php');
        ob_end_flush();
    }

?>