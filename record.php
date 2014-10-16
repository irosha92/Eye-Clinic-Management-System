<?php
/**
 * Created by PhpStorm.
 * User: Nish
 * Date: 9/29/14
 * Time: 2:58 PM
 */

    require_once'core/init.php';

?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Eye Clinic</title>

    <link href="styles/record.css" rel="stylesheet" type="text/css">
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
        $(document).ready(function () {
            $("#dialog").dialog({ autoOpen: false });

            $("#btnOpenMe").click(
                function () {
                    $("#dialog").dialog('open');
                    return false;
                }
            );
        });
    </script>


</head>


<body>
<div id="wrapper" class="page-wrap">
    <header id="top">
        <h1><img src="images/image006.jpg" style="width: 60px;height: 56px;border-radius: 40px;">EYE CLINIC<span style="color:darkblue;font-weight: bold;font-size:16px;float:right;"><br>
                Go to <a href="index.php">Home</a> page</span></h1>
        <h2>Better vision for a better life</h2>
        &nbsp
        <nav id="mainnav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Explore eye</a></li>
                <li><a href="#">Doctors info</a></li>
                <li><a href="appointment.php" class="thispage">New Appointment</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <hr>
    <div>&nbsp
    <h3>Patient Record</h3>
    </div>
    <br>
    <div id="patient">

<!--        <p>--><?php //echo($pname)?><!--</p>-->
<!--        <p>--><?php //echo($padd)?><!--</p><br>-->
    </div>
    <div id="recordForm">
        <span class="form" style="float: left">
            <form  id="rec1" class="form" action="record_process.php" method="post">
                <label class="number">Patient ID &nbsp</label> <input  type="number" name="rc_patID" value="" placeholder="Search ID">&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="text">Name  &nbsp </label><input id="name" type="text" name="name" value="" placeholder="Enter name"><br><br>
                <label class="number"</label>Age  &nbsp</label><input type="number" name="age" value=""placeholder="Enter age" ><br><br>
                <label >Gender  &nbsp&nbsp
                    <input type="radio" name="gender"  value=""> Male
                    <input type="radio" name="gender" value=""> Female
                </label><br><br>
                <input id="submit1" type="submit" value="Submit"  >
                <input id="cancel1" type="button" value="Cancel" >
            </form>

        </span>

        <span id="rec2" style="float: right">
            <form  id="rec2" class="form" action="record_process.php" method="post">
                <label class="number">Patient ID &nbsp</label> <input  type="number" name="rc_patID" value="" placeholder="Search ID">&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="text">Name  &nbsp </label><input id="name" type="text" name="name" value="" placeholder="Enter name"><br><br>
                <label class="number"</label>Age  &nbsp</label><input type="number" name="age" value=""placeholder="Enter age" ><br><br>
                <label >Gender  &nbsp&nbsp
                    <input type="radio" name="gender"  value=""> Male
                    <input type="radio" name="gender" value=""> Female
                </label><br><br>
                <input id="submit1" type="submit" value="Submit"  >
                <input id="cancel1" type="button" value="Cancel" >
            </form>
            <br>
        </span>

        <span class="form" style="float: left">
        <form id="rec2" class="form" action="record_process.php" method="post">
            <label class="text">Medicine Name</label>
            <input  type="text" name="rc_med" value="" >
            <label class="number">Days</label>
            <input  type="number" name="rc_med" value="" ><br><br>

            <div class="btn-group">

                <label class="text">Dose</label>


                <select>
                    <option value="dose0"  selected> </option>
                    <option value="dose1">1/2*1</option>
                    <option value="dose2">1/2*2</option>
                    <option value="dose3">1/2*3</option>
                    <option value="dose4" >1/2*4</option>
                    <option value="dose1">1*1</option>
                    <option value="dose2">1*2</option>
                    <option value="dose3">1*3</option>
                    <option value="dose4" >1*4</option>
                    <option value="dose1">1.5*1</option>
                    <option value="dose2">1.5*2</option>
                    <option value="dose3">1.5*3</option>
                    <option value="dose4" >1.5*4</option>
                    <option value="dose1">2*1</option>
                    <option value="dose2">2*2</option>
                    <option value="dose3">2*3</option>
                    <option value="dose4" >2*4</option>
                    <option value="dose1">2.5*1</option>
                    <option value="dose2">2.5*2</option>
                    <option value="dose3">2.5*3</option>
                    <option value="dose4" >2.5*4</option>
                    <option value="dose1">3*1</option>
                    <option value="dose2">3*2</option>
                    <option value="dose3">3*3</option>
                    <option value="dose4" >3*4</option>
                </select>
                <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <input type="text" name="dose" value=""                  <li role="presentation" >1/2*1 </li>
                    <li role="presentation">1/2*2 </li>
                    <li role="presentation">1/2*3 </li>
                    <li role="presentation">1/2*4 </li>
                    <li role="presentation">1.5*1 </li>
                    <li role="presentation">1.5*2 </li>
                    <li role="presentation">1.5*3 </li>
                    <li role="presentation">1.5*4 </li>
                    <li role="presentation"> 2*1 </li>
                    <li role="presentation">2*2 </li>
                    <li role="presentation">2*3 </li>
                    <li role="presentation">2*4 </li>
                    <li role="presentation">2.5*1 </li>
                    <li  role="presentation">2.5*2 </li>
                    <li role="presentation">2.5*3 </li>
                    <li  role="presentation">2.5*4 </li>
                    <li  role="presentation">3*1 </li>
                    <li role="presentation">3*2 </li>
                    <li role="presentation"> 3*3 </li>
                    <li  role="presentation">3*4 </li>
                    <li  role="presentation"> <input type="text" name="dose2" value="Other"></li>


                </ul>-->
            </div><br>
            <table id="tb_medi" >
                <tr>
                    <th id="row1">Medicine</th>
                    <th id="row1">Days</th>
                    <th id="row1"> Dose</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th> <button type="button" name="med_btn" value="Delete" </th>
                </tr>

            </table>

        </form>
        </span>


    </div>






</div>







</body>
</html>