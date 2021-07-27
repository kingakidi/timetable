<!-- <link rel="stylesheet" href="./admin/css/bootstrap.css"> -->
<?php 
include('./config.php');
extract($_POST);
if(isset($save)){
	$que=mysqli_query($con,"select * from subject where subject_name='$subname'");	
	$row=mysqli_num_rows($que);
		if($row)
		{
		$err="<font color='red'>This Subject already exists</font>";
		}
		else
		{

			mysqli_query($con,"insert into subject values(null,'$subname','$s','$courseid', '$t', '$lpw', '$type')");	

			$err="<font color='blue'>Course Added Succesfully!!</font>";
		}
	
}

?>

<script>

function showOpts(str){
	showSemester(str);
	showTeacher(str);
}

function showSemester(str){
	if (str==""){
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("semester").innerHTML=xmlhttp.responseText;
		}
	}
		//alert(str);
		xmlhttp.open("GET","semester_ajax.php?id="+str,true);
		xmlhttp.send();
	}

	function showTeacher(str)
	{
		if (str=="")
	{
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp2=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp2.onreadystatechange=function()
	{
	if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
	{
	document.getElementById("teacher").innerHTML=xmlhttp2.responseText;
	}
	}
	//alert(str);
	xmlhttp2.open("GET","teacher_ajax.php?id="+str,true);
	xmlhttp2.send();
}

</script>


<!-- <div class="row p-2"> -->

	
	<form method="POST" enctype="multipart/form-data" id="course-form">
		<div class="container">
		<h2>Add Course</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<div class="form-group">
						<label for="">Select Level</label>
						<select name="courseid" id="department" onchange="showOpts(this.value)" class="form-control">
						<option disabled selected >Select Level</option>
						<?php
						$sub=mysqli_query($con,"select * from department");
						while($s=mysqli_fetch_array($sub))
						{
							$s_id=$s[0];
							echo "<option value='$s_id'>".$s[1]."</option>";
						}
						
						?>
						</select>
					</div>
				</div>
				<div class="col-sm">
						<div class="form-group">
							<label for="">Select Semester</label>
							<select name="s" id="semester" class="form-control"/>
								<option disabled selected value="">Select Semester</option>
								
								<?php
								$sub=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
								while($s=mysqli_fetch_array($sub))
								{
									$s_id=$s[0];
									echo "<option value='$s_id'>".$s[1]."</option>";
								}
								
								?>
							</select>
						
						</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
			<div class="col-sm">
				<div class="form-group">
					<label for="">Select Lecturer</label>
					<select name="t" id="teacher" class="form-control"/>
						<option disabled selected value="">Select Lecturer</option>
						
						<?php
						// where department_id='".$res['department_id']."'
						$sub=mysqli_query($con,"select * from teacher ");
						while($s=mysqli_fetch_array($sub))						{
							$s_id=$s[0];
							$name = ucwords($s[1]);
							echo "<option value='$s_id'>".$name."</option>";
						}
						
						?>
					
					</select>
				</div>
			</div>
			<div class="col-sm">
				<div class="form-group">
					<label for="subname">Course Title</label>
					<input type="text" name="title" id="title" class="form-control" placeholder="Enter Course Title"/>
				</div>
			</div>
		</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<div class="form-group">
						<label for="lpw">Course Code</label>
						<input type="text" name="course_code" id="code" class="form-control" placeholder="Enter Course Code"/>
					</div>
				</div>
				<div class="col-sm">
					<div class="form-group">
						<label for="type">Select Type</label>
						<select name="type" id="type" class="form-control" >
							<option value="" selected disabled>Select Type</option>
							<option value="lecture">Lecture</option>
							<option value="lab">Lab</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="container">
			<div class="form-group">
						<label for="course-duration">Enter Course Duration</label>
						<input type="number" class="form-control" id="duration" placeholder="Enter Course Duration">
			</div>
		</div>
		<div class="container text-center" id="form-error"></div>
		<div class="container">
		<div class="form-group">
			<button type="submit" class="btn btn-success" id="btn-course-form">Add Course</button>
			
			<input type="reset" value="Reset" class="btn btn-success"/>
		</div>
		</div>

  </form>
<script src="./js/jquery-3.js"></script>
  <script src="./js/helperscript.js"></script>