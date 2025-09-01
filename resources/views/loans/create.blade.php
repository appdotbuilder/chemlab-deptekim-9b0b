@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold mb-6">Ajukan Peminjaman Alat</h1>
    
    <form method="POST" action="{{ route('loans.store') }}" enctype="multipart/form-data">
      @csrf
      
      <div class="mb-4">
        <label for="equipment_id" class="block text-sm font-medium mb-2">Pilih Alat</label>
        <select id="equipment_id" name="equipment_id" required
                class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800">
          <option value="">-- Pilih Alat --</option>
          @foreach($equipment as $item)
          <option value="{{ $item['id'] }}">{{ $item['name'] }} ({{ $item['code'] }})</option>
          @endforeach
        </select>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
          <label for="borrow_date" class="block text-sm font-medium mb-2">Tanggal Peminjaman</label>
          <input type="datetime-local" id="borrow_date" name="borrow_date" required
                 class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800 flatpickr-input">
        </div>
        <div>
          <label for="return_date" class="block text-sm font-medium mb-2">Tanggal Pengembalian</label>
          <input type="datetime-local" id="return_date" name="return_date" required
                 class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800 flatpickr-input">
        </div>
      </div>
      
      <div class="mb-4">
        <label for="purpose" class="block text-sm font-medium mb-2">Tujuan Penggunaan</label>
        <textarea id="purpose" name="purpose" rows="3" required
                  placeholder="Jelaskan tujuan dan keperluan penggunaan alat..."
                  class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"></textarea>
      </div>
      
      <div class="mb-4">
        <label for="supervisor" class="block text-sm font-medium mb-2">Dosen Pembimbing</label>
        <input type="text" id="supervisor" name="supervisor" required
               placeholder="Nama dosen pembimbing"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800">
      </div>
      
      <div class="mb-6">
        <label for="jsa_file" class="block text-sm font-medium mb-2">Upload JSA (Job Safety Analysis) - PDF</label>
        <input type="file" id="jsa_file" name="jsa_file" accept=".pdf" required
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800 
                      file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                      file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700
                      dark:file:bg-gray-700 dark:file:text-gray-200">
        <p class="text-xs text-gray-500 mt-1">Format: PDF, maksimal 5MB</p>
      </div>
      
      <div class="flex gap-3">
        <button type="submit" class="flex-1 bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
          Kirim Pengajuan
        </button>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 border rounded-lg text-center">
          Batal
        </a>
      </div>
    </form>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize Flatpickr for date/time inputs
  if (typeof flatpickr !== 'undefined') {
    flatpickr('.flatpickr-input', {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      minDate: "today"
    });
  }
});
</script>
@endpush
@endsection