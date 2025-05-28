<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="update">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Industri</label>
                        <input type="text" wire:model="nama" id="nama" 
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                        @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Bidang Usaha -->
                    <div>
                        <label for="bidang_usaha" class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                        <input type="text" wire:model="bidang_usaha" id="bidang_usaha" 
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                        @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <!-- Kontak -->
                    <div>
                        <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak</label>
                        <input type="text" wire:model="kontak" id="kontak" 
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                        @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" id="email" 
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mb-4">
                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea wire:model="alamat" id="alamat" rows="3"
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"></textarea>
                        @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button"
                        onclick="window.history.back();"
                        class="px-3 py-1.5 text-sm rounded-md border-2 border-gray-400 text-black transition duration-200 hover:border-red-500 hover:shadow-md hover:shadow-red-300">
                        Batal
                    </button>

                    <button type="submit"
                        class="ml-3 px-3 py-1.5 text-sm rounded-md border-2 border-gray-400 text-black transition duration-200 hover:border-blue-500 hover:shadow-md hover:shadow-blue-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>