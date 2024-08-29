<?php
include 'config/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> Deerwalk Journal | DWIT </title>
    <!-- <base href="http://localhost/dwjournal/"/> -->
    <link rel="icon"
          type="image/png"
          href="public/images/fav.png">
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="public/stylesheets/style.css"  media="screen,projection"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="public/javascript/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="public/javascript/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="public/javascript/jquery-ui.js"></script>
    <!--<script type="text/javascript" src="public/javascript/materialize.min.js"></script>-->
    <script type="text/javascript" src="public/javascript/script.js"></script>
    <!--<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<script type="text/javascript">
    window.onscroll = function () {
        stickyTop()
    };
    let header = document.getElementById('navigationBar');
    let top = header.offsetTop;

    function stickyTop() {
        if (window.pageYOffset > top) {
            header.classList.add("fixed-top");
        } else {
            header.classList.remove("fixed-top");
        }
    }
</script>