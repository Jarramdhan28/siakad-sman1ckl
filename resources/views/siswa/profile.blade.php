<x-siswa-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Halaman Ubah Profile</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Silahkan Ubah Data yang Salah Menjadi Benar</p>
    </div>

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

    <div class="flex flex-col">
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
                <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
                    <span class="text-2xl font-semibold">Ubah Data Diri Anda</span>
                    <form method="POST" action="{{ route('profileSiswa.update', auth('siswa')->user()->id) }}">
                        @csrf
                        @method('put')
                        <div class="mt-4">
                            <x-input-label for="nis" :value="__('NIS')" />
                            <x-text-input id="nis" class="block mt-1 w-full disabled:bg-gray-100" type="number" value="{{ auth('siswa')->user()->nis }}" autofocus autocomplete="nis" disabled/>
                            <input type="hidden" name="nis" value="{{ auth('siswa')->user()->nis }}">
                            <x-input-error :messages="$errors->get('nis')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nama_siswa" :value="__('Nama Guru')" />
                            <x-text-input id="text-input" class="block mt-1 w-full" type="text" name="nama_siswa" value="{{ auth('siswa')->user()->nama_siswa }}" required autofocus autocomplete="nama_siswa" />
                            <x-input-error :messages="$errors->get('nama_siswa')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" value="{{ date('Y-m-d', strtotime(auth('siswa')->user()->tanggal_lahir)) }}" required autofocus autocomplete="tanggal_lahir" />
                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <x-select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full">
                                <option value="" selected disabled>-- Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ auth('siswa')->user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ auth('siswa')->user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" value="{{ auth('siswa')->user()->alamat }}" required autofocus autocomplete="alamat" />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="no_hp" :value="__('No HP')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ auth('siswa')->user()->no_hp }}" required autofocus autocomplete="no_hp" />
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-text-input type="hidden" name="kelas_id" value="{{ auth('siswa')->user()->kelas_id }}" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth('siswa')->user()->email }}" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-blue-button class="ml-4">
                                {{ __('Simpan') }}
                            </x-blue-button>
                        </div>
                    </form>
                </div>

                {{-- Form Ubah Password --}}
                <div class="w-full max-w-xll p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 h-max">
                    <span class="text-2xl font-semibold">Ubah Password</span>
                    <form method="POST" action="{{ route('profileSiswa.pass', auth('siswa')->user()->id) }}">
                        @csrf
                        @method('put')
                        <div class="mt-4">
                            <x-input-label for="current_password" :value="__('Password Lama')" />
                            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password Baru')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-blue-button class="ml-4">
                                {{ __('Simpan') }}
                            </x-blue-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

</x-siswa-layout>
