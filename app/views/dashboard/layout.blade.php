<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/admin/favicon.ico" />
    <meta name="_token" content="{{ csrf_token() }}" />

    <title>Dashboard</title>

    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/admin/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrapformhelpers/css/bootstrap-formhelpers.min.css" />
    <link rel="stylesheet" href="/assets/admin/vendor/jquery-file-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="/assets/admin/vendor/fancyBox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/assets/admin/vendor/maxazan-jquery-treegrid/css/jquery.treegrid.css" type="text/css" />
    <link rel="stylesheet" href="/assets/admin/vendor/jquery-minicolors/jquery.minicolors.css" type="text/css" />
    <link rel="stylesheet" href="/assets/admin/css/dashboard.css" />

    <script src="/assets/admin/vendor/jquery/jquery-2.1.1.js"></script>
    <script src="/assets/admin/vendor/underscore.js"></script>
</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="nav sidebar-nav">
                <li><a href="{{ route('.user.index') }}">Пользователи</a></li>
                <li><a href="{{ route('.role.index') }}">Роли</a></li>
                <li class="nav-divide"><a href="{{ route('.human.index') }}">Гуманоиды</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="main-navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <button type="button" class="navbar-toggle fake pull-left" id="menu-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">Перейти на сайт</a></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 main">
                        @include('dashboard.partials.flash')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="/assets/admin/vendor/jquery-ui/jquery-ui.js"></script>
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="/assets/admin/vendor/bootstrapformhelpers/js/bootstrap-formhelpers.js"></script>
    <script src="/assets/admin/vendor/bootstrap-growl/jquery.bootstrap-growl.js"></script>
    <script src="/assets/admin/vendor/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/assets/admin/vendor/jquery-file-upload/js/jquery.fileupload.js"></script>
    <script src="/assets/admin/vendor/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="/assets/admin/vendor/maxazan-jquery-treegrid/js/jquery.treegrid.js"></script>
    <script src="/assets/admin/vendor/jquery.cookie.js"></script>
    <script src="/assets/admin/vendor/jquery-minicolors/jquery.minicolors.min.js"></script>

    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

    <script src="/assets/admin/js/script.js"></script>
</body>

</html>