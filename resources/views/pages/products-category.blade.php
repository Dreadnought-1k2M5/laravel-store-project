<x-root-html>
    <body>
        <x-layout :category="isset($category) ? $category : '' " > {{-- the prop is for the select element --}}
            <x-register/>
            <x-products :products="$products" :categoryLabel="$categoryLabel" />
        </x-layout>
    </body>
</x-root-html>