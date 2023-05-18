<x-root-html>
    <x-layout>
        <x-register/>
        
        @include('partials.__hero', ['heroImage' => 'images/hero/hero2.jpg'])
        <x-products :products="$products" />
    </x-layout>
</x-root-html>