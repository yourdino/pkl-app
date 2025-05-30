<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="flex justify-between items-center mb-4">

                <div class="flex justify-start w-full">
                    <form action="{{ route('industri.index') }}" method="GET" class="inline-flex items-center w-1/3 space-x-2">
                        <input wire:model.live="search" type="search" id="search" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                        <button type="submit" class="p-2 bg-gray-800 text-white rounded-md hover:bg-gray-900 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.5 10a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <a href="{{ route('pkl.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"></path>
                    </svg>
                </a>
            </div>

            <div class="relative overflow-x-auto">
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="bg-red-600 bg-opacity-80 text-sm text-white border border-red-400 p-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
                <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase" style="background-color:rgb(165, 156, 247);">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Industri</th>
                            <th scope="col" class="px-6 py-3">Guru Pembimbing</th>
                            <th scope="col" class="px-6 py-3">Mulai</th>
                            <th scope="col" class="px-6 py-3">Selesai</th>
                            <th scope="col" class="px-6 py-3">Durasi (Hari)</th>
                            <!-- <th scope="col" class="px-6 py-3">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody style="background-color:rgb(223, 223, 245);">
                    @php
                        use Carbon\Carbon;
                        $no = $pkls->firstItem() - 1;
                    @endphp

                    @foreach($pkls as $index => $pkl)
                        @php
                            $no++;

                            $mulai = Carbon::parse($pkl->mulai);
                            $selesai = Carbon::parse($pkl->selesai);

                            $durasi = $mulai->diffInDays($selesai); 
                        @endphp
                        <tr class="border-b">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $no }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->siswa->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->industri->nama }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($pkl->guru)
                                    {{ $pkl->guru->nama }}
                                @else
                                    <span class="text-red-500">Belum ditentukan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->mulai }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pkl->selesai }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $durasi }}
                            </td>
                            <!-- <td class="px-6 py-4">
                                <a href="" class="text-blue-500 hover:bg-blue-100 hover:text-blue-700 inline-flex items-center px-3 py-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16.862 2.488a2.07 2.07 0 0 1 2.928 0l1.722 1.722a2.07 2.07 0 0 1 0 2.928l-1.484 1.484-4.65-4.65 1.484-1.484zm-2.254 2.254-10.608 10.61a4.125 4.125 0 0 0-1.015 1.684l-1.842 5.8a.75.75 0 0 0 .95.95l5.8-1.842a4.125 4.125 0 0 0 1.684-1.015l10.61-10.608-4.65-4.65z"/>
                                    </svg>
                                </a>

                                <a href="" class="text-blue-500 hover:bg-blue-100 hover:text-blue-700 inline-flex items-center px-3 py-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5c-4.2 0-7.9 2.5-10 6 2.1 3.5 5.8 6 10 6s7.9-2.5 10-6c-2.1-3.5-5.8-6-10-6zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4zm0-6.5c-1.4 0-2.5 1.1-2.5 2.5S10.6 13 12 13s2.5-1.1 2.5-2.5S13.4 8 12 8z"/>
                                    </svg>
                                </a>

                                <form wire:submit.prevent="" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:bg-red-100 hover:text-red-700 inline-flex items-center px-3 py-2 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h5a1 1 0 1 1 0 2h-1v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6H3a1 1 0 1 1 0-2h5V3zm2 4a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0V7zm4 0a1 1 0 1 0-2 0v10a1 1 0 1 0 2 0V7z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pkls->links() }}
                </div>
            </div>
        </div>
    </div>
</div>