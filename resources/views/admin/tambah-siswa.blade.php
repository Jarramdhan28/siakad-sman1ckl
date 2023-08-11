<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Tambah Data Siswa</span>
    </div>

    <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('tambahSiswa') }}">
            @csrf
            <div>
                <x-input-label for="nis" :value="__('NIS')" />
                <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required autofocus autocomplete="nis" />
                <x-input-error :messages="$errors->get('nis')" class="mt-2" />
            </div>

            {{-- Nama Guru --}}
            <div class="mt-4">
                <x-input-label for="nama_siswa" :value="__('Nama Siswa')" />
                <x-text-input id="nama_siswa" class="block mt-1 w-full" type="text" name="nama_siswa" :value="old('nama_siswa')" required autofocus autocomplete="nama_siswa" />
                <x-input-error :messages="$errors->get('nama_siswa')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required autofocus autocomplete="tanggal_lahir" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                    <option value="" selected disabled>-- Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>
            {{-- Alamat --}}
            <div class="mt-4">
                <x-input-label for="alamat" :value="__('Alamat')" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            {{-- No HP --}}
            <div class="mt-4">
                <x-input-label for="no_hp" :value="__('No HP')" />
                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')" required autofocus autocomplete="no_hp" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Kelas --}}
            <div class="mt-4">
                <x-input-label for="kelas_id" :value="__('Kelas')" />
                <select name="kelas_id" id="kelas_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                    <option value="" selected disabled>-- Kelas --</option>
                    @foreach ($kelas as $data )
                        <option value="{{$data->id}}">{{$data->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('adminSiswa')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Kembali</a>

                <x-primary-button class="ml-4">
                    {{ __('Tambah Data Siswa') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-admin-layout>
