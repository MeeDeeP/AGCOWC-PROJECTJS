<?php
	session_start();
	require_once 'dbcon.php';
 
	if(isset($_POST['create_post'])){
		$user_title = isset($_POST['title']) ? trim($_POST['title']) : '';
		$user_post = isset($_POST['post']) ? trim($_POST['post']) : '';
		$user_author = isset($_POST['author']) ? trim($_POST['author']) : '';
		$post_options = isset($_POST['option']) ? (
			(in_array('public', $_POST['option']) && in_array('private', $_POST['option'])) ? 3 : (
				(in_array('public', $_POST['option'])) ? 1 : (
					(in_array('private', $_POST['option'])) ? 2 : 0
				)
			)
		) : 0;

		// Check if title and post are not empty
		if(empty($user_title) || empty($user_post)){
			echo "
				<script>alert('Title and Post must not be empty!')</script>
				<script>window.location = 'success.php'</script>
			";
			exit; // Stop execution if fields are empty
		}

		// Check if both "public" and "private" are not selected
		if ($post_options == 0) {
			echo "
				<script>alert('Please select either Public, Private, or both!')</script>
				<script>window.location = 'success.php'</script>
			";
			exit; // Stop execution if both options are not selected
		}

		try{
			$post_date = date('Y-m-d H:i:s');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `post` VALUES('', '$user_title', '$user_post', '$user_author', '$post_date', '$post_options')";
			$conn->exec($sql);
		} catch(PDOException $e){
			echo $e->getMessage();
		}

		$_SESSION['message'] = array("text" => "Text successfully created.", "alert" => "info");
		$conn = null;
		header('location: success.php');
	} else {
		echo "
			<script>alert('Please fill up the required field!')</script>
			<script>window.location = 'success.php'</script>
		";
	}
?>
