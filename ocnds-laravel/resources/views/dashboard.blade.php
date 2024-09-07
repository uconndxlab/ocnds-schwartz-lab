<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Welcome || Okur-Chung Neurodevelopmental Syndrome- OkurChung.com</title>

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
    <div class="bg-dark py-5" id="app">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <h1 class="display-4 text-white">Tools for the OCNDS Research Community</h1>
                    <a class="text-white font-bold" style="font-weight: bold; text-decoration:none;"
                        href="https://schwartzlab.uconn.edu" target="_blank"> schwartzlab.uconn.edu</a>
                </div>

                <div class="col-lg-6 mb-5 mt-5">
                    <div class="card card--channel-predictor">
                        <div class="card-body">
                            <h5 class="card-title">OCNDS CK2 K198R Ion Channel Predictor</h5>
                            <p class="card-text">
                                The OCNDS ion channel predictor is a tool to identify possible CK2 wild type and K198R
                                variant phosphorylation sites of human ion channels localized to the axon. Proteins can
                                be filtered by name and results show the 15mer sequence surrounding the phosphorylation
                                site, as well as a calculated probability that the site is phosphorylated by WT CK2 or
                                K198R CK2. For a more detailed methodology, please review the accompanying paper.</p>
                        </div>
                        <a href="{{ route('ion-channel-predictor') }}" class="btn btn-primary">Go to Ion Channel
                            Predictor</a>

                    </div>
                </div>

                <div class="col-lg-6 mb-5 mt-5">
                    <div class="card card--database">
                        <div class="card-body">
                            <h5 class="card-title">
                                Quantitative
                                Proteomics
                                Database</h5>
                            <p class="card-text">The OCNDS database contains results from our TMT-labeled, highly
                                quantitative mass spectrometry experiment involving five human cell lines, four of which
                                contain mutations to CK2, and one genetic control. The values shown in each variant
                                column are fold changes relative to the wild type. The database can be searched looking
                                at the proteome or phosphoproteome, using gene name or protein accession, and can be
                                sorted by column. Future work will incorporate filtering and tool tips. This database as
                                well as the experiments documented in it are part of a paper in progress.

                            </p>
                        </div>
                        <a href="{{ route('proteins.index') }}" class="btn btn-primary">Go to the Database</a>

                    </div>
                </div>

                <div class="col-lg-12 text-center my-4">
                    <img class="uconnlogo mt-5" src={{ asset('uconnlogo.svg') }} alt="OCNDS Logo" class="img-fluid">
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/htmx.org@2.0.2"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
