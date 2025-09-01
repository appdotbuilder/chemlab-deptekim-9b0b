<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">📊 Dashboard Overview</h2>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            Last updated: {{ date('M d, Y H:i') }}
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Equipment</p>
                    <p class="text-2xl font-bold">156</p>
                </div>
                <div class="text-3xl">🔧</div>
            </div>
            <div class="mt-2 text-sm text-green-600">
                ↗️ +5% from last month
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Active Loans</p>
                    <p class="text-2xl font-bold">24</p>
                </div>
                <div class="text-3xl">📋</div>
            </div>
            <div class="mt-2 text-sm text-yellow-600">
                ⚠️ 3 due today
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Alat Tersedia</p>
                    <p class="text-2xl font-bold">132</p>
                </div>
                <div class="text-3xl">✅</div>
            </div>
            <div class="mt-2 text-sm text-green-600">
                🔄 85% availability rate
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Under Maintenance</p>
                    <p class="text-2xl font-bold">8</p>
                </div>
                <div class="text-3xl">🔧</div>
            </div>
            <div class="mt-2 text-sm text-orange-600">
                🛠️ 5% of total equipment
            </div>
        </div>
    </div>
    
    <!-- Charts Section -->
    <div class="grid lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-4">📈 Monthly Equipment Usage</h3>
            <div class="h-64 flex items-center justify-center">
                <canvas id="usageChart" width="400" height="200"></canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('usageChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                                datasets: [{
                                    label: 'Equipment Usage',
                                    data: [12, 19, 23, 17, 25, 32],
                                    borderColor: 'rgb(59, 130, 246)',
                                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                    tension: 0.4
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-4">🥧 Equipment Categories</h3>
            <div class="h-64 flex items-center justify-center">
                <canvas id="categoryChart" width="400" height="200"></canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('categoryChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Analytical', 'Safety', 'Synthesis', 'Measurement'],
                                datasets: [{
                                    data: [45, 25, 20, 10],
                                    backgroundColor: [
                                        'rgb(59, 130, 246)',
                                        'rgb(16, 185, 129)',
                                        'rgb(245, 101, 101)',
                                        'rgb(251, 191, 36)'
                                    ]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm border p-6 dark:bg-gray-800 dark:border-gray-700">
        <h3 class="text-lg font-semibold mb-4">🕒 Recent Activity</h3>
        <div class="space-y-4">
            @foreach([
                ['action' => 'Loan Approved', 'item' => 'Spektrofotometer UV-Vis', 'user' => 'John Doe', 'time' => '2 hours ago', 'type' => 'success'],
                ['action' => 'Equipment Returned', 'item' => 'pH Meter Digital', 'user' => 'Jane Smith', 'time' => '5 hours ago', 'type' => 'info'],
                ['action' => 'Maintenance Scheduled', 'item' => 'Rotary Evaporator', 'user' => 'System', 'time' => '1 day ago', 'type' => 'warning'],
                ['action' => 'New Loan Request', 'item' => 'Centrifuge', 'user' => 'Bob Johnson', 'time' => '2 days ago', 'type' => 'default']
            ] as $activity)
            <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                <div class="w-2 h-2 rounded-full 
                    {{ $activity['type'] === 'success' ? 'bg-green-500' : '' }}
                    {{ $activity['type'] === 'info' ? 'bg-blue-500' : '' }}
                    {{ $activity['type'] === 'warning' ? 'bg-yellow-500' : '' }}
                    {{ $activity['type'] === 'default' ? 'bg-gray-500' : '' }}"></div>
                <div class="flex-1">
                    <p class="font-medium">{{ $activity['action'] }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $activity['item'] }} • {{ $activity['user'] }}</p>
                </div>
                <div class="text-sm text-gray-500">{{ $activity['time'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush