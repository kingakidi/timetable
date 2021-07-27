<?php 

include('./config.php');
$subject_id=$_REQUEST['subject_id'];
$q=mysqli_query($con,"SELECT * FROM subject WHERE subject_id='$subject_id'");
$res=mysqli_fetch_assoc($q);

extract($_POST);

if(isset($update))
{	

	mysqli_query($con,"update subject set subject_name='$subname', sem_id='$s',department_id='$course', teacher_id='$t', lecture_per_week='$lpw', type='$type' where subject_id='$subject_id' ");
	
	echo "<span class='text-success'>Course Updated Successfully</span>";
	
	}
	
?>


<script>

function showOpts(str){
	showSemester(str);
	showTeacher(str);
}

function showSemester(str)
{
if (str=="")
{
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



<!-- <div class="row">
<div class="col-sm-8"> -->
<div class="container">
	<h2>Update Course</h2>
</div>
<form method="POST" enctype="multipart/form-data">
  <?php echo @$err; ?>
  <div class="container">
	  <div class="row">
		  <div class="col-sm">
			  <div class="form-group">
				<label for="">Select Level</label>
				<select name="course" id="courseid" onChange="showOpts(this.value)" class="form-control">
					<?php
						$cou=mysqli_query($con,"select * from department");
						while($c=mysqli_fetch_array($cou))
						{
						$c_id=$c[0];
					?>
					<option value='<?php echo $c_id; ?>' <?php if($c_id==$res['department_id']){echo "selected";} ?>>
						<?php echo $c[1]; ?>
					</option>
					<?php
						}
					?>
				</select>
			   </div>
		  </div>
		  <div class="col-sm">
			  <div class="form-group">
				<label for="">Select Semester</label>
				<select name="s" id="semester" class="form-control">
					<?php	
						$sem=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
						while($s=mysqli_fetch_array($sem))
						{
						$s_id=$s[0];
					?>
					<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['sem_id']){echo "selected";} ?>>
						<?php echo $s[1]; ?>
					</option>
					<?php
						}
					?>
				</select>
			  </div>
		  </div>
	  </div>
	  <div class="row">
		  <div class="col-sm">
			<div class="form-group">
				<label for="">Select Lecturer</label>
				<select name="t" id="teacher" class="form-control"/>
					<option disabled selected >Select Lecturer</option>
						<?php
							$sub=mysqli_query($con,"select * from teacher where department_id='".$res['department_id']."'");
							while($s=mysqli_fetch_array($sub))
							{
								$s_id=$s[0];
						?>
					<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['teacher_id']){echo "selected";} ?>>
						<?php echo $s[1]; ?>
					</option>
					<?php
						}
					?>
				</select>
			 </div>
		  </div>
		  <div class="col-sm">
			<div class="form-group">
				<label for="">Course Title</label>
				<input type="text" name="subname" class="form-control" placeholder="Enter Course Title" value="<?php echo $res['subject_name'];?>"/>
			</div>
		  </div>
	  </div>
	  <div class="row">
		  <div class="col-sm">
			 <div class="form-group">
				<label for="">Course Code</label>
				<input type="text" class="form-control" name="course_code" id="code" placeholder="Enter Course Code" value="<?php echo $res['course_code'];?>"/> 
			 </div>
		  </div>
		  <div class="col-sm">
			  <div class="form-group">
				<label for="">Select Type</label>
				<select name="type" id="type" class="form-control" value="<?php echo $res['type']; ?>">
					<option value="" selected disabled>Select Level </option>
					<option value="lecture">Lecture</option>
					<option value="lab">Lab</option>
				</select>
			  </div>
		  </div>
	  </div>
	  <div class="form-group">
		  <label for="">Course Duration</label>
		  <input type="number" class="form-control" id="duration" placeholder="Enter Course Duration" value="<?php echo $res['course_duration'] ?>"/>
	  </div>
  </div>

    <!-- <th width="237" scope="row">Type </th>
    <td width="213">
		<input class="form-check-input" type="radio" name="type" value="Theory" <?php //echo ($res['type'] === "Theory") ? "checked" : "" ?> >
  		<label class="form-check-label" for="Theory">Theory</label>
		<input class="form-check-input" type="radio" name="type" value="Lab" <?php //echo ($res['type'] === "Lab") ? "checked" : "" ?>>
  		<label class="form-check-label" for="Lab">Lab</label>	  
	</td> -->
	<div class="container">
		<div class="form-group">
			<input type="submit" value="Update Records" name="update" class="btn btn-success"/>
		</div>
	</div>
    <th colspan="2" scope="row" align="center">

	</th>
  </tr>
</table>
</form>

</div>
</div>

