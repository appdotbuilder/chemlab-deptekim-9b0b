<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Daftar Alat</h2>
        <div class="flex gap-3">
            <input type="text" placeholder="Search equipment..." class="px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700">
            <select class="px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700">
                <option>All Status</option>
                <option>Available</option>
                <option>Borrowed</option>
                <option>Maintenance</option>
            </select>
        </div>
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            ['name' => 'Spektrofotometer UV-Vis', 'code' => 'SPK-001', 'status' => 'available', 'location' => 'Lab Kimia Analitik'],
            ['name' => 'pH Meter Digital', 'code' => 'PHM-002', 'status' => 'borrowed', 'location' => 'Lab Kimia Dasar'],
            ['name' => 'Rotary Evaporator', 'code' => 'ROT-003', 'status' => 'maintenance', 'location' => 'Lab Sintesis'],
            ['name' => 'Mikroskop Stereo', 'code' => 'MKS-004', 'status' => 'available', 'location' => 'Lab Biologi'],
            ['name' => 'Centrifuge', 'code' => 'CTF-005', 'status' => 'available', 'location' => 'Lab Mikrobiologi'],
            ['name' => 'Hot Plate Stirrer', 'code' => 'HPS-006', 'status' => 'borrowed', 'location' => 'Lab Kimia Organik']
        ] as $equipment)
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <div class="aspect-video bg-gray-100 rounded-lg mb-4 dark:bg-gray-700"></div>
            <div class="space-y-2">
                <h3 class="font-semibold text-lg">{{ $equipment['name'] }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $equipment['code'] }} • {{ $equipment['location'] }}</p>
                <div class="flex justify-between items-center">
                    @if($equipment['status'] === 'available')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                            ✅ Available
                        </span>
                    @elseif($equipment['status'] === 'borrowed')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                            📝 Borrowed
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                            🔧 Maintenance
                        </span>
                    @endif
                    @if($equipment['status'] === 'available')
                        <button class="text-sm px-3 py-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Borrow
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>