<!doctype html>
<html>
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->getMeta(); ?>
    <link rel="shortcut icon" href="images/logo.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/croppie.css">
    <link rel="stylesheet" href="css/jquery.arcticmodal-0.3.css">
    <link rel="stylesheet" href="css/themes/simple.css">

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/media.css"/>
</head>
<body>
<div class="wrapper">
    <div class="site-grid">
        <div class="left-sidebar">
            <aside class="sidebar">
                <div class="logo">
                    <a href="#">
                        <img src="images/logo.png">
                    </a>
                </div>
                <nav class="dws-menu">
                    <?php new \app\widgets\menu\Menu('menu_left.php');?>
                </nav>
            </aside>
        </div>
        <div class="content">
            <div class="header-md">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
                                <a class="navbar-brand logo-md" href="#">
                                    <img src="images/logo.png" alt="image">
                                </a>
                                <div class="auth">
                                    <?php if (!empty($_SESSION['user'])): ?>
                                        <a href="<?=PATH;?>/user/cabinet" class="signup mr-2"><?=h($_SESSION['user']['first_name']);?></a>
                                        <a href="<?=PATH;?>/user/logout">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?=PATH;?>/user/registration" class="signup">Регистрация</a>
                                        /
                                        <a href="/user/login" class="login">Вход</a>
                                        <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <?php new \app\widgets\menu\Menu('menu_header.php');?>
                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <header class="header-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header">
                                <div class="search header-flex-item header-flex-item-2">
                                    <form method="post" class="search-form" action="/search" method="get" autocomplete="off">
                                        <input type="text" name="q" class="search_field" type="search typeahead" id="typeahead" name="s">
                                        <input type="submit" value="" class="search_btn">
                                    </form>
                                </div>
                                <div class="burger header-flex-item header-flex-item-3">
                                    <div class="auth">
                                        <?php if (!empty($_SESSION['user'])): ?>
                                            <a href="<?=PATH;?>/user/cabinet" class="signup mr-2"><?=h($_SESSION['user']['first_name']);?></a>
                                            <a href="<?=PATH;?>/user/logout">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?=PATH;?>/user/registration" class="signup">Регистрация</a>
                                            /
                                            <a href="/user/login" class="login">Вход</a>
                                            <i class="fa fa-user-o" aria-hidden="true"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main>
                <?php if (isset($_SESSION['errors'])): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?= $content; ?>
            </main>

        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row footer-container">
                <div class="col-lg-2 footer-item">
                    <div class="logo-footer footer-poss">
                        <a href="#">
                            <img src="images/logo_white.png" alt="image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 footer-item">
                    <div class="address footer-poss">
                        <p>3104 Doctors Drive <br>Los Angeles, California</p>
                    </div>
                </div>
                <div class="col-lg-2 footer-item">
                    <div class="telephone footer-poss">
                        <div class="phone-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="phones">
                            <p>+3 8050 996 56 87</p>
                            <p>+3 8050 996 56 87</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 footer-item">
                    <div class="email footer-poss">
                        <div class="email-icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <p>Ejhjfj]@sjkly.net.ua</p>
                    </div>
                </div>
                <div class="col-lg-2 footer-item">
                    <div class="soc footer-poss">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    var path = '<?=PATH;?>';
</script>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<?php if ($_SERVER['REQUEST_URI'] == '/'): ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxLYwfr0CLR5y0SXJui7M53Evv47ekWS4&callback=initMap"
            type="text/javascript"></script>
<?php endif; ?>
<script src="js/croppie.min.js"></script>
<script src="js/jquery.arcticmodal-0.3.min.js"></script>

<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<!--<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

<script src="js/jquery.waterwheelCarousel.min.js"></script>

<script src="js/typeahead.bundle.js"></script>

<script src="js/main.js"></script>

<script src="js/script.js"></script>

</body>
</html>