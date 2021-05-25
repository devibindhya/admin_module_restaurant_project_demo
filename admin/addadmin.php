
        <?php include('partials/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1><BR/><br/>
            <?php
            if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);  //to remove the message
			}
            ?>
            <br/><br/>
            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="user_name" placeholder="Enter Username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btn-secondary"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include('partials/footer.php');?>
<?php
/*1.Submitting values to database */
if(isset($_POST['submit'])){
    //get the data using post method
    $full_name=$_POST['full_name'];
    $user_name=$_POST['user_name'];
    $password=md5($_POST['password']);//Pssword encryption with md5

    /*2.DATABASE CONNECTION already included in the menu.php which we called on the top of the page*/
    /*$conn=mysqli_connect('localhost','root','') or die(mysqli_error());
    $db_select=mysqli_select_db($conn,'food-order') or die(mysqli_error());
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }*/
    /*3.Writing the query */
    $sql= "INSERT INTO tbl_admin SET
           full_name='$full_name',
           username='$user_name',
           password='$password'";
    /*4.Executing the query */
      $res=mysqli_query($conn,$sql) or die(mysqli_error());

      /*5.Check whether the data is inserted */
      if($res)
      {
        /* adding session variable */
            $_SESSION['add']="<div class='success'>Admin added Successfully.</div>";
        //Redirect page
            header("location:".SITEURL.'admin/manage-admin.php');  
      }
      else
        {   
         /* adding session variable */
            $_SESSION['add']="<div class='success'>Failed to add admin.</div>";
         //Redirect page
            header("location:".SITEURL.'admin/add-admin.php');
        }
          
}
?>