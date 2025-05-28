<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <!-- Card Container -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="text-lg font-semibold text-gray-800 mb-4">
                    <h2>Detail Industri</h2>
                </div>

                <!-- Industri Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Industri -->
                    <div>
                        <p class="font-medium text-sm text-gray-700">Nama Industri</p>
                        <p class="text-sm text-gray-600">{{ $industri->nama }}</p>
                    </div>

                    <!-- Bidang Usaha -->
                    <div>
                        <p class="font-medium text-sm text-gray-700">Bidang Usaha</p>
                        <p class="text-sm text-gray-600">{{ $industri->bidang_usaha }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <!-- Alamat -->
                    <div>
                        <p class="font-medium text-sm text-gray-700">Alamat</p>
                        <p class="text-sm text-gray-600">{{ $industri->alamat }}</p>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <p class="font-medium text-sm text-gray-700">Kontak</p>
                        <p class="text-sm text-gray-600">{{ $industri->kontak }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <!-- Email -->
                    <div>
                        <p class="font-medium text-sm text-gray-700">Email</p>
                        <p class="text-sm text-gray-600">{{ $industri->email }}</p>
                    </div>

                </div>

                <!-- Button to go back -->
                <div class="mt-6 text-right">
                    <a href="{{ route('industri.index') }}" class="px-4 py-2 text-sm rounded-md border-2 border-gray-400 text-black transition duration-200 hover:border-blue-500 hover:shadow-md hover:shadow-blue-300">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>