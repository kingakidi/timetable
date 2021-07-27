<?php

	
	$conn = mysqli_connect('localhost', 'root', '', 'timetable');
	if (!$conn) {
		die("CONNECTION FAILED ");
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
    
	if (isset($_POST['generateTimeTable'])) {
        $sem_id = (int)$_POST['semesterid']; 
        $department_id = (int)$_POST['courseid'];
        // echo $sem_id . " ".$department_id;
        $getCourseQuery = $conn->query("SELECT * FROM timetable.subject WHERE department_id = $department_id AND sem_id = $sem_id");
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
    
            echo '<div class=" mt-3">
                <table class="table table-bordered table-responsive">
                    <tr>';
                        
                     
                            while ($i < count($timestamp)) {
                                echo "<th> $timestamp[$i] </th>";
                                $i++;
                            }
                    
                    echo "</tr>";
                    
                
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
                                        $title = ucwords( $thisCourses[$a]['course_title']); 
                                        $code = strtoupper($thisCourses[$a]['course_code']);
                                        $course_duration = $thisCourses[$a]['course_duration'];
                                        $lecturer_id = $thisCourses[$a]['lecturer_id'];
                                        $lecturer_name = lectureName($lecturer_id);
                                        $type = ucwords($thisCourses[$a]['type']);
                                        
                                        echo "<td colspan=$course_duration class='text-center'>$title <br> ($code)  <br> ". ucwords($lecturer_name) . "<br>".  $type ."</td>";
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
                echo "</table>
                </div>";
    }
        ?>


	