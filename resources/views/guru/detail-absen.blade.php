<x-admin-layout>
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
      <div class="flex justify-between">

        <h2 class="text-lg mb-3">Data Absen {{ $tanggal }}</h2>
        <h2 class="text-lg mb-3">Kelas {{ $kelas->nama_kelas }}</h2>
      </div>
      <div>
          <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead class="bg-gray-100">
                  <tr>
                      <th scope="col" class="px-6 py-3">No</th>
                      <th scope="col" class="px-6 py-3">Nama Siswa</th>
                      <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                      <th scope="col" class="px-6 py-3">Keterangan</th>
                      <th scope="col" class="px-6 py-3">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($absensi as $data)
                      <tr class="bg-white hover:bg-gray-100" x-data="dataAbsen()" x-init="addKeteranganAndId('{{ $data->keterangan }}', '{{ $data->id }}')">
                          <td class="py-2 px-3 text-center">{{ $loop->iteration }}</td>
                          <td class="py-2 px-3 text-center">{{ $data->siswa->nama_siswa }}</td>
                          <td class="py-2 px-3 text-center">{{ $data->siswa->jenis_kelamin }}</td>
                          <td class="py-2 px-3 text-center" x-text="keterangan">{{ $data->keterangan }}</td>
                          <td class="py-2 px-3 text-center">
                              <x-blue-button type="button" @click="fetchKeterangan('H')">H</x-blue-button>
                              <x-primary-button type="button" @click="fetchKeterangan('S')">S</x-primary-button>
                              <x-success-button type="button" @click="fetchKeterangan('I')">I</x-success-button>
                              <x-danger-button type="button" @click="fetchKeterangan('A')">A</x-danger-button>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <script>
    function dataAbsen(){
      return {
        id: '',
        keterangan : '',
        async fetchKeterangan(keterangan){
          const id = this.id;
          this.keterangan = '...';
          const response = await axios.put('{{ route('absensi.store') }}/' + id, {keterangan});
          if(response.statusText === 'OK'){
            this.keterangan = response.data.keterangan;
          }else{
            this.keterangan = 'Error';
          }
        },
        addKeteranganAndId(keterangan, id){
          this.keterangan = keterangan;
          this.id = id;
        }
      }
    }
  </script>
</x-admin-layout>
