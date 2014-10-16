
<!doctype html>
<html>
<head>
    <title>Eye Clinic</title>
    <link href="styles/generic.css" rel="stylesheet" type="text/css" />

    <link href="styles/explore_videos.css" rel="stylesheet" type="text/css">

    <link href="theme/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="theme/8/js-image-slider.js" type="text/javascript"></script>
    <link href="theme/8/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="theme/8/tooltip.js" type="text/javascript"></script>

    <script type="text/javascript">
        imageSlider.thumbnailPreview(function (thumbIndex) { return "<img src='images/image001" + (thumbIndex + 1) + ".jpg' style='width:100px;height:60px;' />"; });
    </script>
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
    <div id="nav1">
        <div id="nav2">

            <ul id="nav3">
                <li id="topic"><a id="topic" href="#vdo1">##Common eye diseases##</a></li><br>

                <li><a href="#vdo1">Main causes for visual impairment</a></li>
                <li><a href="#vdo2">Cataract</a></li>
                <li><a href="#vdo3">Onchocerciasis(river blindness)</a></li>
                <li><a href="#vdo4">Childhood blindness</a></li>
                <li><a href="#vdo5">Refractive errors and low vision</a></li>
                <li><a href="#vdo6">Diabetic retinopathy</a></li>
                <li><a href="#vdo7">Glaucoma</a></li>
                <li><a href="#vdo8">Age related macular degeneration</a></li>
                <li><a href="#vdo9">Corneal Opacities </a></li>
                <li><a href="#vdo10">Genetic eye diseases </a></li><br>

                <li id="topic"><a id="topic" href="#operation">##Operations##</a></li><br>

                <li><a href="#vdo11">Cataract</a></li>
                <li><a href="#vdo12">Childhood Blindnes</a></li>
                <li><a href="#vdo13">Glaucoma</a></li>

            </ul>
        </div>
    </div>

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
    <div id="heading">
        <p style="font-size: 30px;color: darkblue ;margin-left: 400px "  >Watch and Know !!</p><br><hr><br>

        <div>
            <h2 id="vdo1" style="margin-left: 320px;color: darkblue;font-size: 20px">Main causes for visual impairment</h2><br><br>
            <p id="vdotext">To become a healthy person you will have to follow some regular habits.Meanwhile you will have to avoid or prevent exposing to some other facts.In here we will
                let you know what are the main causes for visual imapairments. Hope this will help you protect your eyes and good vision.<br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/LZZvJX02FqM " width="480" height="390" frameborder="0"></iframe></p>
        </div>
        <br><br>
        <div>
            <h2 id="vdo2" style="margin-left: 320px;color: darkblue;font-size: 20px">Cataract</h2><br><br>
            <p id="vdotext">Cataract is clouding of the lens of the eye which prevents clear vision. Although most cases of cataract are related to the ageing process, occasionally children
                can be born with the condition, or a cataract may develop after eye injuries, inflammation, and some other eye diseases.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/eeDvD5sYggw" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo3" style="margin-left: 320px;color: darkblue;font-size: 20px">Onchocerciasis(river blindness)</h2><br><br>
            <p id="vdotext">Cataract is clouding of the lens of the eye which prevents clear vision. Although most cases of cataract are related to the ageing process, occasionally children
                can be born with the condition, or a cataract may develop after eye injuries, inflammation, and some other eye diseases.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/QpVF9EnZFnw" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo4" style="margin-left: 320px;color: darkblue;font-size: 20px">Childhood blindness</h2><br><br>
            <p id="vdotext">Childhood blindness refers to a group of diseases and conditions occurring in childhood or early adolescence, which, if left untreated, result in blindness or
                severe visual impairment that are likely to be untreatable later in life. The major causes of blindness in children vary widely from region to region, being largely determined
                by socioeconomic development, and the availability of primary health care and eye care services. In high-income countries, lesions of the optic nerve and higher visual pathways
                predominate as the cause of blindness, while corneal scarring from measles, vitamin A deficiency, the use of harmful traditional eye remedies, ophthalmia neonatorum, and rubella
                cataract are the major causes in low-income countries. Retinopathy of prematurity is an important cause in middle-income countries. Other significant causes in all countries are
                congenital abnormalities, such as cataract, glaucoma, and hereditary retinal dystrophies.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/izd6m0h5LgM" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo5" style="margin-left: 320px;color: darkblue;font-size: 20px">Refractive errors and low vision</h2><br><br>
            <p id="vdotext">Refractive errors include myopia (short-sightedness), and hyperopia (long-sightedness) with or without astigmatism (when the eye can sharply image a straight line lying
                only in one meridian).
                <br><br>
                <b>For low vision</b>, the following two definitions are in use: <br><br>
                <b>*</b> (WHO) Low vision is visual acuity less than 6/18 and equal to or better than 3/60 in the better eye with best correction. <br>
                <b>*</b> (Low Vision Services or Care) a person with low vision is one who has impairment of visual functioning even after treatment and/or standard refractive correction, and has a visual
                acuity of less than 6/18 to light perception, or a visual field less than 10 degrees from the point of fixation, but who uses, or is potentially able to use, vision for the planning
                and/or execution of a task for which vision is essential.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/NpZI1eKiadg" width="480" height="390" frameborder="0"></iframe></p><br>
                <iframe style="margin-left: 320px" title="YouTube video player" src="http://www.youtube.com/embed/0lRSxxiFW9o" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo6" style="margin-left: 320px;color: darkblue;font-size: 20px">Diabetic retinopathy</h2><br><br>
            <p id="vdotext">Diabetic retinopathy is composed of a characteristic group of lesions found in the retina of individuals having had diabetes mellitus for several years. The abnormalities
                that characterise diabetic retinopathy occur in predictable progression with minor variations in the order of their appearance. Diabetic retinopathy is considered to be the result of
                vascular changes in the retinal circulation. In the early stages vascular occlusion and dilations occur. It progresses into a proliferative retinopathy with the growth of new blood
                vessels. Macular oedema (the thickening of the central part of the retina) can significantly decrease visual acuity.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/X17Q_RPUlYo" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo7" style="margin-left: 320px;color: darkblue;font-size: 20px">Glaucoma</h2><br><br>
            <p id="vdotext">Glaucoma can be regarded as a group of diseases that have as a common end-point a characteristic optic neuropathy which is determined by both structural change and
                functional deficit. The medical understanding of the nature of glaucoma has changed profoundly in the past few years and a precise comprehensive definition and diagnostic criteria are
                yet to be finalised. There are several types of glaucoma, however, the two most common are primary open angle glaucoma (POAG), having a slow and insidious onset, and angle closure glaucoma
                (ACG), which is less common and tends to be more acute.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/lJwsBXGlf7c" width="480" height="390" frameborder="0"></iframe></p>

        </div><br><br>
        <div>
            <h2 id="vdo8" style="margin-left: 320px;color: darkblue;font-size: 20px">Age related macular degeneration</h2><br><br>
            <p id="vdotext">Age-related macular degeneration (AMD) is a condition affecting older people, and involves the loss of the person's central field of vision. It occurs when the macular (or central)
                retina develops degenerative lesions. It is thought that circulatory insufficiency, with reduction in the blood flow to the macular area, also plays a part. Several forms of AMD exist.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/aCW4Ac2i1KQ" width="480" height="390" frameborder="0"></iframe></p><br>
                <iframe style="margin-left: 320px" title="YouTube video player" src="http://www.youtube.com/embed/7IkxcI1f1AI" width="480" height="390" frameborder="0"></iframe></p>
        </div><br><br>
        <div>
            <h2 id="vdo9" style="margin-left: 320px;color: darkblue;font-size: 20px">Corneal Opacities</h2><br><br>
            <p id="vdotext">Corneal visual impairment encompasses a wide variety of infectious and inflammatory eye diseases that cause scarring of the cornea, the clear membrane that covers the outside
                of the eye. Significant scarring ultimately leads to functional vision loss.
                <br><br>
                <!-- find a good video -->
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/Xf21nk2w8g0" width="480" height="390" frameborder="0"></iframe></p><br>

        </div><br><br>
        <div>
            <h2 id="vdo10" style="margin-left: 320px;color: darkblue;font-size: 20px">Genetic eye diseases</h2><br><br>
            <p id="vdotext">Genetic eye diseases include a large number of ocular pathologies which have in common the transmission from parents to children by their genetic inheritance.
                All do not cause visual impairment.
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/FqjGYQXTbLE" width="480" height="390" frameborder="0"></iframe></p><br>

        </div><br><br>
<hr><br>
        <div>
            <h2 id="operation" style="margin-left: 320px;color: darkblue;font-size: 24px">Operations</h2><br><br><br>

            <h2 id="vdo11" style="margin-left: 320px;color: darkblue;font-size: 20px">Cataract</h2><br><br>
            <p id="vdotext" style="color: red;font-size: 22px">Please don't watch if you are very sensitive!!!
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/jxhX0nOoJLE" width="480" height="390" frameborder="0"></iframe></p><br>
                <iframe style="margin-left: 320px" title="YouTube video player" src="http://www.youtube.com/embed/rUCoQzui704" width="480" height="390" frameborder="0"></iframe></p>

        </div><br><br>
        <div>
            <h2 id="vdo12" style="margin-left: 320px;color: darkblue;font-size: 20px">Childhood Blindness</h2><br><br>
            <p id="vdotext" style="color: red;font-size: 22px">Please don't watch if you are very sensitive!!!
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/Gv4agdjhpHU" width="480" height="390" frameborder="0"></iframe></p><br>

        </div><br><br>
        <div>
            <h2 id="vdo13" style="margin-left: 320px;color: darkblue;font-size: 20px">Glaucoma</h2><br><br>
            <p id="vdotext" style="color: red;font-size: 22px">Please don't watch if you are very sensitive!!!
                <br><br>
                <iframe  title="YouTube video player" src="http://www.youtube.com/embed/cF0rj4fM1l0" width="480" height="390" frameborder="0"></iframe></p><br>

        </div><br><br>
    </div>
    <a href="#"><input style="color: #000000; background-color: #d3d3d3;border-color: #000000;border-collapse: collapse" type="button" value="Go to Top"></a>
</div>
<footer class="site-footer">&#169; All Rights Reserved Eye clinic CDMC sri lanka</footer>
</body>
</html>