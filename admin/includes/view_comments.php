<table align="center" width="800" bgcolor="skyblue">
	
		<tr bgcolor="orange" border="1">
			<th>S.N</th>
			<th>Comment</th>
			<th>Author</th>
			<th>Date</th>
			<th>Delete</th>
		</tr>
		<?php 
		include("includes/connection.php");
		$sel_com = "select * from comments ORDER by 1 DESC";
		$run_com = mysqli_query($con,$sel_com);
		
		$i=0; 
		while($row_com = mysqli_fetch_array($run_com)){
			
			$comment_id = $row_com['comment_id']; 
			$user_id = $row_com['user_id'];
			$comment = $row_com['comment'];
			$date = $row_com['date'];
			$author = $row_com['comment_author'];
			$i++;
			
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $comment; ?></td>
			<td><?php echo $author; ?></td>
			<td><?php echo $date; ?></td>
			<td><a href="index.php?view_comments&delete=<?php echo $comment_id;?>">Delete</a></td>
			
		</tr>
		<?php  }?>

</table>

<?php 
		if(isset($_GET['edit'])){
		
		$edit_id = $_GET['edit']; 
		
		$sel_posts = "select * from posts where post_id='$edit_id'";
		$run_posts = mysqli_query($con,$sel_posts);
		$row_posts = mysqli_fetch_array($run_posts);
			
		$post_new_id = $row_posts['post_id']; 
		$post_title = $row_posts['post_title']; 
		$post_content = $row_posts['post_content'];
		
?>

<h2 style="padding:5px;">Update the Post</h2>
<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
					
					<input type="text" name="title" size="82" value="<?php echo $post_title;?>"/><br/> 
					<textarea cols="83" rows="4" name="content"><?php echo $post_content;?></textarea><br/>
					<select name="topic">
						<option>Select Topic</option>
						<?php getTopics();?>
					</select>
					<input type="submit" name="update" value="Update Post"/>
					</form>
				
				<?php } ?>
<?php 
	
	if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete']; 
	
	$delete = "delete from comments where comment_id='$delete_id'"; 
	$run_del = mysqli_query($con,$delete); 
	
		if($run_del){
		
		echo "<script>alert('Comment has been Deleted!')</script>";
		echo "<script>window.open('index.php?view_comments','_self')</script>";
		}
	
	}


?>