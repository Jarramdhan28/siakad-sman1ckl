<x-admin-layout>
    @inject('carbon', 'Carbon\Carbon')
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Halaman Data Absensi</span>
    </div>

    <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
        @if (session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 mb-3 rounded relative"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="this.parentElement.style.display='none'">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.415 1.414l-3.536-3.536-3.536 3.536a1 1 0 11-1.414-1.414l3.536-3.536-3.536-3.536a1 1 0 111.414-1.414l3.536 3.536 3.536-3.536a1 1 0 111.414 1.414l-3.536 3.536 3.536 3.536z" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="pb-6">
            <x-blue-button x-data x-on:click.prevent="$dispatch('open-modal', 'add-absensi')" type="button">Tambah Data
                Absensi
            </x-blue-button>
        </div>
        <div>
            <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Kelas</th>
                        <th scope="col" class="px-6 py-3">Jumlah Hadir</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi as $data)
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $carbon::parse($data['tanggal'])->isoFormat('D MMMM Y') }}</td>
                            <td class="text-center">{{ $data['nama_kelas'] }}</td>
                            <td class="text-center">{{ $data['jumlah_hadir'] }}</td>
                            <td class="text-center">
                                <x-success-button href="{{ route('absensi.show', ['kelas' => $data['kelas_id'], 'tanggal' => $data['tanggal']]) }}">Ubah</x-success-button>
                                <form action="{{ route('absensi.destroy', ['kelas' => $data['kelas_id'], 'tanggal' => $data['tanggal']]) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit"
                                        onclick="return confirm('yakin?')">Hapus</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="add-absensi" maxWidth="lg" focusable>
        <form method="post" action="{{ route('absensi.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tambah Absensi ' . auth()->user()->pelajaran->nama_pelajaran) }}
            </h2>

            <div class="mt-4">
                <x-input-label for="kelas_id" :value="__('Kelas')" />
                <x-select name="kelas_id" id="kelas_id" class="block mt-1 w-full">
                  <option value="" disabled hidden selected>-- Pilih Kelas --</option>
                  @foreach ($kelas as $item)
                      <option value="{{ $item->id }}" @selected(old('kelas_id') === $item->id)>{{ $item->nama_kelas }}</option>
                  @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="tanggal" :value="__('Tanggal')" />
                <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" value="{{ old('tanggal') }}" />
                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Kembali') }}
                </x-secondary-button>

                <x-blue-button class="ml-3">
                    {{ __('Tambah Absensi') }}
                </x-blue-button>
            </div>
        </form>
    </x-modal>
</x-admin-layout>
