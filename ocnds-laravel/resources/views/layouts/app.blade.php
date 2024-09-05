<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') || Okur-Chung Neurodevelopmental Syndrome- OkurChung.com</title>

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
                    <h2 class="title2 ms-2">Quantitative <br>Proteomics <br> Database</h2>
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
                            The following researchers contributed to this project: Danielle Caefer, Audrey Baker, Jen Liddle, Jeremy Balsbaugh, Zoey England, Anastasios Tzingounis, and Daniel Schwartz
                        </p>
                    </div>
                </section>

                <!-----------------------DATABASE DESCRIPTION---------------------->

                <section class="description">
                    <div class="container">
                        <h3>Database Description</h3>
                        <p>
                            The OCNDS database contains results from our TMT-labeled, highly quantitative mass spectrometry experiment involving five human cell lines, four of which contain mutations to CK2, and one genetic control. The values shown in each variant column are fold changes relative to the wild type. The database can be searched looking at the proteome or phosphoproteome, using gene name or protein accession, and can be sorted by column. Future work will incorporate filtering and tool tips. This database as well as the experiments documented in it are part of a paper in progress.
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
