<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/flowbite.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/images/icon.ico') }}">
    <link rel="stylesheet" href="{{asset('/css/mermaid.min.css')}}">
    <title>{{$title}}</title>
</head>
<body>
    @yield('content')
</body>
</html>