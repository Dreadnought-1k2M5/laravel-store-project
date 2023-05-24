<x-root-html>
    <body>
        <x-layout :category="isset($category) ? $category : '' " >
            <x-register/>
            <x-products :products="$products" />
        </x-layout>
    </body>
</x-root-html>