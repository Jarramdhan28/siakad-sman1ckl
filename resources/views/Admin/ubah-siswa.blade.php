<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Ubah Data Kelas</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('ubahSiswa', $siswa->id) }}">
            @csrf
            @method('patch')
            <div class="mt-4">
                <x-input-label for="nis" :value="__('NIS')" />
                <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" value="{{ $siswa->nis }}" required autofocus autocomplete="nis" />
                <x-input-error :messages="$errors->get('nis')" class="mt-2" />
            </div>

            {{-- Nama siswa --}}
            <div class="mt-4">
                <x-input-label for="nama_siswa" :value="__('Nama Siswa')" />
                <x-text-input id="nama_siswa" class="block mt-1 w-full" type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required autofocus autocomplete="nama_siswa" />
                <x-input-error :messages="$errors->get('nama_siswa')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" value="{{ date('Y-m-d', strtotime($siswa->tanggal_lahir)) }}" required autofocus autocomplete="tanggal_lahir" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                    <option value="" selected disabled>-- Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" value="{{ $siswa->alamat }}" required autofocus autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            {{-- No HP --}}
            <div class="mt-4">
                <x-input-label for="no_hp" :value="__('No HP')" />
                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ $siswa->no_hp }}" required autofocus autocomplete="no_hp" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            {{-- Kelas --}}
            <div class="mt-4">
                <x-input-label for="kelas_id" :value="__('Kelas')" />
                <select name="kelas_id" id="kelas_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                    <option value="" selected disabled>-- Kelas --</option>
                    @foreach ($kelas as $data )
                        <option value="{{$data->id}}" {{ $data->id == $siswa->kelas_id ? 'selected' : '' }}>{{$data->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-text-input type="hidden" name="role" value="{{ $siswa->role }}" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $siswa->email }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('adminSiswa')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>

                <x-primary-button class="ml-4">
                    {{ __('Ubah Data Siswa') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
