<?php 
include('./config.php');
$sem_id=$_REQUEST['sem_id'];

$q=mysqli_query($con, "SELECT * FROM semester WHERE sem_id='$sem_id'");
$res=mysqli_fetch_assoc($q);
extract($_POST);
if(isset($update))
{	
 

	mysqli_query($con,"UPDATE semester SET semester_name='$s', department_id='$dep_id' WHERE sem_id='$sem_id' ");
	
	$err= "<span class='text-success'>Semester Updated Successfully</span>";
	
	}
	
?>
<h2>Update Semester</h2>
<form method="POST" enctype="multipart/form-data">
  <?php echo @$err; ?>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="">Select Level</label>
          <select name="dep_id" id="courseid" onchange="showSemester(this.value)" class="form-control">
            <?php
                  $sub=mysqli_query($con,"select * from department");
                  while($s=mysqli_fetch_array($sub))
                  {
                    $s_id=$s[0];
            ?>
            <option value='<?php echo $s_id; ?>' <?php if($s_id==$res['department_id']){echo "selected";} ?>>
              <?php echo $s[1];?>
            </option>
            <?php 	}
    
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="">Semester Name</label>
          <input type="text" name="s" class="form-control" value="<?php echo $res['semester_name'];?>"/>
        </div>
      </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Update Records" name="update" class="btn btn-success"/>
    </div>
  </div>
</form>    
                
                   