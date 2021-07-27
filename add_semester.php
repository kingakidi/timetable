<?php 
	include('./config.php');
	extract($_POST);
	
	if(isset($save)){
		
		if (!empty($s) AND !empty($c)) {
			$sem_id = $_POST['s'];
			$department_id = $_POST['c'];
			$que=mysqli_query($con,	"SELECT * FROM semester where department_id='$department_id' AND semester_name = '$sem_id'");	
			$row=mysqli_num_rows($que);

			if($row){
				$err= "<font color='red'>This Semester already exists</font>";
			}else{
				mysqli_query($con,"insert into semester values('$s','$c')");	

				$err="<span class='text-success'>Semester Added Successfully</span>";
			}
		}else{
			$err = "<span class='text-danger'> All fields required </span>";
		}
	
}

?>
<h2>Add Semester</h2>
<form method="POST" enctype="multipart/form-data">
	
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<div class="form-group">
					<label for="">Select Level</label>
					
					<select name="c" class="form-control">
						<option value="" disabled selected> Select Level </option>
						<?php 
							$dep=mysqli_query($con,"select * from department");
							while($dp=mysqli_fetch_array($dep))
							{
							$dp_id=$dp[0];
							echo "<option value='$dp_id'>".$dp[1]."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm">
				<div class="form-group">
					<label for="">Section Name</label>
					<input type="text" name="s" class="form-control" placeholder="Enter Semester"/>
				</div>
			</div>
		</div>
		<div class="show-status text-center"> <?php echo @$err; ?> </div>
		<div class="form-group">
			<input type="submit" value="Add Semester" name="save" class="btn btn-success">
			<input type="reset" value="Reset" class="btn btn-success">
		</div>
	</div>
</form>
