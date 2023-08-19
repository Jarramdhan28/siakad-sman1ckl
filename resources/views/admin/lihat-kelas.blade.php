<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Halaman Data Siswa Kelas {{$kelas->nama_kelas}}</span>
    </div>

    <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
        <div>
            <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">NIS</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No HP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data )
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="text-center">{{$data->nis}}</td>
                            <td class="text-center">{{$data->nama_siswa}}</td>
                            <td class="text-center">{{$data->jenis_kelamin}}</td>
                            <td class="text-center">{{$data->alamat}}</td>
                            <td class="text-center">{{$data->email}}</td>
                            <td class="text-center">{{$data->no_hp}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
