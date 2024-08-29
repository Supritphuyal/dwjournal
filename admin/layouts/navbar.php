<style>
    header, main, footer {
        padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
        header, main, footer {
            padding-left: 0;
        }
    }
</style>
<header>
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="public/images/bg.jpg">
                </div>
                <a><img class="circle" src="public/images/user.png"></a>
                <a><span class="white-text name">Hello <?php echo $_SESSION['username']; ?>!</span></a>
                <a>
                    <span class="white-text email">
                        <script language="JavaScript" type="text/javascript">
                            let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                            document.write(new Date().toLocaleDateString("en-US", options));
                        </script>
                    </span></a>
        </li>
        <li>
            <ul class="collapsible">
                <a href="" class="black-text" target="_blank">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">public</i>Vist Site</div>
                    </li>
                </a>
            </ul>
        </li>
        <li>
            <ul class="collapsible">
                <a href="admin/dashboard" class="<?php if(strcmp($page, "Dashboard") == 0) { echo "white-text"; } else { echo "black-text"; } ?>">
                    <li class="<?php if(strcmp($page, "Dashboard") == 0) { echo "dw-blue-1"; } ?>">
                        <div class="collapsible-header"><i class="material-icons">dashboard</i>Dashboard</div>
                    </li>
                </a>
            </ul>
        </li>
        <li>
            <ul class="collapsible">
                <a href="admin/volumes" class="<?php if(strcmp($page, "Volumes") == 0) { echo "white-text"; } else { echo "black-text"; } ?>">
                    <li class="<?php if(strcmp($page, "Volumes") == 0) { echo "dw-blue-1"; } ?>">
                        <div class="collapsible-header"><i class="material-icons">book</i>Volumes</div>
                    </li>
                </a>
            </ul>
        </li>
        <li>
            <ul class="collapsible">
                <a href="admin/papers" class="<?php if(strcmp($page, "All Papers") == 0) { echo "white-text"; } else { echo "black-text"; } ?>">
                    <li class="<?php if(strcmp($page, "All Papers") == 0) { echo "dw-blue-1"; } ?>">
                        <div class="collapsible-header"><i class="material-icons">description</i>Papers</div>
                    </li>
                </a>
            </ul>
        </li>
        <li>
            <ul class="collapsible">
                <a href="routes/auth?logout=true" class="black-text">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">power_settings_new</i>Logout</div>
                    </li>
                </a>
            </ul>
        </li>
    </ul>
</header>