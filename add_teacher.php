<?php 
include('./config.php');
extract($_POST);

if(isset($n)){
  $n = trim(strtolower(mysqli_real_escape_string($con, $n)));

  // CHECK EMPTY 
  if (!empty($n)) {
    $que=mysqli_query($con,"SELECT * FROM teacher WHERE teacher.name='$n'");	

    if (!$que) {
      die("UNABLE TO VERIFY LECTURER DETAILS ");
    }else{
      if (mysqli_num_rows($que) > 0) {
        $err =  "<span class='text-danger'> LECTURER ALREADY EXIST!</span>";
       
      }else{
        $lQuery = $con->query("INSERT INTO teacher (teacher.name) VALUES('$n')");
        if (!$lQuery) {
          die("FAILED TO ADD LECTURER ");
        }else{
          $err =  "<span class='text-success'> Lecturer Added Successfully </span>";
        }
      }
    }
  }else{
    $err = $err =  "<span class='text-danger'> ALL FIELDS REQUIRED </span>";
  }
  
  // $qArray = mysqli_fetch_assoc($que);
  // print_r($qArray);	
  // $row=mysqli_num_rows($que);
	// if($row > 0)	{
	//   $err="<font color='red'>This teacher already exists</font>";
	// }else{
   	
	//   $err="<font color='blue'>Lecturer Added Succesfully!!</font>";
	// }
	
}

?>


<h2>Add Lecturer</h2>
<form method="POST" enctype="multipart/form-data">
 
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="">Lecturer's Name</label>
          <input type="text" name="n" class="form-control" id="btn-course-form"  placeholder="Enter a Lecturer"/>
        </div>
      </div>
      <div class="col-sm"></div>
    </div>
    <div class="row">
      <div class="show-status" id="show-status"> <?php echo $err; ?></div>
      <div class="form-group mt-2">
        <input type="submit" class="btn btn-success" id="btn-course-form" value="Add Lecturer">
        <input type="reset" value="Reset" class="btn btn-success"/>
      </div>
    </div>
  </div>
</form>
