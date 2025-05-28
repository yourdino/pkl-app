<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">
                    Selamat datang <span style="color:rgb(240, 100, 159);">
                        {{ Auth::user()->currentTeam->name ?? Auth::user()->name }}
                    </span>!
                </h1>

                {{-- Tampilan khusus untuk siswa --}}
                @if ($user->hasRole('siswa'))
                    <div class="grid gap-6" style="grid-template-columns: 200px 0.7fr 1fr 1fr;">
                        <!-- Kolom 1: Foto -->
                        <div class="flex justify-center">
                            @if ($siswa && $siswa->foto)
                                <img src="{{ asset('storage/' . $siswa->foto) }}"
                                    alt="Foto Siswa"
                                    style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;" />
                            @else
                                <div class="w-40 h-40 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <!-- Kolom 2: Detail Siswa -->
                        <div>
                            <h2 class="text-lg font-semibold mb-3">Informasi Siswa</h2>
                            <p class="text-base"><strong>Nama :</strong> {{ $siswa->nama ?? '-' }}</p>
                            <p class="text-base"><strong>NIS :</strong> {{ $siswa->nis ?? '-' }}</p>
                            <p class="text-base"><strong>Gender :</strong> {{ $siswa->gender ?? '-' }}</p>
                            <p class="text-base"><strong>Email :</strong> {{ Auth::user()->email }}</p>
                        </div>

                        <!-- Kolom 3: Detail PKL -->
                        <div>
                            <h2 class="text-lg font-semibold mb-3">Detail PKL</h2>
                            @forelse ($pkls as $pkl)
                                <div class="mb-4">
                                    <p class="text-base"><strong>Industri :</strong> {{ $pkl->industri->nama ?? '-' }}</p>
                                    <p class="text-base"><strong>Guru Pembimbing :</strong> {{ $pkl->guru->nama ?? '-' }}</p>

                                    @php
                                        $mulai = \Carbon\Carbon::parse($pkl->mulai);
                                        $selesai = \Carbon\Carbon::parse($pkl->selesai);
                                        $sekarang = \Carbon\Carbon::now();

                                        $totalHari = $mulai->diffInDays($selesai);
                                        $hariBerjalan = $mulai->diffInDays(min($sekarang, $selesai));
                                        $persentase = $totalHari > 0 ? round(($hariBerjalan / $totalHari) * 100) : 0;
                                    @endphp

                                    <div class="mt-2">
                                        <p class="text-base mb-1">Progress PKL</p>
                                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                            <div
                                                class="h-3 rounded-full"
                                                style="width: {{ $persentase }}%;
                                                       background: linear-gradient(90deg,rgb(209, 78, 144),rgb(241, 130, 186));
                                                       animation: progressBarAnimation 2s ease forwards;">
                                            </div>
                                        </div>
                                        <p class="text-xs text-right mt-1">{{ $persentase }}%</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-lg">Data PKL belum tersedia.</p>
                            @endforelse
                        </div>

                        <!-- Kolom 4: Aksi -->
                        <div>
                            <h2 class="text-lg font-semibold mb-3 text-pink-600">Tambah Data & Lapor PKL</h2>
                            <p class="mb-4 text-pink-500">Tambah data industri dan laporan PKL kamu dengan mudah</p>

                            <button type="button"
                                onclick="window.location='{{ route('industri.index') }}';"
                                class="px-3 py-1.5 text-sm rounded-md border-2 border-gray-400 text-black transition duration-200 hover:border-red-500 hover:shadow-md hover:shadow-red-300">
                                Tambah Data Industri
                            </button>

                            <button type="button"
                                onclick="window.location='{{ route('pkl.index') }}';"
                                class="ml-3 px-3 py-1.5 text-sm rounded-md border-2 border-gray-400 text-black transition duration-200 hover:border-blue-500 hover:shadow-md hover:shadow-blue-300">
                                Lapor PKL
                            </button>
                        </div>
                    </div>
                @endif

                {{-- Tampilan untuk guru --}}
                @if ($user->hasRole('guru'))
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold text-indigo-600 mb-4">Halo {{ $user->name }} 👋 (Guru)</h2>
                        <p class="mb-4">Selamat datang di dashboard guru. Anda dapat melihat data siswa bimbingan atau laporan PKL mereka.</p>

                        <a href="{{ route('pkl.index') }}"
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Lihat Data PKL
                        </a>
                    </div>
                @endif

                {{-- Tampilan untuk admin --}}
                @if ($user->hasRole('admin'))
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold text-green-600 mb-4">Dashboard Admin</h2>
                        <p class="mb-4">Silakan kelola data pengguna, industri, guru, dan siswa melalui menu admin.</p>

                        <a href="/admin"
                           class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                            Menu Admin
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
