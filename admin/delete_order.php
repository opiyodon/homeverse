<?php

    //include contants.php file here
    include('../config/constants.php');

    //check whether the id and backgroundName value is set or not
    if(isset($_GET['id']))
    {
        //get the values and delete
        $id=$_GET['id'];
        

        //2. Get SQL query to Delete Order
        $sql= "DELETE FROM orders WHERE id=$id";

        //Executing query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==TRUE)
        {
            //Order Deleted
            //create session message variable to display message
            $_SESSION['delete'] = "<div class='SUCCESS2'>Order Deleted Successfully</div>";
            //redirect to Manage Order Page
            header('location:'.SITEURL_ADMIN.'manage_order.php');
            ob_end_flush();
        }
        else
        {
            //failed to Delete Order
            $_SESSION['delete'] = "<div class='ERROR2'>Failed to Delete Order</div>";
            //redirect to Manage Order Page
            header('location:'.SITEURL_ADMIN.'manage_order.php');
            ob_end_flush();
        }
    }
    else
    {
        //redirect to manage_order
        header('location:'.SITEURL_ADMIN.'manage_order.php');
        ob_end_flush();
    }

?>