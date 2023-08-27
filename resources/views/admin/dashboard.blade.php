<x-admin-layout>
    <div class="pb-6 pt-1">
        <p class="font-bold md:text-5xl text-2xl">Selamat Datang Di SMAN 1 Cikalong</p>
        <p class="text-gray-500 py-1 text-xs md:text-lg">Ini merupakan jumlah data Guru, Siswa, Mata Pelajaran, dan Kelas
        </p>
    </div>

    <div class="main">
        <!-- component -->
        <div class="flex flex-col">
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <div class="flex items-start rounded-xl bg-white hover:bg-gray-100 p-4 shadow-lg">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </div>

                    <div class="ml-4 pt-3" x-data="">
                        <h2 class="font-semibold">{{ $guru }} Guru</h2>
                    </div>
                </div>

                <div class="flex items-start rounded-xl bg-white hover:bg-gray-100 p-4 shadow-lg">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </div>

                    <div class="ml-4 pt-3">
                        <h2 class="font-semibold">{{ $siswa }} Siswa</h2>
                    </div>
                </div>

                <div class="flex items-start rounded-xl bg-white hover:bg-gray-100 p-4 shadow-lg">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>

                    <div class="ml-4 pt-3">
                        <h2 class="font-semibold">{{ $pelajaran }} Pelajaran</h2>
                    </div>
                </div>

                <div class="flex items-start rounded-xl bg-white hover:bg-gray-100 p-4 shadow-lg">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 1h12M3 1v16M3 1H2m13 0v16m0-16h1m-1 16H3m12 0h2M3 17H1M6 4h1v1H6V4Zm5 0h1v1h-1V4ZM6 8h1v1H6V8Zm5 0h1v1h-1V8Zm-3 4h2a1 1 0 0 1 1 1v4H7v-4a1 1 0 0 1 1-1Z" />
                        </svg>
                    </div>

                    <div class="ml-4 pt-3">
                        <h2 class="font-semibold">{{ $kelas }} Kelas</h2>
                    </div>
                </div>
            </div>
        </div>

        <canvas class="mt-10" id="myChart"></canvas>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            const ctx = document.getElementById('myChart');
            const totalSiswa = {!! json_encode($totalSiswa) !!};
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($allNamaKelas) !!},
                    datasets: [
                    {
                        label: 'Laki-laki',
                        data: totalSiswa.map(total => total[0])
                    },
                    {
                        label: 'Perempuan',
                        data: totalSiswa.map(total => total[1])
                    },
                ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    </script>
</x-admin-layout>
