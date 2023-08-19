@props(['disabled' => false, 'multiple' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $multiple ? 'multiple' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring focus:ring-opacity-25 focus:ring-indigo-300 rounded-md shadow-sm transition duration-150 disabled:bg-gray-100']) !!}>
  {{ $slot }}
</select>
