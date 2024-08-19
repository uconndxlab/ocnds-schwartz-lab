<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') || Okur-Chung Neurodevelopmental Syndrome- Shwartz Lab, UConn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <!-- button group for /phos and / -->
        <div class="row my-4">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('proteins.index') }}" class="btn btn-primary">Search Proteins</a>
                    <a href="{{ route('phosphorylations.index') }}" class="btn btn-primary">Search Phosphorylation</a>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>