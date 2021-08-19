@php
//API request

$endpoint = 'api.openweathermap.org/data/2.5/weather?';
$client = new \GuzzleHttp\Client();

$response = $client->request('GET', $endpoint, ['query' => [
    'q' => $requestCity, 
    'appid' => config('auth.API_Key'),
    'units' => 'metric'
]]);

$statusCode = $response->getStatusCode();
$content = json_decode($response->getBody(), true);

@endphp

@if ($statusCode == '200')
    <div class="WeatherContainer">
        <img src="http://openweathermap.org/img/wn/{{$content['weather'][0]['icon']}}@2x.png"/>
        {{$content['name']}},
        {{$content['weather'][0]['description']}},
        {{$content['main']['temp']}}°
        @if ($content['weather'][0]['id'] >= 700 && $content['main']['temp'] >= 18)
            | It is a nice day to go for a walk!
        @else
            | It is not a nice day to go for a walk...
        @endif
    </div>
@endif
