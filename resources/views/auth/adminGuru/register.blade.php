<x-guest-layout>
    <form method="POST" action="{{ route('guru/register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required autofocus autocomplete="nip" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        {{-- Nama Guru --}}
        <div class="mt-4">
            <x-input-label for="nama_guru" :value="__('Nama Guru')" />
            <x-text-input id="nama_guru" class="block mt-1 w-full" type="text" name="nama_guru" :value="old('nama_guru')" required autofocus autocomplete="nama_guru" />
            <x-input-error :messages="$errors->get('nama_guru')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required autofocus autocomplete="tanggal_lahir" />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <x-text-input id="jenis_kelamin" class="block mt-1 w-full" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')" required autofocus autocomplete="jenis_kelamin" />
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

        {{-- Pelajaran --}}
        <div class="mt-4">
            <x-input-label for="pelajaran_id" :value="__('Pelajaran id')" />
            <x-text-input id="pelajaran_id" class="block mt-1 w-full" type="text" name="pelajaran_id" :value="old('pelajaran_id')" required autofocus autocomplete="pelajaran_id" />
            <x-input-error :messages="$errors->get('pelajaran_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input type="hidden" name="role" :value="old('role')" required value="0"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
