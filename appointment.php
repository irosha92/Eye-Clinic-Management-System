<?php
/**
 * Created by PhpStorm.
 * User: Irosha
 * Date: 9/15/14
 * Time: 9:33 PM
 */

    require_once'core/init.php';

?>
<?php

$docErr = $typeErr = $dateErr = $timeErr = "";
$doc = $type = $date = $time = "";

if(isset($_POST['submit'])){

    if(isset($_POST['doctor'])){
        if($_POST['doctor']==""){
            $docErr = "Select a doctor";
        }else{
        $doc = $_POST['doctor'];
        }
    }
    if(!isset($_POST['app_type'])){
        $typeErr = "Select the type";
    }else{
        $type = $_POST['app_type'];
    }
    if(isset($_POST['date'])){
        if($_POST['date']==""){
            $dateErr = "Date is required.";
        }else{
            $date = $_POST['date'];
        }
    }
    if(isset($_POST['Time'])){
        if($_POST['Time']==""){
            $timeErr = "Select a time.";
        }else{
            if($_POST['Time']=="10.00 AM"){
                $time = '10:00:00';
            }else if($_POST['Time']=="02.00 PM"){
                $time = '14:00:00';
            }
        }
    }
    if($docErr == "" && $typeErr == "" && $dateErr == "" && $timeErr == ""){

    ?>

        <form action="appointment_process.php" method="post" id="sendToAppPro">
            <input type="hidden" name="doc" value="<?php echo $doc;?>">
            <input type="hidden" name="type" value="<?php echo $type;?>">
            <input type="hidden" name="date" value="<?php echo $date;?>">
            <input type="hidden" name="time" value="<?php echo $time;?>">
        </form>
        <script>
            document.getElementById("sendToAppPro").submit();
        </script>
        <?php
        //Redirect::to('appointment_process.php');
    }
}
?>





<!doctype html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Eye Clinic</title>

    <link href="styles/appointment.css" rel="stylesheet" type="text/css">
    <script src="javaScripts/jqueryCalendar/jquery-1.6.2.min.js"></script>
    <script src="javaScripts/jqueryCalendar/jquery-ui-1.8.15.custom.min.js"></script>
    <link rel="stylesheet" href="javaScripts/jqueryCalendar/jqueryCalendar.css">

    <script src="jquery-1.10.2.js"></script>
    <script src="jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">




    <script>
        jQuery(function() {
            jQuery( "#date_field" ).datepicker();
        });
    </script>

    <script type="text/javascript">
        document.getElementById("button").addEventListener('click', function () {
            var text = document.getElementById('text');
            text.text = (text.text + ' after clicking');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#dialog").dialog({ autoOpen: false });

            $("#btnOpenMe").click(
                function () {
                    $("#dialog").dialog('open');
                    return false;
                }
            );

            $('#am10').click(
                function () {
                    var tx = $('#time');
                    var bt = $('#am10');
                    tx.val(bt.val());
                    $("#dialog").dialog('close');
                    return false;
                }
            );

            $('#pm2').click(
                function () {
                    var tx = $('#time');
                    var bt = $('#pm2');
                    tx.val(bt.val());
                    $("#dialog").dialog('close');
                    return false;
                }
            );

            $('#c').click(
                function () {
                    $("#dialog").dialog('open');
                    return false;
                }
            );
        });


    </script>
    <style>
        .err{
            color: red;
        }
    </style>


</head>


<body>
    <div id="wrapper" class="page-wrap">
        <header id="top">
            <h1><img src="images/image006.jpg" style="width: 60px;height: 56px;border-radius: 40px;">EYE CLINIC</h1>
            <h2>Better vision for a better life</h2>

            <?php
            $user=new User();
            if ($user->isLoggedIn()) {
            ?>

            <aside id="sidebar"><h3 style="color: steelblue;">You are logged in as <b><?php echo $user->data()->username; ?></b><br>
                    <a href="logout.php">logout</a></h3></aside>'

            <?php
            }
            ?>

            &nbsp
            <div id="mainnav" class="nav-tabs-justified">
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul  class="nav nav-pills nav-justified">
                        <li><a  href="index.php">Home</a></li>


                        <li  class="dropdown">
                            <a  href="#" class="dropdown-toggle" data-toggle = "dropdown">Explore Eye  </a>
                            <ul class="dropdown-menu" >

                                <li><a href="explore_articles.php">Articles</a></li>
                                <li><a href="explore_videos.php">Videos</a></li>
                                <li><a href="explore_books.php">Books</a></li>
                            </ul>

                        </li>

                        <li><a  href="#">Doctors Info</a></li>
                        <li><a  href="appointment.php" class="thispage">New Appointment</a></li>
                        <li><a  href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>

        </header>

        <hr>
        <div>
        <h3 style="color: midnightblue; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;
            font-size: xx-large;">MAKE AN APPOINTMENT</h3>
        </div>
        <br>
        <div id="patient">
            <?php
            $gotTime = "10.00-3.00";
            $fname = $user->getFullName();
            $pName = "Patient Name : {$fname}";
            //$pAdd = "Address      :124/Dewala para,Kadawatha.";
            ?>
            <p><b><?php echo($pName)?></b><span style="float: right; margin-right: 20px;"><input type="button" value="Manage your appointments"></span></p>

        </div>
        <br>
        <div id="appointmentForm" style="margin-bottom: 50px">
            <P CLASS="err">* Required Fields</P>

            <form onsubmit="document.this.doctor.value=''; document.this.date.value='';" style="border-style: solid;border-color: #4A7CAB;border-radius: 20px;padding-top: 30px;padding-bottom: 30px;padding-left: 30px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label>Select Doctor :</label>  <select name="doctor" onm>
                    <option value="" <?php if (isset($_POST['doctor']) && $_POST['doctor']=="") {echo "selected='selected'"; } ?>></option>
                    <option value="daham" <?php if (isset($_POST['doctor']) && $_POST['doctor']=="daham") {echo "selected='selected'"; } ?>>Dr.Daham Perera</option>
                    <option value="sanath" <?php if (isset($_POST['doctor']) && $_POST['doctor']=="sanath") {echo "selected='selected'"; } ?>>Dr.Sanath Gunathilaka</option>
                    <option value="anuja" <?php if (isset($_POST['doctor']) && $_POST['doctor']=="anuja") {echo "selected='selected'"; } ?>>Dr.Anuja Silva</option>
                </select><span class="err"> * <?php echo $docErr;?></span><br><br>
                <label>Appointment Type :</label><input type="radio" name="app_type" value="appointment" style="margin-left: 5px"><?php echo("Appontment")?>
                <input type="radio" name="app_type" value="personal_meeting"><?php echo("Personal Meeting")?><span class="err"> * <?php echo $typeErr;?></span><br><br>

                <label>Select Date :</label><input type="text" name="date" id="date_field" value="<?php echo $date?>"><img id="myimage" style="height:20px;width:25px;margin-top: 0px;
	margin-bottom: -5px;margin-left: 5px;" src="images/calendar.jpg"><span class="err"> * <?php echo $dateErr;?></span><br><br>
                <label>Select Time :</label><input type="text" id="time" name="Time" value="<?php echo $time?>" readonly><input type="button" id="btnOpenMe" value="Time Slots" style="margin-left: 7px"><span class="err"> * <?php echo $timeErr;?></span><br><br>

                <input type="submit" name="submit" value="Submit" id="cn" style="margin-left: 750px"><input type="reset" value="Cancel" >
            </form>
        </div>
        <div>
            &nbsp
        </div>
    </div>

    <div id="dialog" title="Available Time Slots" style="align-content: center">
        <span style="align-content: center">
        <input type="button" id="am10" value="10.00 AM"><br><input type="button" id="pm2" value="02.00 PM">
        </span>
    </div>




    <footer class="site-footer">&#169; All Rights Reserved Eye clinic CDMC sri lanka</footer>
</body>
</html>