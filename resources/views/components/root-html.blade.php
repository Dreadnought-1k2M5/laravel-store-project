<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blaze n Bay</title>
    @vite('resources/css/app.css')
    @vite('resources/css/modal.css')
    @vite('resources/css/login-box.css')
    @vite('resources/js/app.js')
{{--     <script src="https://cdn.tailwindcss.com"></script>
 --}}
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
    <body>
        {{$slot}}
    </body>
</html>