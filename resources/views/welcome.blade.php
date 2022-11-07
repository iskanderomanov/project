<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body >
<div id="app">
    <p>Введите список доменов (каждый домен должен записиваться через запятую или с новой строки)</p>

    <textarea v-model="text" @blur="mainFunc"></textarea>
    <component-domains :domains="domains"></component-domains>

</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
@stack('scripts')
</html>
