<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Mi CRUD en Laravel 7">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!----Creando mi Token --->
    <title>Crud Laravel 7 @yield('title')</title>
    @include('home.mycss')
</head>

<body class="materialdesign">

<!---Precargar loader-->
<div id="cover">  </div>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="wrapper-pro">
    @include('home.MenuVertical')


        <div class="content-inner-all">

            @include('home.MenuHorizontal')
            @include('home.MenuMovil')

            
    <div class="login-form-area mg-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
            @yield('cuerpo')

            </div>
        </div>
    </div>


        </div>
    </div>


    @include('home.myjs')
    @yield('script')  <!--esto significa que puedo llamar esta seccion de script en una pagina en particuar y no en todas---->

</body>
</html>