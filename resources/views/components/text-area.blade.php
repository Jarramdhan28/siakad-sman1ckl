@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring focus:ring-opacity-25 focus:ring-indigo-300 rounded-md shadow-sm transition duration-150']) !!}>
</textarea>
