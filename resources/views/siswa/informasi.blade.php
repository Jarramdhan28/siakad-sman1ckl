<x-siswa-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Informasi Terbaru</span>
    </div>

    <div class="main">
        <!-- component -->
        <div class="flex flex-col">
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($informasi as $data )
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$data->judul}}</h5>
                        </a>

                        <p class="mb-3 font-normal text-gray-700 ">{{substr($data->isi, 0, 100)}}...</p>

                        <a href="{{ route('informasi.show', $data->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Lihat
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-siswa-layout>