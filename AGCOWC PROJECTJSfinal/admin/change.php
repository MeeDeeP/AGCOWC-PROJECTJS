<?php 
session_start();
include('dbcon.php');
if(!ISSET($_SESSION['user'])){
    header('location:index.php');
    die();  
}
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/agcowc logo_1.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <script defer src="assets/js/bootstrap.bundle.min.js" ></script>
    <title>Change Password</title>
</head>
<body style="background-image: linear-gradient(to right, #74D680,#378B29)">
<div class="form-sign-up">
<?php
				$id = $_SESSION['user'];
				$sql = $conn->prepare("SELECT * FROM `admin2` WHERE `id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>

        <form action="change_password_query.php "method="POST">
            <h2>Change Password</h2>
            <div class="form-group">
                <div class="row">
                <input type="hidden" name="id" value= "<?php echo $fetch['id']?>" class="form-control" required>
                <input type="hidden" name="user_oldpass"  value= "<?php echo $fetch['admin_password']?>" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                 Current Password:
                <input type="password" name="old_pass" class="form-control">
            </div>
            <div class="form-group">
                 New Password:
                <input type="password" name="new_pass" class="form-control" >
            </div>
            <div class="form-group">
                 Confirm Password:
                <input type="password" name="confirm_pass" class="form-control">
            </div>
            <br>
			    <button class="btn btn-success form-control" name="update_pass">Done</button>
                <a href="profile.php">Back</a>
                       
                    </form>
</body>
</html>