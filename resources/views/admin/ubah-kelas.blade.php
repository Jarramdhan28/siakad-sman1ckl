<x-admin-layout>
    <div class="pb-6 pt-1">
        <<p class="font-bold md:text-5xl text-2xl">Halaman Ubah Data Kelas</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Ubah Data Kelas yang Salah Menjadi Benar</p>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('kelas.update', $kelas->id) }}">
            @csrf
            @method('put')
            {{-- Nama Kelas --}}
            <div class="mt-4">
                <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                <x-text-input id="nama_kelas" class="block mt-1 w-full" type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required autofocus autocomplete="nama_kelas" />
                <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-secondary-button href="{{ route('kelas.index') }}">Kembali</x-primary-button>

                <x-blue-button class="ml-4">
                    {{ __('Simpan') }}
                </x-blue-button>
            </div>
        </form>
    </div>

</x-admin-layout>
