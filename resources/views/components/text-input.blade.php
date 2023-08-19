@props(['disabled' => false, 'checked' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $checked ? 'checked' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring focus:ring-opacity-25 focus:ring-indigo-300 rounded-md shadow-sm transition duration-150']) !!}>
