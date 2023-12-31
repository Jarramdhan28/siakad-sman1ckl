<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => '1234',
            'nama_guru' => 'Admin',
            'tanggal_lahir' => '2000-11-11',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'admin@gmail.com',
            'no_hp' => '08921984123',
            'pelajaran_id' => '1',
            'role' => '1',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '0437772673130172',
            'nama_guru' => 'ACENG RAHMAT, S.Pd.',
            'tanggal_lahir' => '1984-10-10',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'aceng@gmail.com',
            'no_hp' => '081239854123',
            'pelajaran_id' => '2',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '0533775676230042',
            'nama_guru' => 'ADITIA LUANDA, S.Pd.',
            'tanggal_lahir' => '1994-09-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cikalong',
            'email' => 'aditia@gmail.com',
            'no_hp' => '081233874123',
            'pelajaran_id' => '11',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '197308152021211002',
            'nama_guru' => 'AGUS GINAWAN, S.IP, S.T',
            'tanggal_lahir' => '1994-09-01',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Ciamis',
            'email' => 'agus@gmail.com',
            'no_hp' => '081239983123',
            'pelajaran_id' => '10',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '196407061989011005',
            'nama_guru' => 'ANDI, S.Pd.',
            'tanggal_lahir' => '1974-09-01',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'andi@gmail.com',
            'no_hp' => '081298763120',
            'pelajaran_id' => '8',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '9736771672130102',
            'nama_guru' => 'ANDI PERMANA, S.Pd',
            'tanggal_lahir' => '1984-12-21',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'andip@gmail.com',
            'no_hp' => '081988733129',
            'pelajaran_id' => '9',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '2640765666110052',
            'nama_guru' => 'ANGGA TAUFIK, S.Pd.',
            'tanggal_lahir' => '1984-12-21',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'angga@gmail.com',
            'no_hp' => '081988733122',
            'pelajaran_id' => '8',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '7362760661110023',
            'nama_guru' => 'ASEP SAEHUDIN, S.Pd.',
            'tanggal_lahir' => '1972-08-11',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'asep@gmail.com',
            'no_hp' => '081989871123',
            'pelajaran_id' => '12',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '1138770672130123',
            'nama_guru' => 'BAYU AJI RAHMATILAH, S.Pd.',
            'tanggal_lahir' => '1992-08-11',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'bayu@gmail.com',
            'no_hp' => '081098111123',
            'pelajaran_id' => '8',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '0759757659200022',
            'nama_guru' => 'CHEVI APRIANTO, S.Pd.',
            'tanggal_lahir' => '1979-02-17',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikalong',
            'email' => 'chevi@gmail.com',
            'no_hp' => '081090171093',
            'pelajaran_id' => '4',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '5452763666110013',
            'nama_guru' => 'DENI PERMANA, M.Pd.',
            'tanggal_lahir' => '1989-02-17',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cikatomas',
            'email' => 'deni@gmail.com',
            'no_hp' => '081098971093',
            'pelajaran_id' => '14',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '3542765667210063',
            'nama_guru' => 'DESI NURYANTI, S.Pd.',
            'tanggal_lahir' => '1989-02-17',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cikatomas',
            'email' => 'desi@gmail.com',
            'no_hp' => '081128151043',
            'pelajaran_id' => '13',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '4462765667210053',
            'nama_guru' => 'ELIES HENI NOVIANTI, S.Pd.',
            'tanggal_lahir' => '1976-09-27',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cikatomas',
            'email' => 'elies@gmail.com',
            'no_hp' => '081128109463',
            'pelajaran_id' => '5',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '8643754655300022',
            'nama_guru' => 'ERNA ADIYANTI, S.E.',
            'tanggal_lahir' => '1971-10-21',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cikatomas',
            'email' => 'erna@gmail.com',
            'no_hp' => '081897109463',
            'pelajaran_id' => '3',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '196508191988032003',
            'nama_guru' => 'HENI RUKHAENIAH, S.Pd.',
            'tanggal_lahir' => '1971-03-21',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cipatujah',
            'email' => 'heni@gmail.com',
            'no_hp' => '081897109009',
            'pelajaran_id' => '13',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '9759771672130072',
            'nama_guru' => 'JAMILAH, S.Pd.',
            'tanggal_lahir' => '1971-07-11',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cipatujah',
            'email' => 'jamila@gmail.com',
            'no_hp' => '08182199010',
            'pelajaran_id' => '1',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '196504021990011001',
            'nama_guru' => 'KASNADINATA, S.Pd.',
            'tanggal_lahir' => '1971-07-11',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cipatujah',
            'email' => 'kasna@gmail.com',
            'no_hp' => '08198711901',
            'pelajaran_id' => '4',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '0236770671230213',
            'nama_guru' => 'LELITA LISTIAN RUKMANA, S.Pd.',
            'tanggal_lahir' => '1971-07-11',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Tasikmalaya',
            'email' => 'lelita@gmail.com',
            'no_hp' => '08108711901',
            'pelajaran_id' => '4',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '1351765667210043',
            'nama_guru' => 'LIGA SILVIANA, S.Pd.',
            'tanggal_lahir' => '1987-01-11',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Tasikmalaya',
            'email' => 'liga@gmail.com',
            'no_hp' => '08108871901',
            'pelajaran_id' => '16',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '196512101991031009',
            'nama_guru' => 'Drs. LUKMAN, M.Pd.',
            'tanggal_lahir' => '1971-08-13',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Tasikmalaya',
            'email' => 'lukman@gmail.com',
            'no_hp' => '08108871999',
            'pelajaran_id' => '2',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);

        Guru::create([
            'nip' => '8036729632200003',
            'nama_guru' => 'MAMAT EFENDI',
            'tanggal_lahir' => '1971-08-13',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Tasikmalaya',
            'email' => 'mamat@gmail.com',
            'no_hp' => '08504871999',
            'pelajaran_id' => '9',
            'role' => '0',
            'password' => Hash::make('1234'),
        ]);
    }
}
