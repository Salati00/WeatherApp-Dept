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
            {{session()->put('cities', array())}}
            <!-- loop to include the elements that are used to get the weather report -->
            @for ($i = 0; $i < 5; $i++)
                <!-- Dynamically altering the requested city by passing data to the view depending on city list defined in config/app.php -->
                @include('Weather.WeatherElement', ['requestCity' => (config('app.weatherCities'))[$i]])
            @endfor

            <div class="quality">
                <select id="comboBox" name="cities" onchange="niceDay();">
                    @foreach (session()->get('cities') as $city)
                        <option value={{$city[1]}}>{{$city[0]}}</option>
                    @endforeach
                </select>
                <p id="DayMessage"></p>
            </div>
        </div>
    </body>

    <script>
        window.onload = (x)=>{
            niceDay();
        };

        function niceDay(){
            let comboBox = document.getElementById("comboBox");
            let nice = comboBox.value;
            let place = comboBox.options[comboBox.selectedIndex].text;
            
            document.getElementById("DayMessage").innerHTML = nice ? "It is a nice day to go for a walk in " + place : "It is not a nice day to go for a walk in " + place;
        }
    </script>
</html>
