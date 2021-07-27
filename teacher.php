<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deleteteacher.php?teacher_id="+id;
		}
	
	}
</script>

<?php 
include('./config.php');

echo "<table border='1' class='table'>";

echo "<tr class='danger'><th colspan='11'><a href='?info=add_teacher'>Add New</a></th></tr>";

echo "<tr>
		<th>Teacher Id</th>
		<th>Teacher Name</th>
		
		<th>Update</th>
		<th>Delete</th>
	</tr>";

	$que=mysqli_query($con,"select *  from teacher");
	$sn=1;
	while($res=mysqli_fetch_array($que)){
		$teacher_name = ucwords($res['name']);
		$teacher_id = $res['teacher_id'];
	echo "<tr>";
	echo "<td> $sn </td>" ;
	echo "<td> $teacher_name </td>" ;
	
	
	
	echo "<td><a href=' ?info=updateteacher&teacher_id=$teacher_id'>Update</a></td>";
	?>
    
	<td><a href='javascript:deleteData("<?php echo  $teacher_id;?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	$sn++;
	}
	
echo "</table>";	

?>
