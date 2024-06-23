<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risk Mapping System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/app.css') }}">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <style>

        ::-webkit-scrollbar {
            width: 8px; 
        }

        ::-webkit-scrollbar-track {
            background: #f4f4f4;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #c5c5c5; 
            border-radius: 4px; 
        }

        * {
            scrollbar-width: thin; 
            scrollbar-color: #c5c5c5 #f4f4f4;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            padding: 20px;
        }

        .left-panel {
            display: grid;
            grid-template-rows: calc(560px / 2);
            gap: 20px;
        }

        .map-panel {
            height: 560px;
        }

        .incidents, .alerts {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: overlay;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .list-group-item {
            border: none;
            padding: 10px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .list-group-item strong {
            color: #2c3e50;
        }

        .list-group-item small {
            color: #95a5a6;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Risk Mapping System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/risk-areas') }}">Áreas de Risco</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/incidents') }}">Incidentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/alerts') }}">Alertas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
