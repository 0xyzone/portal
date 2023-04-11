<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>
        @if (isset($titlename))
            {{ $titlename }} | Portal
        @else
            Portal
        @endif
    </title>
</head>

<body class=" text-white w-full h-full bg-slate-800">
    {{ $slot }}
</body>

</html>
