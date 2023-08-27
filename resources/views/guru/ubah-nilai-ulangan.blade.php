<x-admin-layout>
  <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Ubah Data Nilai Ujian</span></p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Masukan Nilai Ujian yang sesuai</p>
  </div>

  <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
      <form method="POST" action="{{ route('nilai-ulangan.update', $siswa->id) }}" x-data="{ tabActive: 'siswa', dataNilai: {{ $nilaiUlangan->toJson() }}}" >
          @csrf
          @method('put')
          <div class="flex mb-2">
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'siswa' ? 'border-blue-500 text-blue-500' : ''"
                  @click="tabActive = 'siswa'">Data Siswa</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'tugas' ? 'border-blue-500 text-blue-500' : ''" @click="tabActive = 'tugas'"
                  >Nilai Tugas</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'ulangan' ? 'border-blue-500 text-blue-500' : ''"
                  @click="tabActive = 'ulangan'" >Nilai Ulangan</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'uts' ? 'border-blue-500 text-blue-500' : ''" @click="tabActive = 'uts'"
                  >UTS</button>
              <button type="button"
                  class="text-gray-700 disabled:text-gray-400 border-b-2 font-semibold px-4 py-2 enabled:hover:border-blue-500 enabled:hover:text-blue-500"
                  :class="tabActive === 'uas' ? 'border-blue-500 text-blue-500' : ''" @click="tabActive = 'uas'"
                  >UAS</button>
          </div>
          <div x-show="tabActive == 'siswa'">
              <h2 class="text-lg font-medium text-gray-900 mb-3">Data Siswa</h2>
              <div>
                  <x-input-label for="kelas_id" :value="__('Nama Kelas')" />
                  <x-select id="kelas_id" class="block mt-1 w-full" type="text" name="kelas_id" :value="old('kelas_id')" required autofocus disabled>
                    <option value="{{ $kelas->id }}" selected>{{ $kelas->nama_kelas }}</option>
                  </x-select>
                  <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
              </div>
              <div class="mt-4">
                  <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                  <x-select id="siswa_id" class="block mt-1 w-full" type="text" name="siswa_id" :value="old('siswa_id')" disabled required>
                    <option value="{{ $siswa->id }}" disbaled>{{ $siswa->nama_siswa }}</option>
                  </x-select>
                  <x-input-error :messages="$errors->get('siswa_id')" class="mt-2" />
              </div>
          </div>

          <div x-show="tabActive === 'tugas'" x-data="{ dataTugas: [] }" x-init="
              console.log(dataNilai);
              if(dataNilai.tugas){
                  dataNilai.tugas.forEach((_, i) => i > 0 ? dataTugas.push(Math.random()) : '')
              }
              ">
              <h2 class="text-lg font-medium text-gray-900 mb-3">Nilai Tugas</h2>

              <div>
                  <x-input-label for="nama_tugas" :value="__('Nama Tugas')" />
                  <x-text-input id="nama_tugas" class="block mt-1 w-full" type="text" x-bind:value="dataNilai.tugas ? dataNilai.tugas[0].nama_nilai : ''" name="nama_tugas[]" />
              </div>
              <div class="mt-4">
                  <x-input-label for="nilai" :value="__('Nilai')" />
                  <x-text-input id="nilai" class="block mt-1 w-full" type="text" x-bind:value="dataNilai.tugas ? dataNilai.tugas[0].nilai : '0'" name="nilai_tugas[]" />
              </div>
              <template x-for="(key, index) in dataTugas" :key="key">
                  <div class="pt-9 relative border-t-2 mt-5">
                      <button
                      type="button"
                      class="absolute top-3 right-5 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-300 py-2 px-4 rounded-lg"
                      @click="dataTugas.splice(index, 1)"
                      >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                      </button>
                      <div>
                          <x-input-label for="nama_tugas" :value="__('Nama Tugas')" />
                          <x-text-input id="nama_tugas" class="block mt-1 w-full" x-bind:value="dataNilai.tugas ? dataNilai.tugas[index + 1]?.nama_nilai : ''" type="text" name="nama_tugas[]" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="nilai" :value="__('Nilai')" />
                          <x-text-input id="nilai" class="block mt-1 w-full" type="text" name="nilai_tugas[]" x-bind:value="dataNilai.tugas ? dataNilai.tugas[index + 1]?.nilai : '0'" />
                      </div>
                  </div>
              </template>
              <x-blue-button type="button" class="my-3 !block w-full" @click="dataTugas.push(Math.random())">Tambah Nilai Tugas</x-blue-button>
          </div>

          <div x-show="tabActive === 'ulangan'" x-data="{ dataUlangan: [] }" x-init="
              if(dataNilai.ulangan){
                  dataNilai.ulangan.forEach((_, i) => i > 0 ? dataUlangan.push(Math.random()) : '')
              }">
              <h2 class="text-lg font-medium text-gray-900 mb-3">Nilai ulangan</h2>

              <div>
                  <x-input-label for="nama_ulangan" :value="__('Nama ulangan')" />
                  <x-text-input id="nama_ulangan" class="block mt-1 w-full" type="text" x-bind:value="dataNilai.ulangan ? dataNilai.ulangan[0].nama_nilai : ''" name="nama_ulangan[]" />
              </div>
              <div class="mt-4">
                  <x-input-label for="nilai" :value="__('Nilai')" />
                  <x-text-input id="nilai" class="block mt-1 w-full" type="number" name="nilai_ulangan[]" x-bind:value="dataNilai.ulangan ? dataNilai.ulangan[0].nilai : '0'" />
              </div>
              <template x-for="(key, index) in dataUlangan" :key="key">
                  <div class="pt-9 relative border-t-2 mt-5">
                      <button
                      type="button"
                      class="absolute top-3 right-5 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition duration-300 py-2 px-4 rounded-lg"
                      @click="dataUlangan.splice(index, 1)"
                      >
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                      </button>
                      <div>
                          <x-input-label for="nama_ulangan" :value="__('Nama ulangan')" />
                          <x-text-input id="nama_ulangan" class="block mt-1 w-full" type="text" x-bind:value="dataNilai.ulangan ? dataNilai.ulangan[index + 1]?.nama_nilai : ''" name="nama_ulangan[]" />
                      </div>
                      <div class="mt-4">
                          <x-input-label for="nilai" :value="__('Nilai')" />
                          <x-text-input id="nilai" class="block mt-1 w-full" type="number" name="nilai_ulangan[]" x-bind:value="dataNilai.ulangan ? dataNilai.ulangan[index + 1]?.nilai : '0'" />
                      </div>
                  </div>
              </template>
              <x-blue-button type="button" class="my-3 !block w-full" @click="dataUlangan.push(Math.random())">Tambah Nilai Ulangan</x-blue-button>
          </div>

          <div x-show="tabActive === 'uts'">
              <h2 class="text-lg font-medium text-gray-900 mb-3">UTS</h2>

              <div>
                  <x-input-label for="nilai" :value="__('Nilai UTS')" />
                  <x-text-input id="nilai" class="block mt-1 w-full" type="number" name="nilai_uts" x-bind:value="dataNilai.uts ? dataNilai.uts[0].nilai : '0'" />
              </div>
          </div>
          <div x-show="tabActive === 'uas'">
              <h2 class="text-lg font-medium text-gray-900 mb-3">UAS</h2>

              <div>
                  <x-input-label for="nilai" :value="__('Nilai UAS')" />
                  <x-text-input id="nilai" class="block mt-1 w-full" x-bind:value="dataNilai.uas ? dataNilai.uas[0].nilai : '0'" type="number" name="nilai_uas"/>
              </div>
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-secondary-button href="{{ route('nilai-ulangan.index') }}">Kembali</x-primary-button>

            <x-blue-button class="ml-4">
                {{ __('Simpan') }}
            </x-blue-button>
          </div>
      </form>
  </div>

</x-admin-layout>
