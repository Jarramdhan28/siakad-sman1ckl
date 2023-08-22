<x-siswa-layout>
  <div class="pb-6 pt-1">
      <span class="font-bold text-4xl">Halaman Data Daftar Nilai</span>
  </div>

  <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
      <div>
          <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead class="bg-gray-100">
                  <tr>
                      <th scope="col" rowspan="2" class="px-6 py-3">No</th>
                      <th scope="col" rowspan="2" class="px-6 py-3">Nama Pelajaran</th>
                      <th scope="col" colspan="2" class="px-6 py-3">Pengetahuan</th>
                      <th scope="col" colspan="2" class="px-6 py-3">Keterampilan</th>
                  </tr>
                  <tr>
                      <th scope="col" class="px-6 py-3">Nilai</th>
                      <th scope="col" class="px-6 py-3">Keterangan</th>
                      <th scope="col" class="px-6 py-3">Nilai</th>
                      <th scope="col" class="px-6 py-3">Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($nilaiAkhir as $data)
                      <tr class="bg-white hover:bg-gray-100">
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{ $data->nama_pelajaran }}</td>
                          <td class="text-center">{{ $data->pengetahuan ? $data->pengetahuan['nilai'] : '0' }}</td>
                          <td class="text-center">{{ $data->pengetahuan ? $data->pengetahuan['keterangan'] : '' }}</td>
                          <td class="text-center">{{ $data->keterampilan ? $data->keterampilan['nilai'] : '0' }}</td>
                          <td class="text-center">{{ $data->keterampilan ? $data->keterampilan['keterangan'] : '' }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
</x-siswa-layout>
