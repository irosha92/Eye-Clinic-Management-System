
<!doctype html>
<html>
<head>
    <title>Eye Clinic</title>
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <link href="styles/explore_articles.css" rel="stylesheet" type="text/css">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet">


      <script src="bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
      <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>-->

    <script type="text/javascript">
        function appo(){
            window.alert("Please register as patient before make an appointment.");
        }
    </script>
    <script type="text/javascript" src="javaScripts/dropdown.js"></script>
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
                <ul class="nav nav-pills nav-justified">
                    <li><a  href="index.php" class="thispage">Home</a></li>


                    <li  class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle = "dropdown">Explore Eye  </a>
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


</div>
<footer class="site-footer">&#169; All Rights Reserved Eye clinic CDMC sri lanka</footer>
</body>
</html>