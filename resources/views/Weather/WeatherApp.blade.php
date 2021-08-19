<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="css.css" rel="stylesheet">
        <style></style>
        <style>
            
        </style>
    </head>
    <body class="antialiased">
        
        <div>
            <!-- loop to include the elements that are used to get the weather report -->
            @for ($i = 0; $i < 5; $i++)
                <!-- Dynamically altering the requested city by passing data to the view depending on city list defined in config/app.php -->
                @include('Weather.WeatherElement', ['requestCity' => (config('app.weatherCities'))[$i]])
            @endfor

        </div>
    </body>
</html>
