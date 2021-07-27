<?php 
include('./config.php');
include("timetablegen1.php");
extract($_POST);


if(isset($generate) || isset($regenerate))
{

  $_GET['generated'] = "true";
	
}
else{
  $_GET['generated'] = "";
}

?>

<script>
    function showSubject(str) {
    if (str=="")  {
      // document.getElementById("txtHint").innerHTML="";
      return;
    }

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }



    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      // document.getElementById("subject").innerHTML=xmlhttp.responseText;
      }
    }
  
      xmlhttp.open("GET","subject_ajax.php?id="+str,true);
      xmlhttp.send();
    }
    
    function showSemester(str) {
    if (str==""){
      // document.getElementById("txtHint").innerHTML="";
      return;
    }

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
    else {
      // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }



  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("semester").innerHTML=xmlhttp.responseText;
    }
  }
  //alert(str);
    xmlhttp.open("GET","semester_ajax.php?id="+str,true);
    xmlhttp.send();
  }
</script>


<div class="row">
<div class="col-sm-12">
<h2>Generate Time Table</h2>
<form method="POST" enctype="multipart/form-data" id="form-generate">
 
   <div class="form-group">
   <label for="courseid">Select Department</label> 
    <select name="courseid" class="form-control" onchange="showSemester(this.value)" id="courseid">
      <option disabled selected >Select Department</option>
        <?php 
          $dep=mysqli_query($con,"select * from department");
          
          while($dp=mysqli_fetch_array($dep))        {
            $dp_id=$dp[0];
            echo "<option value='$dp_id'>".$dp[1]."</option>";
          }
        ?>
      </select>
   </div>
    
   <div class="form-group">
        <label for="semester">Select Semester</label>
        <select name="s" id="semester" onchange="showSubject(this.value)" class="form-control"/>
        <option disabled selected >Select Semester</option>
    
 	      </select>
   </div>
   <div class="form-group">
        <input type="submit" value="Generate Time Table" id="generate" name="generate" class="btn btn-success" /> 
   </div>
   <div class="show-status" id="show-status">

   </div>
	
  <?php
    //  if($_GET['generated']){
  ?>
  <!-- <tr>
	<td> -->
	<!-- <input type="submit" value="Regenerate" name="regenerate" class="btn btn-primary" /> -->
	<!-- </td>
	<td class="text-right"> -->
	<!-- <input type="submit" value="Save" name="save" class="btn btn-primary text-right" /> -->
	<!-- </td>
  </tr> -->
  <?php
    //  }
  ?>

  <!-- </table> -->
  </form>
  </div>
  </div>
<div>
<?php 
  
  // if($_GET['generated']){

  
  //   $weekTimeTable = generate_time_table($con, $courseid, $s);
    
  
      
  //   }

?>
<script>
  let formGenerate = document.getElementById('form-generate')
  let courseid = document.getElementById('courseid');
  let semesterid = document.getElementById('semester');
  let showStatus = document.getElementById('show-status')
  formGenerate.onsubmit = function (event) {
    event.preventDefault();
    $.ajax({
      url: "./timetablegen1.php", 
      method: "POST",
      data: {
        courseid: courseid.value, 
        semesterid: semesterid.value, 
        generateTimeTable: true
      }, 
      success: function (data) {
        showStatus.innerHTML = data
      }
    })

  }
</script>
</div>