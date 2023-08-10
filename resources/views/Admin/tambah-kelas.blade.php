<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Tambah Data Kelas</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('tambahKelas') }}">
            @csrf
            <div>
                <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                <x-text-input id="nama_kelas" class="block mt-1 w-full" type="text" name="nama_kelas" :value="old('nama_kelas')" required autofocus autocomplete="nama_kelas" />
                <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Tambah Data Kelas') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
