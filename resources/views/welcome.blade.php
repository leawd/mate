<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mate.uy</title>

    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <META NAME="AUTHOR" CONTENT="Leandro do Carmo">
    <META NAME="REPLY-TO" CONTENT="leandro.m.docarmo@gmail.com">
    <LINK REV="made" href="mailto:leandro.m.docarmo@gmail.com">
    <META NAME="DESCRIPTION"
        CONTENT="Portal que reúne los principales diarios de noticias de Uruguay, El País, El Observador, La Diaria y Caras y Caretas. Además te mostramos información sobre el mate (infusión) y nuestro país Uruguay.">
    <META NAME="KEYWORDS"
        CONTENT="Noticias,Mate,Uruguay,Diario,Periódico,Portal,El País,El Observador,La Diaria,Caras y Caretas">
    <META NAME="Resource-type" CONTENT="Journal">
    <META NAME="Revisit-after" CONTENT="1 days">
    <META NAME="robots" content="ALL">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XEDC9PN0FT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XEDC9PN0FT');
    </script> --}}


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">

    <style>


    </style>
</head>

<body class="antialiased" style="padding-top:100px;">
    <nav class="navbar fixed-top navbar-dark bg-dark text-white">
        <span>Noticias:</span>
        <a class="navbar-brand" href="#noticas-el-pais">El País</a>
        <a class="navbar-brand" href="#noticas-el-observador">El Observador</a>
        <a class="navbar-brand" href="#">La diaria</a>
        <a class="navbar-brand" href="#">Caras y caretas</a>
        <span> | </span>
        Sobre el mate
        <span> | </span>
        Sobre Uruguay
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- PRESENTACION Y FILTRO ------ --}}
                <div class="row bg-white">
                    <div class="col-12 col-md-6 offset-md-3 py-5">
                        <h1>¿Qué es mate.uy?</h1>
                        <h2>Somos un portal de resúmenes</h2>
                        <p>
                            Nos dedicamos a brindarte en un solo lugar el acceso a las noticias de los principales
                            periódicos del Uruguay.<br>
                            Con un único filtro podés buscar fácil lo que te interesa<br>
                            <b>¿A qué estás esperando? ¡Arrancá a buscar!</b>
                        </p>
                        <input type="text" class="form-control" id="filtro">
                    </div>
                </div>

                @include('diarios.elpais')
                @include('diarios.elobservador')

                <div class="col-12 py-2">
                    <h1></h1>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

            <script>
                window.filtrarTabla = (texto) => {
                    $(`.noticia`).filter(
                        function() {
                            let text = $(this).attr('data-text').toLowerCase();
                            $(this).toggle(text.indexOf(texto) > -1);
                        }
                    );
                };

                $(document).ready(function() {
                    $('a[href^="#"]').click(function() {
                        var destino = $(this.hash);
                        if (destino.length == 0) {
                            destino = $('a[name="' + this.hash.substr(1) + '"]');
                        }
                        if (destino.length == 0) {
                            destino = $('html');
                        }
                        let d = destino.offset().top - 50;
                        $('html, body').animate({
                            scrollTop: d
                        }, 500);
                        return false;
                    });


                });
            </script>
</body>

</html>
