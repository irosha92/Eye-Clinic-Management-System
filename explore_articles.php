
<!doctype html>
<html>
<head>
    <title>Eye Clinic</title>
    <link href="styles/generic.css" rel="stylesheet" type="text/css" />

    <link href="styles/explore_articles.css" rel="stylesheet" type="text/css">

    <link href="theme/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="theme/8/js-image-slider.js" type="text/javascript"></script>
    <link href="theme/8/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="theme/8/tooltip.js" type="text/javascript"></script>

    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='images/image001" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet">


      <script src="bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
      <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>-->

    <script type="text/javascript">
        function appo(){
            window.alert("Please register as patient before make an appointment.");
        }
    </script>

</head>

<body>
<div id="wrapper" class="page-wrap">
    <header id="top">
        <h1><img src="images/image006.jpg">EYE CLINIC</h1>
        <h2>Better vision for a better life</h2>
        <?php
        require_once'core/init.php';

        global $error;
        global $fail;
        if (Session::exists('home')) {
            echo '<p>' . Session::flash('home') . '</p>';
        }

        $user=new User();
        if ($user->isLoggedIn()) {
            ?>


            <aside id="sidebar"><h3>You are logged in as <?php echo $user->data()->username; ?><br>
                    <a href="logout.php">logout</a></h3></aside>'


        <?php
        }else{
            if (Input::exists()) {
                if (Token::check(Input::get('token'))) {
                    $validate=new Validate();
                    $validation=$validate->check($_POST, array(
                        'username'=>array('required'=>true),
                        'password'=>array('required'=>true)
                    ));
                    if ($validation->passed()) {
                        $user=new User();
                        $login=$user->login(Input::get('username'),Input::get('password'));
                        if ($login) {
                            Redirect::to('index.php');
                        } else {
                            $fail= '<span style="color:red;font-size:16px;"><br> username or password incorrect </span>';
                        }
                    }
                    $error=$validation->errors();
                }
            }
            ?>


            <aside id="sidebar"><form action="" method="post">
                    <label>Username &nbsp: </label>
                    <input type="text" name="username" id="username" autocomplete="off" value="<?php if (!isset($fail)) echo Input::get('username'); ?>"> <?php if (isset($error['username']))  echo '<span style="color:red;font-size:16px;"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$error['username'].'</span>'; ?> <br>
                    <label>Password &nbsp&nbsp: </label>
                    <input type="password" name="password" id="password" autocomplete="off" value="<?php if (!isset($fail)) echo Input::get('password'); ?>"> <?php if (isset($error['password']))  echo '<span style="color:red;font-size:16px;"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$error['password'].'</span>'; ?> <br>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit" value="Login">
                    <a href="register.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegister</a>
                    <?php
                    echo $fail;

                    ?>
                </form></aside>




        <?php
        }
        ?>

        <div id="mainnav" class="nav-tabs-justified">
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul  class="nav nav-pills nav-justified">
                    <li><a  href="index.php">Home</a></li>


                    <li  class="dropdown">
                        <a  href="#" class="thispage" class="dropdown-toggle" data-toggle = "dropdown">Explore Eye  </a>
                        <ul class="dropdown-menu" >

                            <li><a href="explore_articles.php">Articles</a></li>
                            <li><a href="explore_videos.php">Videos</a></li>
                            <li><a href="explore_books.php">Books</a></li>
                        </ul>

                    </li>

                    <li><a  href="#">Doctors Info</a></li>
                    <li><a  <?php if ($user->isLoggedIn()) {
                            $_SESSION['username'] = $user->data()->username;
                            echo 'href="appointment.php"';
                        }else{
                            echo 'href="#"'.'onclick="appo()"';
                        }?> >New Appointment</a></li>
                    <li><a  href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </header>
<!-- side navigation for eye diseases -->

    <div id="nav1">
        <div id="nav2">

            <ul id="nav3">
                <p id="topic1"> Common eye diseases</p><br>
                <li><a href="#desc1">Main causes for visual impairment</a></li>
                <li><a href="#desc2">Cataract</a></li>
                <li><a href="#desc3">Onchocerciasis(river blindness)</a></li>
                <li><a href="#desc4">Childhood blindness</a></li>
                <li><a href="#desc5">Refractive errors and low vision</a></li>
                <li><a href="#desc6">Diabetic retinopathy</a></li>
                <li><a href="#desc7">Glaucoma</a></li>
                <li><a href="#desc8">Age related macular degeneration</a></li>
                <li><a href="#desc9">Corneal Opacities </a></li>
                <li><a href="#desc10">Genetic eye diseases </a></li>
            </ul>
        </div>
    </div>

   <!-- <div id="sliderFrame">
        <div id="slider">
            <img src="images/image001.jpg"  />
            <img src="images/image008.jpg"  />
            <img src="images/image009.jpg"  />
            <img src="images/image010.jpg"  />
            <img src="images/image011.jpg" />
        </div>

    </div>-->
    <div id="sliderFrame">
        <div id="slider">
            <img src="images/image001.jpg"  />
            <img src="images/image008.jpg"  />
            <img src="images/image009.jpg"  />
            <img src="images/image010.jpg"  />
            <img src="images/image011.jpg" />
        </div>
    </div>
<br>
    <!-- information on diseases -->
    <!-- causes-->

    <div id="text1" >

        <h3 id="desc1" class="page-header">1. Main causes for visual impairment</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_causes.txt", "r") or die("Ooops!! Couldn't open your file!");
        // Output one character until end-of-file
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <!-- cataract-->
    <div id="text1" >

        <h3 id="desc2" class="page-header">2. Cataract</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_cataract.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc3" class="page-header">3. Onchocerciasis(river blindness)</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_riverBlindness.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc4" class="page-header">4. Childhood Blindness</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_childBlindness.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc5" class="page-header">5. Refractive errors and low vision</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_refractive.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc6" class="page-header">6. Diabetic retinopathy</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_diabetic.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc7" class="page-header">7. Glaucoma</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_glaucoma.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc8" class="page-header">8. Age related macular degeneration</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_amd.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text1" >

        <h3 id="desc9" class="page-header">9. Corneal Opacities</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_corneal.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <div id="text2" >

        <h3 id="desc10" class="page-header">10. Genetic eye diseases</h3><br>
        <?php
        $desc = fopen("includes/textfiles/txt_genetic.txt", "r") or die("Ooops!! Couldn't open your file!");
        while(!feof($desc)) {
            echo fgetc($desc);
        }
        fclose($desc);
        ?>

    </div>
    <h3>Page information Source: http://www.who.int/blindness/causes/priority/en/</h3>
    <a href="#"><input style="color: #000000; background-color: #d3d3d3;border-color: #000000;border-collapse: collapse" type="button" value="Go to Top"></a>
</div>

<footer class="site-footer">&#169; All Rights Reserved Eye clinic CDMC sri lanka</footer>
</body>
</html>