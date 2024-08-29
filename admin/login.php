<?php
$page = "Login";
include 'layouts/header.php';
?>
<body class="bg">
<main>
    <div class="container" style="margin-top: 8%;">
        <div class="row">
            <div class="col offset-l3 l6 s12">
                <div class="card">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab dw-blue-2">
                                <a class="left-align white-text center-align">
                                    <h6>Login</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="row">

                            <form class="col s12" action="routes/auth" method="POST" autocomplete="off">
                                <div class="row">

                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">person</i>
                                        <input id="username" name="username" type="text" class="validate">
                                        <label for="username"> Username </label>
                                    </div>

                                    <div class="input-field col l12 m12 s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="password" name="password" type="password" class="validate">
                                        <label for="password"> Password </label>
                                    </div>

                                    <div class="input-field col l12 m12 s12 center-align">
                                        <input type="submit" name="login" class="btn btn-float dw-blue-1" value="Login">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l2 offset-l5 center-align">
                &copy;
                    <script language="JavaScript" type="text/javascript">
                        now = new Date
                        theYear = now.getYear()
                        if (theYear < 1900)
                            theYear = theYear + 1900
                        document.write(theYear)
                    </script> DWIT
            </div>
        </div>
    </div>
</main>
</body>
<?php include 'layouts/footer.php' ?>
