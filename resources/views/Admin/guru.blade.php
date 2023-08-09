<x-admin-layout>
    <div class="pb-6 pt-1">
        <span class="font-bold text-4xl">Selamat Datang Halaman Guru</span>
    </div>

    <div>
        <table id="guruTable" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">NIP</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">No HP</th>
                    <th scope="col" class="px-6 py-3">Mengajar</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                    <td class="px-6 py-4">asas</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add this script at the end of your <body> -->
    <script>
        $(document).ready(function() {
            $('#guruTable').DataTable();
        });
    </script>

</x-admin-layout>
