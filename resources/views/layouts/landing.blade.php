<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="es">
<head>
    <style type="text/css">
        body {

background-image: url(../img/educacion.jpg) ;
/* Para dejar la imagen de fondo centrada, vertical y

horizontalmente */

background-position: center center;

/* Para que la imagen de fondo no se repita */

background-repeat: no-repeat;

/* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

background-attachment: fixed;

/* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

background-size: cover;

/* Se muestra un color de fondo mientras se está cargando la imagen

de fondo o si hay problemas para cargarla */

background-color: #66999;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ucesoft">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">
    <meta name="keywords" content="@yield('keywords')" >

    <meta property="og:title" content="Ucesoft" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Ucesoft" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>Ucesoft</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/font-lato.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/font-raleway.css') }}" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datarangepicker/daterangerpicker.css') }}">

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>


</head>

<body>

<!-- Fixed navbar -->   
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>Ucesoft</b></a>
        </div>
        <div class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                    <!-- <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li> -->
                @else
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>



    <div class="container">
        <div style="width: 100%; height: 100%" align="center">
            <h1><a href="#"> Ucesoft</a></h1> <p><strong style="color: white;">Es el sistema administrativo y académico de la Unidad Educativa Colegio "Urdaneta y Campo Elías"</strong></p>
                <div>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="../img/1.jpg" style="width: 350px; height: 350px;border-radius: 200px;">
                        </div>
                        <div class="col-lg-4">
                            <img src="../img/2.jpg" style="width: 350px; height: 350px;border-radius: 200px;">
                        </div>
                        <div class="col-lg-4">
                            <img src="../img/3.jpg" style="width: 350px; height: 350px;border-radius: 200px;">
                        </div>
                    </div>
                </div>
        </div><br><br><br><br>


        
    </div> <!--/ .container -->

<div id="c">
    <div class="container">
        <!-- To the right -->
    <div class="pull-right hidden-xs">
        <p>Diseñado por: Javier Guevara</p>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017. Todos los derechos reservados. </strong> Ucesoft

    </div>
</div>
<a name="uno"></a>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
