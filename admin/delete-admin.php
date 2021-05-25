<?php
//Include constant.php for database connection
include('../config/constants.php');
//1.Get the id
echo $id=$_GET['id'];

//2.Create Query
$sql="DELETE FROM tbl_admin WHERE id=$id";

//3.Execute query
$res= mysqli_query($conn,$sql);
if($res)
{
    /* adding session variable */
    $_SESSION['delete']="<div class='success'>Admin Delete Successfully.</div>";
    //Redirect page
        header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
  /* adding session variable */
  $_SESSION['delete']="<div class='success'>Admin Deletion Failed.</div>";
  //Redirect page
      header("location:".SITEURL.'admin/manage-admin.php');  
}

//3.Redirect 


?>