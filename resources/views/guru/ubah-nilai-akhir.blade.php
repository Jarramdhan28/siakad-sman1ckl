<x-admin-layout>
  <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Ubah Data Nilai Akhir</span></p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Ubah Nilai Akhir jika ada yang salah</p>
  </div>

  <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
      <form method="POST" action="{{ route('nilai-akhir.update', $siswa->id) }}" x-data="{ tabActive: 'siswa', dataNilai: {{ $nilaiAkhir->toJson() }} }">
          @csrf
          @method('put')
          <div class="flex mb-2">
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'siswa' ? 'border-blue-500 text-blue-500' : ''"
                  @click="tabActive = 'siswa'">Data Siswa</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'pengetahuan' ? 'border-blue-500 text-blue-500' : ''"
                  @click="tabActive = 'pengetahuan'">Nilai Pengetahuan</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'keterampilan' ? 'border-blue-500 text-blue-500' : ''"
                  @click="tabActive = 'keterampilan'">Nilai Keterampilan</button>
          </div>
          <div x-show="tabActive == 'siswa'">
              <h2 class="text-lg font-medium text-gray-900 mb-3">Data Siswa</h2>
              <div>
                  <x-input-label for="kelas_id" :value="__('Nama Kelas')" />
                  <x-select id="kelas_id" class="block mt-1 w-full" type="text" name="kelas_id" disabled>
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                  </x-select>
                  <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
              </div>
              <div class="mt-4">
                  <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                  <x-select id="siswa_id" class="block mt-1 w-full" type="text" name="siswa_id" disabled>
                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                  </x-select>
                  <x-input-error :messages="$errors->get('siswa_id')" class="mt-2" />
              </div>
          </div>

          <div x-show="tabActive === 'pengetahuan'">
              <h2 class="text-lg font-medium text-gray-900 mb-3">Pengetahuan</h2>

              <div>
                  <x-input-label for="nilai_pengetahuan" :value="__('Nilai pengetahuan')" />
                  <x-text-input id="nilai_pengetahuan" class="block mt-1 w-full" type="number" x-bind:value="dataNilai.pengetahuan ? dataNilai.pengetahuan[0].nilai : '0'" name="nilai_pengetahuan" disabled />
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
             <x-secondary-button href="{{ route('nilai-akhir.index') }}">Kembali</x-primary-button>

                <x-blue-button class="ml-4">
                    {{ __('Simpan') }}
                </x-blue-button>
          </div>
      </form>
  </div>

</x-admin-layout>
