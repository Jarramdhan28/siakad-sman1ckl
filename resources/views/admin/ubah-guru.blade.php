<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Ubah Data Guru</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form method="POST" action="{{ route('guru.update', $guru->id) }}">
            @csrf
            @method('put')
            <div class="mt-4">
                <x-input-label for="nip" :value="__('NIP')" />
                <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" value="{{ $guru->nip }}" required autofocus autocomplete="nip" />
                <x-input-error :messages="$errors->get('nip')" class="mt-2" />
            </div>

            {{-- Nama Guru --}}
            <div class="mt-4">
                <x-input-label for="nama_guru" :value="__('Nama Guru')" />
                <x-text-input id="nama_guru" class="block mt-1 w-full" type="text" name="nama_guru" value="{{ $guru->nama_guru }}" required autofocus autocomplete="nama_guru" />
                <x-input-error :messages="$errors->get('nama_guru')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" value="{{ date('Y-m-d', strtotime($guru->tanggal_lahir)) }}" required autofocus autocomplete="tanggal_lahir" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <x-select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full">
                    <option value="" selected disabled>-- Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </x-select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" value="{{ $guru->alamat }}" required autofocus autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            {{-- No HP --}}
            <div class="mt-4">
                <x-input-label for="no_hp" :value="__('No HP')" />
                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ $guru->no_hp }}" required autofocus autocomplete="no_hp" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            {{-- Pelajaran --}}
            <div class="mt-4">
                <x-input-label for="pelajaran_id" :value="__('Mata Pelajaran')" />
                <x-select name="pelajaran_id" id="pelajaran_id" class="block mt-1 w-full">
                    <option value="" selected disabled>-- Mata Pelajaran --</option>
                    @foreach ($pelajaran as $data )
                        <option value="{{$data->id}}" {{ $data->id == $guru->pelajaran_id ? 'selected' : '' }}>{{$data->nama_pelajaran}}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-text-input type="hidden" name="role" value="{{ $guru->role }}" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $guru->email }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button href="{{ route('guru.index')}}">Kembali</x-primary-button>

                <x-primary-button class="ml-4">
                    {{ __('Ubah Data Guru') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
