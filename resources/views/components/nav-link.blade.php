@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 dark:border-white text-md font-bold leading-5 text-gray-100 border-b-4 border-gray-100 dark:text-gray-100 focus:outline-none focus:border-white transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 text-md font-bold leading-5 text-gray-700 dark:text-gray-400 hover:text-gray-300 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
