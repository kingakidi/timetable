<?php 
include('./config.php');
$department_id=$_REQUEST['department_id'];
$q=mysqli_query($con,"select * from department where department_id='$department_id'");
$res=mysqli_fetch_assoc($q);
extract($_POST);
if(isset($update))
{	 

	mysqli_query($con,"update department set department_name='$c' where department_id='$department_id' ");
	
	$err= "<span class='text-success'>Level Updated Successfully</span>";
	
	}
	


?>
<div class="container">
  <div class="row">
    <div class="col-md-5">
      <h2>Update Level</h2>
        <form method="POST" enctype="multipart/form-data">
          <?php echo @$err; ?>
            <div class="container">
              <div class="form-group">
                <label for="">Level Name</label>
                <input type="text" name="c" class="form-control" value="<?php echo $res['department_name'];?>"/>
              </div>
            </div>
            <div class="container">
              <div class="form-group">
                <input type="submit" value="Update Records" name="update" class="btn btn-success"/>
              </div>
            </div>
          </form>
      </div>
    </div>
               
                