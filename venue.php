<?php include('./config.php');  ?>
    <form action="" method="POST">
        <div class="container">
            <div class="form-group">
                <label for="">VENUE</label>
                <input type="text" name="venue" class="form-control" placeholder="Enter a venue" required>
            </div>
            <div class="show-status container text-center" id="show-status">
                <?php
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
                    if (isset($_POST['add_venue'])) {
                        $venue = mysqli_real_escape_string($con, $_POST['venue']);
                        if (!empty($venue)) {
                            // CHECK FOR VENUE EXISTENCE 
                            $cVenue = mysqli_query($con, "SELECT * FROM venue WHERE venue.name = '$venue'");
                            if (!$cVenue) {
                                die(error("UNABLE TO VERIFY VENUE ".mysqli_error($con)));
                            }else{
                                if (mysqli_num_rows($cVenue) > 0) {
                                    echo error("VENUE ALREDY EXIST");
                                }else{
                                    $venueQuery = $con->query("INSERT INTO `venue`( `name`) VALUES ('$venue')");
                                    if (!$venueQuery) {
                                        die(error("UNABLE TO ADD VENUE"));
                                    }else{
                                        echo success("Venue Added Successfully");
                                    }
                                }
                            }
                        }else{
                            echo error("ALL FIELD(S) REQUIRED ");
                        }
                    }
                
                ?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="add_venue" value="Add Venue">
                <input type="reset" class="btn btn-success">
            </div>
        </div>
    </form>
    



