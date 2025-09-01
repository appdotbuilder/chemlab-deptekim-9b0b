@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
    
    <form method="POST" action="{{ route('login') }}">
      @csrf
      
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium mb-2">Email</label>
        <input type="email" id="email" name="email" 
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
      </div>
      
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Login
      </button>
    </form>
    
    <div class="mt-4 text-center">
      <a href="{{ route('register.student') }}" class="text-sm text-gray-600 dark:text-gray-300 underline">
        Belum punya akun? Daftar sebagai mahasiswa
      </a>
    </div>
  </div>
</div>
@endsection