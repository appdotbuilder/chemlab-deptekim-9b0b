@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl font-bold">Daftar Alat</h1>
    <div class="flex gap-2">
      <select class="px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800">
        <option value="">Semua Status</option>
        <option value="available">Tersedia</option>
        <option value="borrowed">Dipinjam</option>
        <option value="maintenance">Maintenance</option>
      </select>
    </div>
  </div>
  
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($equipment as $item)
    <div class="bg-white dark:bg-gray-900 rounded-xl border overflow-hidden">
      <div class="aspect-video bg-gradient-to-br from-gray-100 to-white dark:from-gray-800 dark:to-gray-700"></div>
      <div class="p-4">
        <div class="flex justify-between items-start mb-2">
          <h3 class="font-semibold">{{ $item['name'] }}</h3>
          <span class="px-2 py-1 text-xs rounded-full 
            @if($item['status'] === 'available') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
            @elseif($item['status'] === 'borrowed') bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
            @else bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
            @endif">
            @if($item['status'] === 'available') Tersedia
            @elseif($item['status'] === 'borrowed') Dipinjam
            @else Maintenance
            @endif
          </span>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ $item['code'] }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">📍 {{ $item['location'] }}</p>
        @if($item['status'] === 'available')
        <button class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900 text-sm">
          Ajukan Peminjaman
        </button>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection