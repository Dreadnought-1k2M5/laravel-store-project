<x-root-html>
    <body>
        <x-layout>
            <x-register/>
            <div class="overflow-hidden">
                @include('partials.__hero', ['heroImages' => ['images/hero/hero2.jpg', 'images/hero/miamivceltics.jpeg']])

            </div>
            <x-products :products="$products" />
        </x-layout>
    </body>
</x-root-html>