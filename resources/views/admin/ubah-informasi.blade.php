<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Ubah Data Kelas</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('informasi.update', $informasi->id) }}">
            @csrf
            @method('patch')
            {{-- Nama Kelas --}}
            <div class="mt-4">
                <x-input-label for="judul" :value="__('Judul')" />
                <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" value="{{ $informasi->judul }}" required autofocus autocomplete="judul" />
                <x-input-error :messages="$errors->get('judul')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="isi" :value="__('Isi Artikel')" />
                <textarea name="isi" id="isi" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$informasi->isi}}</textarea>
                <x-input-error :messages="$errors->get('isi')" class="mt-2" />
            </div>

            @php
                $currentDate = now();
                $tanggal = $currentDate->format('d-m-Y');
            @endphp

            <div>
                <input type="hidden" name="tanggal" value="{{$tanggal}}">
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('informasi.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>

                <x-primary-button class="ml-4">
                    {{ __('Ubah Informasi') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
