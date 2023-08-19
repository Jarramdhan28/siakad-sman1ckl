<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold md:text-5xl text-2xl">{{$informasi->judul}}</span>
    </div>

    <div class="">
        <span class="font-bold text-sm">Tanggal : {{$informasi->tanggal}}</span>
    </div>

    <div class="pt-4">
        <span>
            {!! nl2br($informasi->isi) !!}
        </span>
    </div>

    <div class="flex items-center justify-end mt-4">
        <a href="{{ route('informasi.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>
    </div>
</x-admin-layout>
