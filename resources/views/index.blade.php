<x-root-html>
    <body>
        <x-layout>
            <x-register/>
            
            @include('partials.__hero', ['heroImage' => 'images/hero/hero2.jpg'])
            <x-products :products="$products" />
        </x-layout>
    </body>
</x-root-html>