<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Ubah Data Kelas</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('ubahKelas', $kelas->id) }}">
            @csrf
            @method('patch')
            {{-- Nama Kelas --}}
            <div class="mt-4">
                <x-input-label for="nama_kelas" :value="__('Nama Kelas')" />
                <x-text-input id="nama_kelas" class="block mt-1 w-full" type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required autofocus autocomplete="nama_kelas" />
                <x-input-error :messages="$errors->get('nama_kelas')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('adminKelas')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>

                <x-primary-button class="ml-4">
                    {{ __('Ubah Data Kelas') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
