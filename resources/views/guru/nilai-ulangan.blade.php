<x-admin-layout>
  <div class="pb-6 pt-1">
      <span class="font-bold text-4xl">Halaman Data Nilai Ulangan</span>
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
      <div class="pb-4 flex justify-between items-center">
          <x-blue-button href="{{ route('nilai-ulangan.create') }}">Tambah Data Ulangan</x-blue-button>
          <div class="w-full md:w-1/3 mb-4">
            <x-input-label for="kelas_id" :value="__('Kelas')" />
            <x-select name="kelas_id" id="kelas_id" class="block mt-1 w-full" x-data="{href : '{{ route('nilai-ulangan.index') }}'}" @change="window.location.href = href + '?kelas_id=' + $el.value">
                @foreach ($allKelas as $kelas)
                    <option value="{{ $kelas->id }}" @selected($kelasId == $kelas->id)>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </x-select>
          </div>
      </div>
      <div>
          <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead class="bg-gray-100">
                  <tr>
                      <th scope="col" class="px-6 py-3">No</th>
                      <th scope="col" class="px-6 py-3">NIS</th>
                      <th scope="col" class="px-6 py-3">Nama Siswa</th>
                      <th scope="col" class="px-6 py-3">Tugas</th>
                      <th scope="col" class="px-6 py-3">Ulangan</th>
                      <th scope="col" class="px-6 py-3">UTS</th>
                      <th scope="col" class="px-6 py-3">UAS</th>
                      <th scope="col" class="px-6 py-3">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($siswa as $data)
                      <tr class="bg-white hover:bg-gray-100">
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $data->nis }}</td>
                          <td class="text-center">{{ $data->nama_siswa }}</td>
                          <td class="text-center">{{ $data->nilaiTotal['tugas'] ?? '0' }}</td>
                          <td class="text-center">{{ $data->nilaiTotal['ulangan'] ?? '0' }}</td>
                          <td class="text-center">{{ $data->nilaiTotal['uts'] ?? '0' }}</td>
                          <td class="text-center">{{ $data->nilaiTotal['uas'] ?? '0' }}</td>
                          <td class="text-center">
                              <x-success-button href="{{ route('nilai-ulangan.edit', $data->id) }}">Ubah</x-success-button>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
</x-admin-layout>
