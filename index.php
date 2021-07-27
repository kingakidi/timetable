<?php 
session_start();
include('./config.php');
if($_SESSION['admin']=="")
{
$que=mysqli_query($con,"select * from admin where  user_name='".$_SESSION['admin']."'");
$res=mysqli_fetch_array($que);
$_SESSION=$res;
}
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Timetable Generator</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./css/morris.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./css/admindashboard.css"
    />

    <!-- <link
      rel="stylesheet"
      href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
    /> -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./css/bootstrap-material-design.min.css" /> -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <style>
      /* Make the image fully responsive */
      .carousel-inner img {
        width: 100%;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light text-white bg-primary">
      <span class="navbar-brand text-white d-flex ml-5" href=""
         class="text-white">Timetable Generator</a
      >
      
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group list-group-flush mt-3" id="navbarNavDropdown">
            <a href="index.php" class="list-group-item active">
              <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
            <a
              href="?info=course"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearanceform"
            >
              <i class="fab fa-wpforms"></i>
              Level
            </a>
            <a
              href="?info=semester"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Semester
            </a>
            <a
              href="?info=subject"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Courses
            </a>
            <a
              href="?info=venue"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Venue
            </a>
            <a
              href="?info=teacher"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Lecturer
            </a>

            <a
              href="?info=add_timetable"
              class="list-group-item list-group-item-action sidebar-action"
              id="clearancestatus"
            >
              <i class="far fa-clipboard"></i>
              Timetable
            </a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="show-main" id="show-main" >
            <?php 
              @$info=$_REQUEST['info'];
              if($info!="")
              {
              if($info=="course")
              {
                include('course.php');
                }
              elseif($info=="semester")
              {
                include('semester.php');
                }
              elseif($info=="subject")
              {
                include('subject.php');
                }
                
              elseif($info=="student")
              {
                include('student.php');
                }
              elseif($info=="teacher")
              {
                include('teacher.php');
                }
              elseif($info=="timetable")
              {
                include('timetable.php');
                }
                
              elseif($info=="add_course")
              {
                include('add_course.php');
                }
                
              elseif($info=="add_subject")
              {
                include('add_subject.php');
                }
                
              elseif($info=="add_semester")
              {
                include('add_semester.php');
                }
                
              elseif($info=="add_teacher")
              {
                include('add_teacher.php');
                }
                
              elseif($info=="add_student")
              {
                include('add_student.php');
                }
                
                
              elseif($info=="add_timetable")
              {
                include('add_timetable.php');
                }
  
              elseif($info=="updatecourse")
              {
                include('updatecourse.php');
                }
            
              elseif($info=="updatesemester")
              {
                include('updatesemester.php');
                }
  
              elseif($info=="updatesubject")
              {
                include('updatesubject.php');
                }					 
                
              elseif($info=="updatestudent")
              {
                include('updatestudent.php');
                }
  
              elseif($info=="updateteacher"){
                include('updateteacher.php');
                
              }elseif ($info=="venue") {
                include('venue.php');
              }elseif($info=="updatetimetable")						{
                include('update_timetable.php');
                }
                
              }else
              {
            ?>

            Timetable Dashboard<br />
            <img
              src="img/online-practice-exams.jpg"
              class="img-responsive"
              alt="Cinque Terre"
              width="500"
              height="500"
              style="                          margin-top: 70px; margin-left: 23px;"
            />
            <?php }?>
          </div>
        </div>
      </div>
    </div>

    <!-- <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap-material-design.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/morris.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/function.js"></script>
    <script src="./myjs/dashboard.js"></script> -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
