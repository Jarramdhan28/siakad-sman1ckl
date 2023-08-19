<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Tambah Data Belajar</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('belajar.store') }}">
            @csrf
            <div x-data="{ kelasId : '{{ old('kelas_id') }}' }">
                <x-input-label for="kelas_id" :value="__('Nama Kelas')" />
                <x-select name="kelas_id" id="kelas_id" required class="block mt-1 w-full" x-model="kelasId">
                    <option value="" selected disabled hidden>-- Pilih Kelas --</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" @selected($item->id == old('kelas_id'))>{{ $item->nama_kelas }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="pelajaran" :value="__('Pelajaran')" />
                <div class="grid grid-cols-6 gap-x-7 gap-y-4">
                    @foreach ($pelajaran as $item)   
                    <div class="flex items-center">
                        <x-text-input id="pelajaran" type="checkbox" name="pelajaran[]" value="{{ $item->id }}"/>
                        <span class="text-sm text-gray-700 ml-2">{{ $item->nama_pelajaran }}</span>
                    </div>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('pelajaran')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button href="{{ route('belajar.index') }}">Kembali</x-primary-button>

                <x-primary-button class="ml-4">
                    {{ __('Tambah Data Belajar') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
