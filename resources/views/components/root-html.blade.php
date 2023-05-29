<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MidnightGaze Store</title>
    <script defer src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @vite('resources/css/modal.css')
    @vite('resources/css/login-box.css')
    @vite('resources/css/sidebar-profile.css')
    @vite('resources/js/app.js')
    @vite('resources/js/single-product.js')
    @vite('resources/js/cart-script.js')
    @vite('resources/js/userDropDown.js')
    @vite('resources/js/multi-step-form.js')
    @vite('resources/js/sidebar.js')
    @vite('resources/js/admin-sidebar.js')

    @vite('resources/js/slick-1.8.1/slick/slick.min.js')
    @vite('resources/js/slick-1.8.1/slick/slick.css')
    @vite('resources/js/slick-1.8.1/slick/slick-theme.css')
    @vite('resources/js/slider.js')
    {{-- @vite('resources/js/ajax-quantity.js') --}}

    <script src="//unpkg.com/alpinejs" defer></script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">


    
{{--     <script src="https://cdn.tailwindcss.com"></script>
 --}}
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
    {{$slot}}
</html>