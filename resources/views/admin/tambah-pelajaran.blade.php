<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Tambah Data Pelajaran</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('pelajaran.store') }}">
            @csrf
            <div>
                <x-input-label for="nama_pelajaran" :value="__('Nama Pelajaran')" />
                <x-text-input id="nama_pelajaran" class="block mt-1 w-full" type="text" name="nama_pelajaran" :value="old('nama_pelajaran')" required autofocus autocomplete="nama_pelajaran" />
                <x-input-error :messages="$errors->get('nama_pelajaran')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button href="{{ route('pelajaran.index')}}">Kembali</x-primary-button>

                <x-primary-button class="ml-4">
                    {{ __('Tambah Data Pelajaran') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
