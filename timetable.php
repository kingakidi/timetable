<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Time Table</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
	
</body>
</html>

<?php
	
	$conn = mysqli_connect('localhost', 'root', '', 'timetable');
	if (!$conn) {
		die("CONNECTION FAILED ".$conn->error);
	}
	function lectureName($id){
		global $conn; 
		$query = $conn->query("SELECT * FROM teacher WHERE teacher_id = $id"); 
		if (!$query) {
			die(" UNABLE TO GET LECTURER ".$conn->error);
		}else{
			$row = mysqli_fetch_assoc($query);
			return $row['name'];
		}
	}

	// GET THE COURSES 
	$getCourseQuery = $conn->query("SELECT * FROM timetable.subject WHERE department_id = 1 AND sem_id = 1");
	if (!$getCourseQuery) {
		die("UNABLE TO GET SUBJECT AT THE MOMENT ".$conn->error);
	}else{
		if (mysqli_num_rows($getCourseQuery) < 1) {
			echo "NO COURSES REGISTER ON THIS";
			exit();
		}else{
			$thisCourses = array();
			while ($row = mysqli_fetch_assoc($getCourseQuery)) {
				$course_id = $row['subject_id'];
				$course_title = $row['subject_name'];
				$course_duration = $row['course_duration'];
				$course_code = $row['course_code'];
				$type = $row['type'];
				$lecturer_id = $row['lecturer_id'];
				// ["course-$course_id"]
				$thisCourses[] = array(
					
					'course_code' => $course_code,
					'course_type' => $type, 
					'course_title' => $course_title,
					'lecturer_id' => $lecturer_id, 
					'course_duration' =>$course_duration,
					'type'=> $type 


			 	);
				// echo "$course_title $course_duration $course_code $type $lecturer_id <br>";
				
			}
			// echo "<pre>";
			// 	 	print_r(($thisCourses));
			// 	echo "</pre>";
			shuffle($thisCourses);
		}
	}



	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	$timestamp = ['Day/Time','8am - 9am', '9am-10am', '10am - 11am', '11am - 12pm', '12pm - 1pm', '1pm - 2pm', '2pm - 3pm', '3pm - 4pm', '4pm - 5pm', '5pm - 6pm'];

	$i = 0;
	?>
	<div class=" mt-3">
		<table class="table table-bordered table-responsive">
			<tr>
				
				<?php 
					while ($i < count($timestamp)) {
						echo "<th> $timestamp[$i] </th>";
						$i++;
					}
				?>
			</tr>
			
			<?php

				$j = 0;
				$a = 0;
				while ($j < count($days)) {
					echo "<tr>";
					// echo "<td>$days[$j]<td>";
					$k = 0;
					echo "<td>$days[$j]</td>";
					// PRINT ALL FOR TIMESTAM - 1 
					// PRINT FOR THE FIRST ROWS 
					
					while ($k < (count($timestamp) -1)) {
						if ($k === 5) {
							echo "<td></td>";
						}else{
							if ($a < count($thisCourses)) {
								// GET THE COURSE CODE HERE, THE DURATION, LECTURER AND TITLE 
								$title = $thisCourses[$a]['course_title']; 
								$code = $thisCourses[$a]['course_code'];
								$course_duration = $thisCourses[$a]['course_duration'];
								$lecturer_id = $thisCourses[$a]['lecturer_id'];
								$lecturer_name = lectureName($lecturer_id);
								$type = $thisCourses[$a]['type'];

								
								echo "<td colspan=$course_duration>$title $code $lecturer_name $type</td>";
							}else{
								echo "<td> - </td>";
							}
							
						}
						
						

						if ($a < count($thisCourses)) {
							$k +=$course_duration;
						}else{
							$k++;
						}
						$a++;
					
						
					}
					echo "</tr>";
					$j++;
					

				}
				
			
			?>
			
			
		</table>
	</div>


	