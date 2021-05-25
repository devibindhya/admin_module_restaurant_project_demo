<?php
//Include constant.php for database connection
 include('partials/menu.php');
?>
<!--form for update-->
    <div class="main-content">
        <div class="wrapper"><br/>
            <h2>Update Admin Details </h2>
            <br/><br/>
            <?php
                 //1.Get the id
                echo $id=$_GET['id']; 

                //2.create the query for select the data and ins
                $sql="SELECT * FROM tbl_admin where id=$id";

                //3.execute the query
                $res=mysqli_query($conn,$sql) or die(mysqli_error());

                if($res)
			    {	//Count no:of affected rows 
				    $count=mysqli_num_rows($res);
				    //check 
				    if($count==1)
				    { 
					    $rows=mysqli_fetch_assoc($res);
					    $id=$rows['id'];
					    $full_name=$rows['full_name'];
					    $username=$rows['username'];
					}
                }
                  else
                  {
                    //Redirect page
                    header("location:".SITEURL.'admin/manage-admin.php');
                  }

            ?>

            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name;?>"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="user_name" value="<?php echo $username;?>"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
                        <td colspan="2"><input type="submit" name="update" value="Update" class="btn-secondary"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>     <br/><br/>
    <?php
    if(isset($_POST['update']))
    {
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $id= $_POST['id']; 

        $sql= "UPDATE  tbl_admin SET
           full_name='$full_name',
           username='$user_name'
           WHERE id=$id";
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        /*5.Check whether the data is updated */
        if($res)
        {
          /* adding session variable */
              $_SESSION['update']="<div class='success'>Admin updated Successfully.</div>";
          //Redirect page
              header("location:".SITEURL.'admin/manage-admin.php');
            
        }
        else
          {   
           /* adding session variable */
              $_SESSION['update']="<div class='success'>Failed to update admin.</div>";
           //Redirect page
              header("location:".SITEURL.'admin/add-admin.php');
          }   
    }


    
    include('partials/footer.php');
?>
