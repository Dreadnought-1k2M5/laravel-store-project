<x-root-html>
    <body>
        <x-layout>
            <x-register/>
            <div class="overflow-hidden">
                @include('partials.__hero', ['heroImages' => ['images/hero/hero2.jpg', 'images/hero/hero1.jpg']])

            </div>
            <x-products :products="$products" />
        </x-layout>
    </body>
</x-root-html>