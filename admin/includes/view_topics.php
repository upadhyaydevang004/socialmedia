<table align="center" width="800" bgcolor="skyblue">
	
		<tr bgcolor="orange" border="1">
			<th>S.N</th>
			<th>Topic Name</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
		<?php 
		include("includes/connection.php");
		$sel_topic = "select * from topics ORDER by 1 DESC";
		$run_topic = mysqli_query($con,$sel_topic);
		
		$i=0; 
		while($row_topic = mysqli_fetch_array($run_topic)){
			
			$id = $row_topic['topic_id']; 
			$name = $row_topic['topic_title'];
			$i++;
			
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $name; ?></td>
			<td><a href="index.php?view_topics&delete=<?php echo $id;?>">Delete</a></td>
			<td><a href="index.php?view_topics&edit=<?php echo $id;?>">Edit</a></td>
			
		</tr>
		<?php  }?>

</table>

<?php 
		if(isset($_GET['edit'])){
		
		$edit_id = $_GET['edit']; 
		
		$sel = "select * from topics where topic_id='$edit_id'";
		$run = mysqli_query($con,$sel);
		$row = mysqli_fetch_array($run);
			
		$id = $row['topic_id']; 
		$title = $row['topic_title']; 
		
?>

<?php if (isset($_GET['edit'])) { ?>
	
}
<h2 style="padding:5px;">Update the Topic</h2>
<form action="" method="post" id="f" class="ff">
					
					<input type="text" name="title" value="<?php echo $title;?>"/><br/> 
					
					
					<input type="submit" name="update" value="Update Topic"/>
					</form>
				
				<?php } ?>

		<?php 
		if (isset($_POST['update'])) {
			
			$new_title = $_POST['title'];

			$update = "Update topics set topic_title='$new_title' where topic_id='$id'";

			$run_update = mysqli_query($con, $update);

			if($run_update){
				echo "<script>alert('Topic has been Updated!')</script>";
				echo "<script>window.open('index.php?view_topics','_self')</script>";
		}
			}
		}

	
	if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete']; 
	
	$delete = "delete from topics where topic_id='$delete_id'"; 
	$run_del = mysqli_query($con,$delete); 
	
		if($run_del){
		
		echo "<script>alert('Topic has been Deleted!')</script>";
		echo "<script>window.open('index.php?view_topics','_self')</script>";
		}
	
	}
?>