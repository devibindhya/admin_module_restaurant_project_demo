<?php
//Include constant.php for database connection
 include('partials/menu.php');
?>
<!--form for update-->
    <div class="main-content">
        <div class="wrapper"><br/>
            <h2>Change password </h2>
            <br/><br/>
            <?php
                 //1.Get the id
                 if(isset($_GET['id']))
                 {
                    echo $id=$_GET['id'];
                 }
            ?>
            <form method="post" action="">
                 <table class="tbl-30">
                     <tr>
                         <td>Current Paassword:</td>
                         <td><input type="text" name="current_password" placeholder="Current Password"></td>
                    </tr>
                    <tr>
                         <td>New Paassword:</td>
                         <td><input type="text" name="new_password" placeholder="New Password"></td>
                    </tr>
                    <tr>
                         <td>Confirm Paassword:</td>
                         <input type="hidden" name="id" value="<?php echo $id;?>"/>
                         <td><input type="text" name="confirm_password" placeholder="Confirm Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Confirm" class="btn-secondary"> </td>
                     </tr>

                </table>
            </form>
        </div>
    </div>
    <?php
     if(isset($_POST['submit']))
     {
        //get the data using post method
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        $id=$_POST['id'];

        //Check whether the user with the current id and password exist or not
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        $res=mysqli_query($conn,$sql) or die(mysqli_error());
        //$rows=mysqli_fetch_assoc($res);
        //print_r($rows);
        //echo $rows['password'];
     
        if($res)
        {
            $count=mysqli_num_rows($res);
            if($count==1)
            {
               if($new_password ==$confirm_password)
               { 
                     $sql2= "UPDATE  tbl_admin SET
                    password='$confirm_password'
                     WHERE id=$id";

                    $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
                    if($res2)
                    {
                        /* password changed  */
                        $_SESSION['update_password']="<div class='success'>Password updated Successfully.</div>";
                        //Redirect page
                        header("location:".SITEURL.'admin/manage-admin.php');
                    
                    }
                        else
                        {   
                            /* adding session variable */
                             $_SESSION['update_password']="<div class='success'>Failed to update password.</div>";
                            //Redirect page
                             header("location:".SITEURL.'admin/add-admin.php');
                        }   
               }

               else
                {
                    $_SESSION['password-not-match']="<div class='error'>Password not match.</div>";
                    header("location:".SITEURL.'admin/manage-admin.php'); 
                 }
            }
            else
            {
                $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
                header("location:".SITEURL.'admin/manage-admin.php'); 
            }
        }
        //Check whether the New Password and Confirm Password confirm or not

        // Confirm if all above are true
    }
    include('partials/footer.php');
    ?>
