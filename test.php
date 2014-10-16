<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-3.2.0-dist/css/bootstrap.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <script src="bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
</head>
<body>
<ul id="mainnav" class="nav nav-pills nav-justified">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Profile</a></li>
    <li  class="dropdown">
        <a  href="#" class="dropdown-toggle" data-toggle = "dropdown">Explore Eye
            <!--            <span class="caret"></span>--></a>
        <ul class="dropdown-menu" role="menu">

            <li><a href="#">Videos</a></li>
            <li><a href="#">Articles</a></li>
            <li><a href="#">Books</a></li>
        </ul>

    </li>
    <li><a href="#">Messages</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Messages</a></li>
</ul>
<?php
if(1==1){
    echo "ela lko";
    ?>
    <script type="text/javascript">
        alert("The email address is already registered.");
        history.back();
    </script>
<?php
}
?>

</body>
</html>