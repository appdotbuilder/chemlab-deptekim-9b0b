@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Dashboard</h1>
    <div class="text-sm text-gray-600 dark:text-gray-300">
      Selamat datang, {{ auth()->user()->name ?? 'User' }}!
    </div>
  </div>
  
  <!-- Metrics Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border">
      <div class="text-2xl font-bold">15</div>
      <div class="text-sm text-gray-600 dark:text-gray-300">Alat Tersedia</div>
    </div>
    <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border">
      <div class="text-2xl font-bold">3</div>
      <div class="text-sm text-gray-600 dark:text-gray-300">Sedang Dipinjam</div>
    </div>
    <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border">
      <div class="text-2xl font-bold">7</div>
      <div class="text-sm text-gray-600 dark:text-gray-300">Menunggu Persetujuan</div>
    </div>
  </div>
  
  <!-- Chart Placeholder -->
  <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border">
    <h2 class="text-xl font-semibold mb-4">Statistik Peminjaman</h2>
    <div class="h-64 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center">
      <canvas id="borrowingChart" class="max-w-full"></canvas>
    </div>
  </div>
  
  <!-- Recent Activity -->
  <div class="bg-white dark:bg-gray-900 rounded-xl p-6 border">
    <h2 class="text-xl font-semibold mb-4">Aktivitas Terbaru</h2>
    <div class="space-y-3">
      <div class="flex justify-between items-center py-2 border-b">
        <div class="text-sm">Spektrofotometer UV-Vis dipinjam oleh Ahmad</div>
        <div class="text-xs text-gray-500">2 jam yang lalu</div>
      </div>
      <div class="flex justify-between items-center py-2 border-b">
        <div class="text-sm">pH Meter dikembalikan oleh Sari</div>
        <div class="text-xs text-gray-500">4 jam yang lalu</div>
      </div>
      <div class="flex justify-between items-center py-2">
        <div class="text-sm">Pengajuan peminjaman Rotary Evaporator oleh Budi</div>
        <div class="text-xs text-gray-500">1 hari yang lalu</div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Simple chart placeholder - Chart.js will be integrated here
  const ctx = document.getElementById('borrowingChart').getContext('2d');
  if (typeof Chart !== 'undefined') {
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Peminjaman',
          data: [12, 19, 3, 5, 2, 3],
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  }
});
</script>
@endpush
@endsection