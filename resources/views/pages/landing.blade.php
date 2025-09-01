@extends('layouts.app')

@section('content')
<section data-hero class="grid md:grid-cols-2 gap-8 items-center">
  <div>
    <h1 class="text-3xl md:text-5xl font-bold tracking-tight">ChemLab Deptekim</h1>
    <p class="mt-4 text-base md:text-lg text-gray-600 dark:text-gray-300">
      Sistem terintegrasi peminjaman alat laboratorium & manajemen fasilitas Departemen Teknik Kimia FTUI.
    </p>
    <div class="mt-6 flex gap-3">
      <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl bg-gray-900 text-white dark:bg-white dark:text-gray-900">Login</a>
      <a href="{{ route('register.student') }}" class="px-4 py-2 rounded-xl border">Daftar Mahasiswa</a>
    </div>
    <ul class="mt-6 space-y-2 text-sm">
      <li>• Cara menggunakan: daftar → verifikasi → ajukan pinjam → unggah JSA (PDF) → ambil → kembalikan.</li>
      <li>• Tautan: Panduan | SOP | Aturan & Tata Tertib | Kontak</li>
    </ul>
  </div>
  <div class="rounded-2xl border aspect-video bg-gradient-to-br from-gray-100 to-white dark:from-gray-900 dark:to-gray-800"></div>
</section>
@endsection