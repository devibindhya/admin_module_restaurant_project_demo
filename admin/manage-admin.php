<!DOCTYPE html>
<html>	
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tasty  Corner</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<!--Main Menu Section Start -->
	<?php include('partials/menu.php');?>
	<!--Main Menu Section End -->

	<!--Main Content Section Start -->
	<div class="main-content">
		<div class="wrapper">
			<h2>Manage Admin</h2><br/><br/>
			<?php
			//for admin add message
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);  //to remove the message
			}
			//for admin delete message
			if(isset($_SESSION['delete']))
			{
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);  //to remove the message
			}
			//for admin update message
			if(isset($_SESSION['update']))
			{
				echo $_SESSION['update'];
				unset($_SESSION['update']);  //to remove the message
			}
			//for  password change if user exist or not
			if(isset($_SESSION['user-not-found']))
			{
				echo $_SESSION['user-not-found'];
				unset($_SESSION['user-not-found']);  //to remove the message
			}
			if(isset($_SESSION['password-not-match']))
			{
				echo $_SESSION['password-not-match'];
				unset($_SESSION['password-not-match']);  //to remove the message
			}
			if(isset($_SESSION['update_password']))
			{
				echo $_SESSION['update_password'];
				unset($_SESSION['update_password']);  //to remove the message
			}
			

			?>
			<br/><br/>
            <a href="addadmin.php" class="btn-primary">Add Admin</a>
			<br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>Sl.No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
			<?php
			//Query to get the data from table 
			$sql= "SELECT * FROM  tbl_admin" ;
			//Execute the query
			$res=mysqli_query($conn,$sql) or die(mysqli_error());
			if($res)
			{	//Count no:of affected rows 
				$count=mysqli_num_rows($res);
				//check 
				if($count>0)
				{ 
					$sn=1; // for display as serial no
					while($rows=mysqli_fetch_assoc($res))
					{// as long as the data from database are finished the while loop will work
						$id=$rows['id'];
						$full_name=$rows['full_name'];
						$username=$rows['username'];
						?>
						<!--Display content inside table-->
						<tr>
                			<td><?php echo $sn;?></td>
                    		<td><?php echo $full_name;?></td>
                    		<td><?php echo $username;?></td>
                    		<td>
								<a href="<?php echo SITEURL; ?>admin/password-update.php?id=<?php echo $id; ?>"  class="btn-primary">Change Password</a>
								<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
						     	<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
							</td>
                		</tr>
					<?php	
					$sn++;
					}
				}
				else
				{
					//Redirect page
					//header("location:".SITEURL.'admin/manage-admin.php');
					echo"No Rows Found !!!";
				}
			}

			?>
               
            </table>
			
			<div class="clearfix">
			</div>
			
		</div>
	</div>
	<!--Main Content Section End -->

	<!--Footer Section Start -->
	<?php include('partials/footer.php');?>
	<!--Footer Section End -->
</body>
</html>	