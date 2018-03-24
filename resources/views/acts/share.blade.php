<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="body-container">
<header>
  Нажмитне ctr+P, уберите отображение колонтитулов и настройте поля
</header>

<divc class="paper-container">
    <div class=" paper-list">
        @include('act')

    </div>
</divc>


</body>
</html>