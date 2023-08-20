@props(['icon', 'text'])

<li x-data="{ open: false }">
    <button @click="open = !open"
        class="flex w-full text-left items-center justify-between p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
        <div class="flex items-center">
          {!! $icon !!}
            <span class="flex-1 ml-3 whitespace-nowrap">{{ $text }}</span>
        </div>
        <svg 
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-4 h-4 transition duration-300" :class="open ? '-rotate-180' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>
    <ul class="list-disc pl-12 pr-4 text-gray-700 max-h-0 overflow-hidden transition-[max-height] duration-300"
        :class="open ? 'max-h-20' : ''">
        {{ $slot }}
    </ul>
</li>
