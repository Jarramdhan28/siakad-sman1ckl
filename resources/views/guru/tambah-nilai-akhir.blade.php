<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Tambah Data Nilai Akhir</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('nilai-akhir.store') }}" x-data="{ kelasId: '', siswaId: '', dataSiswa: [], tabActive: 'siswa', dataNilai: [] }" x-init="
        $watch('kelasId', id => axios.get('{{ route('siswa.getByKelas', 'id') }}'.replace('id', id)).then(res => dataSiswa = res.data, siswaId = ''));
        $watch('siswaId', id => axios.get('{{ route('nilai-akhir.getBySiswa', 'id') }}'.replace('id', id)).then(res => dataNilai = res.data).catch(_ => dataNilai = []));
        ">
            @csrf
            <div class="flex mb-2">
                <button type="button"
                    class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                    :class="tabActive === 'siswa' ? 'border-blue-500 text-blue-500' : ''"
                    @click="tabActive = 'siswa'">Data Siswa</button>
                <button type="button"
                    class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                    :class="tabActive === 'pengetahuan' ? 'border-blue-500 text-blue-500' : ''"
                    @click="tabActive = 'pengetahuan'" :disabled="siswaId === ''">Nilai Pengetahuan</button>
                <button type="button"
                    class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                    :class="tabActive === 'keterampilan' ? 'border-blue-500 text-blue-500' : ''"
                    @click="tabActive = 'keterampilan'" :disabled="siswaId === ''">Nilai Keterampilan</button>
            </div>
            <div x-show="tabActive == 'siswa'">
                <h2 class="text-lg font-medium text-gray-900 mb-3">Data Siswa</h2>
                <div>
                    <x-input-label for="kelas_id" :value="__('Nama Kelas')" />
                    <x-select id="kelas_id" class="block mt-1 w-full" type="text" name="kelas_id" :value="old('kelas_id')"
                        x-model="kelasId" required autofocus>
                        <option value="" selected hidden disabled>-- Pilih Kelas --</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                    <x-select id="siswa_id" class="block mt-1 w-full" type="text" name="siswa_id" :value="old('siswa_id')"
                        x-model="siswaId" x-bind:disabled="dataSiswa.length < 1" required>
                        <option value="" selected hidden disabled>-- Pilih Siswa --</option>
                        <template x-for="siswa in dataSiswa" :key="siswa.id">
                            <option :value="siswa.id" x-text="siswa.nama_siswa"></option>
                        </template>
                    </x-select>
                    <x-input-error :messages="$errors->get('siswa_id')" class="mt-2" />
                </div>
            </div>

            <div x-show="tabActive === 'pengetahuan'">
                <h2 class="text-lg font-medium text-gray-900 mb-3">Pengetahuan</h2>

                <div>
                    <x-input-label for="nilai_pengetahuan" :value="__('Nilai pengetahuan')" />
                    <x-text-input id="nilai_pengetahuan" class="block mt-1 w-full" type="number" x-bind:value="dataNilai.pengetahuan ? dataNilai.pengetahuan[0].nilai : '0'" name="nilai_pengetahuan" />
                </div>

                <div class="mt-4">
                  <x-input-label for="keterangan_pengetahuan" :value="__('Keterangan')" />
                  <x-text-area id="keterangan_pengetahuan" class="block mt-1 w-full" x-bind:value="dataNilai.pengetahuan ? dataNilai.pengetahuan[0].keterangan : ''" name="keterangan_pengetahuan" />
                </div>
            </div>

            <div x-show="tabActive === 'keterampilan'">
                <h2 class="text-lg font-medium text-gray-900 mb-3">Keterampilan</h2>

                <div>
                    <x-input-label for="nilai_keterampilan" :value="__('Nilai Keterampilan')" />
                    <x-text-input id="nilai_keterampilan" class="block mt-1 w-full" type="number" x-bind:value="dataNilai.keterampilan ? dataNilai.keterampilan[0].nilai : '0'" name="nilai_keterampilan" />
                </div>

                <div class="mt-4">
                  <x-input-label for="keterangan_keterampilan" :value="__('Keterangan')" />
                  <x-text-area id="keterangan_keterampilan" class="block mt-1 w-full" x-bind:value="dataNilai.keterampilan ? dataNilai.keterampilan[0].keterangan : ''" name="keterangan_keterampilan" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button href="{{ route('nilai-akhir.index') }}">Kembali</x-primary-button>

                <x-primary-button class="ml-4">
                    {{ __('Tambah Data Nilai') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
