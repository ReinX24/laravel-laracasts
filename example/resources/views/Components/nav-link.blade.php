<!-- Converts active attribute into a variable -->
@props(['active' => false, 'type' => 'a'])

<!-- To run php scripts in our applicationm, we use the @/php and @/endphp tags -->

@if($type === 'a')
<a
    class="{{ $active ? "bg-gray-900 text-white" 
    : "text-gray-300 hover:bg-gray-700 hover:text-white" }} 
    rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}>
    {{ $slot }}
</a>
@else
<button
    class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}>
    {{ $slot }}
</button>
@endif