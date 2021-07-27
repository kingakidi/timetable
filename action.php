<?php
    include "./config.php";
    function clean($var){
        global $con;
        return mysqli_real_escape_string($con, $var);
    }
    function error($var)
    {
        return "<span class='text-danger'>$var</span>";
    }
    function success($var)
    {
        return "<span class='text-success'>$var</span>";
    }

    function white($var)
    {
        return "<span class='text-white'>$var</span>";
    }
    if (isset($_POST['registerCourse'])) {
        extract($_POST);
        // CLEAN THE DATA, 
        $department = clean($department);
        $semester = clean($semester);
        $lecturer = clean($lecturer);
        $title = trim(strtolower(clean($title)));
        $code = trim(strtolower(clean($code)));
        $type = clean($type);
        $duration = clean($duration);
        // echo "$title $code";
        // CHECK FOR IT AVAILABILITY \
        $cQuery = $con->query("SELECT * FROM subject WHERE (subject_name='$title' AND course_code='$code') AND department_id=$department");
        if (!$cQuery) {
            die(error("UNABLE TO CHECK COURSE ").$con->error);
        }else{
           
            if (mysqli_num_rows($cQuery) > 0) {
                
                echo error("Course Already Registered for this department");
            }else{
                // SEND COURSE INTO DB
                $sql = "INSERT INTO `subject`(`subject_name`, `sem_id`, `department_id`, `lecturer_id`, `course_duration`, `course_code`, type) 
                VALUES ('$title', $semester, $department, $lecturer, $duration, '$code', '$type')";
                
                $sQuery = $con->query($sql);
                if (!$sQuery) {
                    die(error("Failed to add course ").$con->error);
                     
                }else{
                    echo success('Course Registered Successfully'); 
                }
            }
        }


        // SEND IF NOT AVAILABLE
    }

?>