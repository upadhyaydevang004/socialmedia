<h2 style="padding:5px; margin-left: 20px;">Add New Topic</h2>
<form action="" method="post" id="f" class="ff" style="margin-left: 20px;">
					
		<input type="text" name="title" /><br/> 
					
					
		<input type="submit" name="insert" value="Add new Topic"/>
</form>

<?php
	
	include("includes/connection.php");

	if (isset($_POST['insert'])) {
		
		$title = $_POST['title'];

		$insert = "Insert into topics (topic_title) values ('$title')";
		$run = mysqli_query($con, $insert);
		
		if($insert){
				echo "<script>alert('A Topic has been Inserted!')</script>";
				echo "<script>window.open('index.php?view_topics','_self')</script>";
	}

	}
?>