<x-admin-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Ubah Informasi Sekolah</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Ubah Informasi Jika ada Kesalahan</p>
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

            <div class="mt-4">
                <x-input-label for="isi" :value="__('Isi Artikel')" />
                <textarea name="isi" id="isi" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="20" >{{$informasi->isi}}</textarea>
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
                <x-secondary-button href="{{ route('informasi.index') }}">Kembali</x-primary-button>

                <x-blue-button class="ml-4">
                    {{ __('Simpan') }}
                </x-blue-button>
            </div>
        </form>
    </div>

</x-admin-layout>
