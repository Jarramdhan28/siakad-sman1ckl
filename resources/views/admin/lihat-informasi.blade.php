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
        <x-blue-button href="{{ route('informasi.index') }}">Kembali</x-primary-button>
    </div>
</x-admin-layout>
