<x-admin-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Data Mata Pelajaran</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Ini merupakan Data Mata Pelajaran yang ada di SMAN 1 Cikalong</p>
    </div>

    <div class="bg-white shadow-xl rounded-xl py-4 px-7 border border-gray-100">
        @if(session('success'))
        <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 mb-3 rounded relative" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1 1 0 01-1.415 1.414l-3.536-3.536-3.536 3.536a1 1 0 11-1.414-1.414l3.536-3.536-3.536-3.536a1 1 0 111.414-1.414l3.536 3.536 3.536-3.536a1 1 0 111.414 1.414l-3.536 3.536 3.536 3.536z"/>
                </svg>
            </button>
        </div>
        @endif
        <div class="pb-6">
            <a href="{{ route('pelajaran.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Tambah Data Pelajaran</a>
        </div>
        <div>
            <table id="datatable" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelajaran as $data )
                        <tr class="bg-white hover:bg-gray-100">
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$data->nama_pelajaran}}</td>
                            <td class="text-center">
                                <a href="{{ route('pelajaran.edit', $data->id) }}" class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">Ubah</a>
                                <form action="{{ route('pelajaran.destroy', $data->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin?')" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
