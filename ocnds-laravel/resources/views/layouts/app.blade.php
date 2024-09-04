<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') || Okur-Chung Neurodevelopmental Syndrome- Shwartz Lab, UConn</title>

    <!--kode mono-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

    <!--work sans-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href={{ asset('css/app.css') }}>

</head>

<body>
    <div id="app">
        <div class="top-container">
            <!--------------------------HEADER-------------------------->
            <header>
                <div class="title">
                    <h1 class="main-title">OCNDS</h1>
                    <h2 class="title2">Okur-Chung<br>
                        Neurodevelopmental<br>
                        Syndrome</h2>
                </div>
                <div class="subtitle">
                    <p>Schwartz Lab - University of Connecticut</p>
                </div>
            </header>


            <!-------------------------------SIDEBAR------------------------------->
            <aside>
                <!-----------------------CREDITS---------------------->
                <section class="credits">
                    <div class="container">
                        <h3>Credits</h3>
                        <p>
                            Schwartz Lab | Researchers: John Doe, Mary Sue | Lorem ipsum dolor sit amet consectetur.
                            Lacinia turpis et quam non in.
                        </p>
                    </div>
                </section>

                <!-----------------------DATABASE DESCRIPTION---------------------->

                <section class="description">
                    <div class="container">
                        <h3>Database Description</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur. Lacinia turpis et quam non in. In lorem massa et
                            blandit gravida mattis. Quis viverra lacus duis metus amet purus est sit. Ut aliquam erat
                            faucibus faucibus morbi neque ipsum ut proin. Habitasse quam in congue risus quam. In lorem
                            massa et blandit gravida mattis.
                        </p>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('proteins.index') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Search Proteins</a>
                            <a href="{{ route('phosphorylations.index') }}" class="nav-link {{ request()->is('phos') ? 'active' : '' }}">Search Phosphorylation</a>
                        </div>
                    </div>
                </section>
            </aside>

        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

  

    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
