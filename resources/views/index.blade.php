@extends('layouts.app')

@php
    use App\Models\RiskArea;
    $riskAreas = RiskArea::all();
@endphp

@section('content')
    <div id="mapContainer" style="width: 100%; height: 600px;"></div>

    <script>
        const getSeverityColor = (severity) => {
            switch (severity) {
                case 1:
                    return '#00FF00';
                case 2:
                    return '#FFFF00';
                case 3:
                    return '#FFA500';
                case 4:
                    return '#FF4500';
                case 5:
                    return '#FF0000';
                default:
                    return '#00FF00';
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('mapContainer').setView([-27.2145, -49.6435], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            @foreach ($riskAreas as $riskArea)
                polygonCoords = {!! ($riskArea->polygon) !!};
                severityLevel =  {!! ($riskArea->severity_level) !!};
                polygonColor = getSeverityColor(severityLevel);

                if (polygonCoords && polygonCoords.length > 0) {
                    const polygonLayer = L.polygon(polygonCoords, {
                        color: polygonColor,
                        fillColor: polygonColor,
                        fillOpacity: 0.5
                    }).addTo(map);
                    
                    const popupContent = `
                        <h4>{{ $riskArea->name }}</h4>
                        <p>{{ $riskArea->description }}</p>
                        <p><strong>Tipo de Risco:</strong> {{ $riskArea->risk_type }}</p>
                        <p><strong>Nível de Severidade:</strong> {{ $riskArea->severity_level }}</p>
                    `;
                    
                    polygonLayer.bindPopup(popupContent);
                }
            @endforeach
        });
    </script>
@endsection
