<?php 
  include('./config.php');
  $teacher_id=$_REQUEST['teacher_id'];
  $q=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id='$teacher_id'");
  $res=mysqli_fetch_assoc($q);
  $name = ucwords($res['name']);
  extract($_POST);
  if(isset($update)){	
    if (!empty($n)) {
      $tUpdateQuery = mysqli_query($con,"UPDATE teacher SET teacher.name='$n' WHERE teacher_id=$teacher_id");
      if (!$tUpdateQuery) {
        die("UNABLE TO UPDATE LECTURER NAME ");
      }else{
        $err= "<span class='text-success'>Lecturer updated Successfully</span>";
      }
      
    }else{
      $err= "<span class='text-danger'>Lecturer Name can't be empty </span>";
    }
	 
	
	}
	
?>
<!-- <div class="row">
  <div class="col-sm">  -->
    <h2>Update Lecturer</h2>
    <form method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
                <label for="">Lecturer</label>
                <input type="text" name="n" class="form-control" value="<?php echo $name;?>"/>
          </div>
        </div>
        <div class="col-sm"></div>
      </div>
      <div class="show-status"> <?php echo @$err; ?> </div>
      <div class="form-group">
        <input type="submit" value="Update Records" name="update" class="btn btn-success"/>
      </div>
    </div>
    
</form>

               
                