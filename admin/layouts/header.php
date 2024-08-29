<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $page; ?> | Deerwalk Journal </title>
    <base href="http://localhost/DMT/dwjournal/"/>
    <link rel="icon"
          type="image/png"
          href="public/images/fav.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="public/stylesheets/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="public/stylesheets/style.css"  media="screen,projection"/>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="public/javascript/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="public/javascript/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="public/javascript/jquery-ui.js"></script>
    <script type="text/javascript" src="public/javascript/materialize.min.js"></script>
    <script type="text/javascript" src="public/javascript/notify.min.js"></script>
    <script src="config/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="public/javascript/script.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript">
        $(document).ready(function () {
            <?php if(isset($_SESSION["message"])){ ?>
            $.notify('<?php echo $_SESSION["message"] ?>', '<?php echo $_SESSION["messageType"] ?>');
            <?php unset($_SESSION["message"]); unset($_SESSION["messageType"]); } ?>
        });
    </script>

</head>


