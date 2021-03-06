<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <div class="page-wrapper">
        <header id="header"><!--header-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">My Shop</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="#">alexanderlakhneko@gmail.com</a></li>
                            <li><a href="#">+38 063 116 07 50</a></li>
                        </ul>
                        <form action="/search" method="post" class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <div class="btn-group">
                                    <input type="text" autocomplete="off" id="search" data-toggle="dropdown" class="form-control" placeholder="поиск" name="search"> </input>
                                        <ul id="resSearch" class="dropdown-menu" >
                                        </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="logo pull-left">
                                <a href="/"><img src="/images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="/cart">
                                        <i class="fa fa-shopping-cart"></i> Корзина
                                        (<span id="cart-count"><?php echo $countItems; ?></span>)
                                    </a>
                                </li>
                                <?php if ($isGuest): ?>
                                    <li><a href="/user/login"><i class="fa fa-lock"></i> Вход</a></li>
                                    <li><a href="/user/register"><i class="fa fa-lock"></i> Регистрация</a></li>
                                <?php else: ?>
                                    <li><a href="/cabinet"><i class="fa fa-user"></i> Аккаунт</a></li>
                                    <li><a href="/user/logout"><i class="fa fa-unlock"></i> Выход</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Главная</a></li>
                                <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/catalog">Каталог товаров</a></li>
                                        <li><a href="/cart">Корзина</a></li>
                                    </ul>
                                </li>
                                <li><a href="/about">О магазине</a></li>
                                <li><a href="/contacts">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

    </header><!--/header-->

    <div>
        <?=$content ?>
    </div>

    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer "><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Lakhneko © 2017</p>
                <p class="pull-right">PHP Shop</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/js/jquery.js"></script>
<script src="/js/jquery.cycle2.min.js"></script>
<script src="/js/jquery.cycle2.carousel.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/price-range.js"></script>
<script src="/js/jquery.prettyPhoto.js"></script>
<script src="/js/main.js"></script>

</body>
</html>