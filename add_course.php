<?php 
include('./config.php');
extract($_POST);
if(isset($save))
{
$que=mysqli_query($con,"select * from department where department_name='$c'");	
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>This Level already exists</font>";
	}
	else
	{
mysqli_query($con,"insert into department values(null,'$c')");	

	$err="<font color='blue'>Level added succesfully!!</font>";
	}
	
}

?>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <h2>Add Level</h2>
        <form method="POST" enctype="multipart/form-data">
          <?php echo @$err; ?>
            <div class="form-group">
              <label for="">Level Name</label>
              <input type="text" name="c" class="form-control"/>
            </div>
            <div class="form-group">
              <input type="submit" value="Add  Level" name="save" class="btn btn-success" />
              
              <input type="reset" value="Reset" class="btn btn-success"/>
            </div>
          </form>
    </div>
  </div>
</div>


