@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Daftar Mahasiswa</h1>
    
    <form method="POST" action="{{ route('register.student') }}">
      @csrf
      
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
        <input type="text" id="name" name="name" 
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <div class="mb-4">
        <label for="npm" class="block text-sm font-medium mb-2">NPM</label>
        <input type="text" id="npm" name="npm" 
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium mb-2">Email Mahasiswa</label>
        <input type="email" id="email" name="email" 
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium mb-2">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Daftar
      </button>
    </form>
    
    <div class="mt-4 text-center">
      <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 underline">
        Sudah punya akun? Login
      </a>
    </div>
  </div>
</div>
@endsection