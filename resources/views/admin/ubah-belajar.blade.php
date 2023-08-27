<x-admin-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Ubah Data Kelas Belajar</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Ubah Data Kelas Belajar Jika Ada yang salah</p>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('belajar.update', $kelas->id) }}">
            @csrf
            @method('put')
            <div>
                <x-input-label for="kelas_id" :value="__('Nama Kelas')" />
                <x-select name="kelas_id" id="kelas_id" required class="block mt-1 w-full" :value="$kelas->id" disabled>
                    <option value="{{ $kelas->id }}" selected>{{ $kelas->nama_kelas }}</option>
                </x-select>
                <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="pelajaran" :value="__('Pelajaran')" />
                <div class="grid grid-cols-6 gap-x-7 gap-y-4 py-2 px-4 border mt-3 rounded-lg">
                    @foreach ($pelajaran as $item)
                        <div class="flex items-center">
                            @if (
                                $belajar->contains(function ($value) use ($item) {
                                    return $value->id === $item->id;
                                }))
                                <x-text-input id="pelajaran" type="checkbox" name="pelajaran[]"
                                    value="{{ $item->id }}" checked />
                            @else
                                <x-text-input id="pelajaran" type="checkbox" name="pelajaran[]"
                                    value="{{ $item->id }}" />
                            @endif
                            <span class="text-sm text-gray-700 ml-2">{{ $item->nama_pelajaran }}</span>
                        </div>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('pelajaran')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-secondary-button href="{{ route('belajar.index') }}">Kembali</x-primary-button>

                <x-blue-button class="ml-4">
                    {{ __('Simpan') }}
                </x-blue-button>
            </div>
        </form>
    </div>

</x-admin-layout>
