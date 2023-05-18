<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CrimsonCorner Store</title>
    <script defer src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @vite('resources/css/modal.css')
    @vite('resources/css/login-box.css')
    @vite('resources/js/app.js')
    @vite('resources/js/single-product.js')
    @vite('resources/js/cart-script.js')
    @vite('resources/js/userDropDown.js')
    @vite('resources/js/multi-step-form.js')
    
    <script src="//unpkg.com/alpinejs" defer></script>


    
{{--     <script src="https://cdn.tailwindcss.com"></script>
 --}}
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
    <body>
        {{$slot}}
    </body>
</html>