<option value="" selected="selected" disabled="disabled">Select Lecturer</option>
<?php 
include('./config.php');
$q=mysqli_query($con,"SELECT * from  teacher");
//where teacher_id='".$_GET['id']."'
while($res=mysqli_fetch_assoc($q))
{
echo "<option value='".$res['teacher_id']."'>".$res['name']."</option>";
				
}
?>